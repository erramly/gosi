<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckUser extends Model
{
    use HasFactory;

    // تأكد من إضافة الحقول الجديدة في $fillable
    protected $fillable = ['national_id', 'serial_number', 'pdf_path_original', 'pdf_path_qr'];

    protected $table = 'checkusers';

    protected $appends = ['pdf_url_original', 'pdf_url_qr'];

    public function getPdfUrlOriginalAttribute()
    {
        return asset('storage/' . $this->pdf_path_original);
    }

    public function getPdfUrlQrAttribute()
    {
        return asset('storage/' . $this->pdf_path_qr);
    }
}
