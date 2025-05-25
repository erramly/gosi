<template>
    <nav class="flex fixed-top navbar navbar-dark navbar-expand-md arb-fixed-top bg-[#221bff] text-white">
        <div class="container flex justify-between items-center px-8">
            <!-- icon arfrad a3amll -->
            <div class="flex max-w-[200px] gap-4 py-2">
                <a title="top nav logo " href="/" class="navbar-brand"><img
                        src="https://www.alrajhibank.com.sa/-/media/Themes/AlrajhiPWS/AlrajhiSaudia/AlrajhiSaudiaTheme/img/logo/logo-arb.png?h=30&iar=0&w=30"
                        alt="" width="30" height="30" data-variantitemid="{3C0C445B-B9E5-4F4B-960B-01C09E60E2FA}"
                        data-variantfieldname="Image" class="img-fluid lazy" style="" /></a>
                <ul class="component flex gap-8 mr-auto navbar-nav navbar-top">
                    <li class="nav-item level1 item0 odd first active">
                        <a title="Personal" href="/Personal" class="nav-link">الأفراد</a>
                    </li>
                    <li class="nav-item level1 item1 even last">
                        <a title="Business" href="/Business" class="nav-link">الأعمال</a>
                    </li>
                </ul>
            </div>
            <div class="component navbar-nav mr-auto flex gap-4 h-full flex items-center">
                <!-- <div class="component d-sm-none d-xl-none nav-item m-auto">
                        <ul class="component">
                            <li class="item0 odd first last">
                                <a data-variantitemid="{3F2B1A9E-6A4F-4C32-A3F4-CCFCEA6CA821}" class="nav-link"
                                    href="https://www.alrajhibank.com.sa/Personal/Financing-And-Savings-Products-For-Individuals"
                                    data-variantfieldname="Link">أسعار المنتجات التمويلية والادخارية</a>
                            </li>
                        </ul>
                    </div> -->

                <div class="component d-none d-sm-block nav-item m-auto">
                    <a title="Search icon Image" href="#" class="nav-link pt-2" data-toggle="modal"
                        data-target="#myModal"><img
                            src="https://www.alrajhibank.com.sa/-/media/Themes/AlrajhiPWS/AlrajhiSaudia/AlrajhiSaudiaTheme/img/icon/search.png?h=20&amp;iar=0&amp;w=20"
                            alt="" width="20" height="20" data-variantitemid="{43FF6B5D-98DA-458E-AF47-11724CF09094}"
                            data-variantfieldname="Image" class="img-fluid lazy" style="" /></a>
                </div>
                <div class="component language-selector mx-lg-4 nav-item initialized">
                    <a href="https://www.alrajhibank.com.sa/en/Personal/Finance/EDocument-Request"
                        class="nav-link language-selector-item" data-language-code="en" data-country-code="us">
                        English
                    </a>
                </div>
                <div class="component link text-sm d-none d-sm-block bg-[#00b2ff] p-2 login-nav nav-item  h-full ">
                    <div class="component-content">

                        <div class="field-link ">
                            <a href="https://onlinebanking.alrajhibank.com.sa/OnlineBanking/" rel="noopener noreferrer"
                                data-variantitemid="{C6CDE673-2EDB-4807-A387-3B1C006A1BE5}" data-variantfieldname="Link"
                                class="nav-link" target="_blank">تسجيل دخول</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </nav>
    <div class="flex max-md:flex-col items-center justify-center mx-auto py-4">

        <h1 class="text-[#221bff] text-3xl font-bold mb-12">نموذج التحقق من مستندات</h1>

        <div class="text-[#221bff] mb-8 w-full  max-md:max-w-[200px] max-w-[400px]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-file-text text-[#221bff]">
                <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path>
                <path d="M14 2v4a2 2 0 0 0 2 2h4"></path>
                <path d="M10 9H8"></path>
                <path d="M16 13H8"></path>
                <path d="M16 17H8"></path>
            </svg>
        </div>

    </div>
    <!-- form downloadFile -->
    <main class="flex flex-col items-center justify-center px-4 bg-gray-100 py-[3rem]">
        <div class="w-full max-w-3xl">
            <div class="w-full space-y-8 text-right" dir="rtl">
                <h1 class="text-xl font-semibold text-[#221bff]">قم بتعبئة البيانات التالية</h1>
                <div class="h-px bg-gray-200 my-4"></div>
                <form class="space-y-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2"><label for="serialNumber" class="block text-sm font-medium">الرقم
                                التسلسلي</label><input
                                class="flex h-10 w-full rounded-[1.875em] border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-right"
                                id="serialNumber" placeholder="يرجى إدخال الرقم التسلسلي" v-model="form.serial_number">
                        </div>
                        <div class="space-y-2"><label for="idNumber" class="block text-sm font-medium">رقم الهوية
                                الوطنية أو الإقامة أو رقم المنشأة</label><input
                                class="flex h-10 w-full rounded-[1.875em] border border-input bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-right"
                                id="idNumber" placeholder="يرجى إدخال رقم الهوية الوطنية أو الإقامة أو رقم المنشأة"
                                v-model="form.national_id"></div>
                    </div>
                    <div class="h-px bg-gray-200 my-4"></div>
                    <div class="flex justify-center"><button
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 bg-blue-500 hover:bg-blue-600 text-white px-8 py-2 rounded-full"
                            type="submit" @click.prevent="downloadFile">التحقق من صحة الوثائق</button></div>
                </form>
            </div>
        </div>
    </main>
</template>
<script setup>
import { useForm } from '@inertiajs/vue3';
import navbar from '../components/check/navbar.vue';




const form = useForm({
    serial_number: '',
    national_id: '',
})

const downloadImage = () => {
    window.location.href = '/download-image/nazwa.jpg';
}
const downloadFile = () => {
    form.get('/check-pdf', {
        params: {
            serial_number: form.serial_number,
            national_id: form.national_id
        }
    })
}

</script>
