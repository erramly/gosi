<template>
    <div v-if="openModalCreate" class="modal">
        <div data-state="open" @click="closeModal"
            class="fixed inset-0 z-50 bg-black/80 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0"
            style="pointer-events: auto;"></div>
        <div role="dialog" id="radix-«r2»"
            class="fixed left-[50%] top-[50%] z-50 grid w-full max-w-lg translate-x-[-50%] translate-y-[-50%] gap-4 border p-6 shadow-lg duration-200 data-[state=open]:animate-in data-[state=closed]:animate-out data-[state=closed]:fade-out-0 data-[state=open]:fade-in-0 data-[state=closed]:zoom-out-95 data-[state=open]:zoom-in-95 data-[state=closed]:slide-out-to-left-1/2 data-[state=closed]:slide-out-to-top-[48%] data-[state=open]:slide-in-from-left-1/2 data-[state=open]:slide-in-from-top-[48%] sm:rounded-lg sm:max-w-[425px] bg-card"
            tabindex="-1" style="pointer-events: auto;">
            <div class="flex flex-col space-y-1.5 text-center sm:text-left">
                <h2 id="radix-«r3»" class="font-semibold tracking-tight text-xl">إضافة مستخدم جديد</h2>
            </div>
            <form>
                <div class="grid gap-4 py-4">
                    <div class="grid gap-2"><label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="nationalId">رقم الهوية</label>
                        <input
                            class="flex h-10 w-full rounded-md border bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-input focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            id="nationalId" required="" v-model="form.national_id" name="nationalId">
                    </div>
                    <div class="grid gap-2"><label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="serialNumber">الرقم التسلسلي</label><input
                            class="flex h-10 w-full rounded-md border bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-input focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            id="serialNumber" required="" v-model="form.serial_number" name="serialNumber"></div>
                    <div class="grid gap-2"><label
                            class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70"
                            for="pdfFile">الملف (PDF)</label><input
                            class="flex h-10 w-full rounded-md border bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-input focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            id="pdfFile" accept=".pdf" @change="handleFile" type="file" name="pdfFile"></div>
                </div>
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-2"><button
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white"
                        type="submit" @click="submit">إضافة المستخدم</button></div>
                <button @click="closeModal" type="button"
                    class="absolute right-4 top-4 rounded-sm opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-2 focus:ring-ring focus:ring-offset-2 disabled:pointer-events-none data-[state=open]:bg-accent data-[state=open]:text-muted-foreground"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-x h-4 w-4">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg><span class="sr-only">Close</span></button>
            </form>
        </div>
    </div>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3'


const form = useForm({
    national_id: '',
    serial_number: '',
    pdf: null,
})

const handleFile = (e) => {
    form.pdf = e.target.files[0]
}



const props = defineProps({
    openModalCreate: {
        type: Boolean,
        required: true
    }
});

const emit = defineEmits(['closeModalCreate']);

const closeModal = () => {
    emit('closeModalCreate');
};



const submit = () => {
    form.post('/add-user', {
        onSuccess: () => {
            window.location.reload();
        },
    })
    closeModal();
}



</script>