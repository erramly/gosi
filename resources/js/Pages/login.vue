<template>
    <div class="min-h-screen bg-background flex flex-col justify-center py-12 sm:px-6 lg:px-8 font-tajawal">
        <div class="absolute top-4 right-4">
            <button
                class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 hover:bg-accent hover:text-accent-foreground rounded-full w-9 h-9"
                aria-label="تفعيل الوضع الليلي">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-moon h-5 w-5 text-gray-500">
                    <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                </svg>
            </button>
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="mt-6 text-center text-3xl font-bold text-foreground">
                تسجيل الدخول إلى لوحة الإدارة
            </h2>
        </div>
        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-card py-8 px-4 shadow sm:rounded-lg sm:px-10 border border-border">
                <form class="space-y-6">
                    <div>
                        <label
                            class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 block text-sm font-medium"
                            for="email">البريد الإلكتروني</label>
                        <div class="mt-1">
                            <input
                                class="flex h-10 w-full rounded-md border bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-input focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                id="email" autocomplete="email" required="" type="email" v-model="form.email" />
                        </div>
                    </div>
                    <div>
                        <label
                            class="peer-disabled:cursor-not-allowed peer-disabled:opacity-70 block text-sm font-medium"
                            for="password">كلمة المرور</label>
                        <div class="mt-1">
                            <input
                                class="flex h-10 w-full rounded-md border bg-background px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 border-input focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                id="password" autocomplete="current-password" required="" type="password"
                                v-model="form.password" name="password" />
                        </div>
                    </div>
                    <div>
                        <button
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 h-10 w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                            type="submit" @click.prevent="submit">
                            تسجيل الدخول
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</template>
<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    email: '',
    password: ''
})

const submit = () => {
    router.post('/login', form)
}




</script>