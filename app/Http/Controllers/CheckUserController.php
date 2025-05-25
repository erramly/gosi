<?php

namespace App\Http\Controllers;

use Log;
use Inertia\Inertia;
use App\Models\CheckUser;
use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Str;

class CheckUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = CheckUser::all();

        return Inertia::render('dashboard/usersView', [
            'users' => $users
        ]);
    }

    public function show()
    {
        $users = CheckUser::select('national_id', 'serial_number', 'pdf_path')->get();

        return Inertia::render('dashboard/showUsers', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'national_id' => 'required|unique:checkusers,national_id',
            'serial_number' => 'required',
            'pdf' => 'required|file|mimes:pdf',
        ]);

        // Save the original PDF file
        $originalFile = $request->file('pdf');
        $filename = Str::uuid() . '.' . $originalFile->getClientOriginalExtension();
        $originalPath = $originalFile->storeAs('pdfs/original', $filename, 'public');
        $originalFullPath = storage_path('app/public/' . $originalPath);

        // Save the record first
        $checkUser = CheckUser::create([
            'national_id' => $data['national_id'],
            'serial_number' => $data['serial_number'],
            'pdf_path_original' => $originalPath,
            // We will fill pdf_path_qr later
        ]);

        // Create the verification link
        $verificationUrl = url('/ar-quickverify?nationalnumber=' . $checkUser->national_id . '&certificatenumber=' . $checkUser->serial_number);

        // Generate QR code
        $qrFilename = 'qr_' . time() . '.png';
        $qrPath = storage_path('app/public/pdfs/qrs/' . $qrFilename);
        QrCode::format('png')->size(300)->generate($verificationUrl, $qrPath);

        // Edit PDF to add QR code
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($originalFullPath);

        for ($i = 1; $i <= $pageCount; $i++) {
            $templateId = $pdf->importPage($i);
            $pdf->AddPage();
            $pdf->useTemplate($templateId);
            $pdf->Image($qrPath, 27, 233, 22, 22); // QR code position
        }

        // Save the modified copy
        $finalFilename = 'qr_' . $filename;
        $finalPath = 'pdfs/' . $finalFilename;
        $pdf->Output(storage_path('app/public/' . $finalPath), 'F');

        // Delete the temporary QR image
        unlink($qrPath);

        // Update the record with the modified file path
        $checkUser->update([
            'pdf_path_qr' => $finalPath
        ]);

        return redirect()->route('users.index')->with('success', 'User added successfully');
    }





    public function update(Request $request, $id)
    {
        $user = CheckUser::findOrFail($id);

        // Check for new data or use old if not sent
        $nationalId = $request->input('national_id', $user->national_id);
        $serialNumber = $request->input('serial_number', $user->serial_number);

        // Current original file path
        $originalPath = storage_path('app/public/' . $user->pdf_path_original);

        // If a new file is uploaded
        if ($request->hasFile('pdf')) {
            // Delete old files
            Storage::disk('public')->delete($user->pdf_path_original);
            Storage::disk('public')->delete($user->pdf_path_qr);

            // Save the new file
            $newFile = $request->file('pdf');
            $filename = Str::uuid() . '.' . $newFile->getClientOriginalExtension();
            $newOriginalPath = $newFile->storeAs('pdfs/original', $filename, 'public');
            $originalPath = storage_path('app/public/' . $newOriginalPath); // Update new path

            // Update path in database
            $user->pdf_path_original = $newOriginalPath;
        }

        // Generate new verification link
        $verificationUrl = url('/ar-quickverify?nationalnumber=' . $nationalId . '&certificatenumber=' . $serialNumber);

        // Generate QR
        $qrFilename = 'qr_' . time() . '.png';
        $qrPath = storage_path('app/public/pdfs/qrs/' . $qrFilename);
        QrCode::format('png')->size(300)->generate($verificationUrl, $qrPath);

        // Add QR to PDF file
        $pdf = new Fpdi();
        $pageCount = $pdf->setSourceFile($originalPath);

        for ($i = 1; $i <= $pageCount; $i++) {
            $templateId = $pdf->importPage($i);
            $pdf->AddPage();
            $pdf->useTemplate($templateId);
            $pdf->Image($qrPath, 27, 233, 22, 22); // QR code position
        }

        $finalFilename = 'qr_' . ($filename ?? basename($user->pdf_path_original));
        $finalPath = 'pdfs/' . $finalFilename;
        $pdf->Output(storage_path('app/public/' . $finalPath), 'F');

        // Delete temporary QR image
        unlink($qrPath);

        // Update in database
        $user->update([
            'national_id' => $nationalId,
            'serial_number' => $serialNumber,
            'pdf_path_qr' => $finalPath
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }





    public function destroy($id)
    {
        $user = CheckUser::findOrFail($id);

        // Delete the original PDF file
        if ($user->pdf_path_original && Storage::disk('public')->exists($user->pdf_path_original)) {
            Storage::disk('public')->delete($user->pdf_path_original);
        }

        // Delete the modified PDF file with QR
        if ($user->pdf_path_qr && Storage::disk('public')->exists($user->pdf_path_qr)) {
            Storage::disk('public')->delete($user->pdf_path_qr);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function verify(Request $request)
    {
        // Receive data from the URL
        $type = $request->query('nationalnumber');
        $number = $request->query('certificatenumber');

        // Search for the record in the database
        $certificate = CheckUser::where('national_id', $type)
            ->where('serial_number', $number)
            ->first();

        if ($certificate) {
            // Send the file name to the view
            return view('check', [
                'file' => $certificate->pdf_path_qr // Adjust according to the column name
            ]);
        } else {
            return view('check', ['file' => null]);
        }
    }



}
