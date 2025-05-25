<template>
    <div class="flex h-screen bg-background text-foreground">
        <aside class="w-64 h-screen max-md:hidden bg-card border-l border-border flex flex-col">
            <div class="p-6">
                <h2 class="text-xl font-bold text-blue-600">
                    نظام الإدارة
                </h2>
            </div>
            <nav class="flex-1 px-4">
                <ul class="space-y-2">
                    <li>
                        <a href="/"
                            class="flex items-center p-3 rounded-lg transition-colors text-foreground hover:bg-accent hover:text-accent-foreground"><span
                                class="ml-3 text-xl">🧭</span><span>لوحة التحكم</span></a>
                    </li>
                    <li>
                        <a href="/users"
                            class="flex items-center p-3 rounded-lg transition-colors bg-blue-50 text-blue-600"><span
                                class="ml-3 text-xl">👤</span><span>المستخدمين</span></a>
                    </li>
                    <li>
                        <a href="/settings"
                            class="flex items-center p-3 rounded-lg transition-colors text-foreground hover:bg-accent hover:text-accent-foreground"><span
                                class="ml-3 text-xl">⚙️</span><span>الإعدادات</span></a>
                    </li>
                </ul>
            </nav>
            <div class="p-4 border-t border-border">
                <button @click="logout"
                    class="flex items-center w-full p-3 rounded-lg text-red-500 hover:bg-red-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-log-out ml-3 h-5 w-5">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" x2="9" y1="12" y2="12"></line>
                    </svg><span>تسجيل الخروج</span>
                </button>
            </div>
        </aside>
        <main class="flex-1 overflow-auto">
            <div class="p-4 border-b flex justify-between items-center bg-card">
                <h1 class="text-xl font-bold md:hidden">المستخدمين</h1>
                <div class="flex items-center gap-2">
                    <button
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 hover:bg-accent hover:text-accent-foreground relative rounded-full w-9 h-9"
                        type="button" id="radix-«r0»" aria-haspopup="menu" aria-expanded="false" data-state="closed">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-bell h-5 w-5">
                            <path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"></path>
                            <path d="M10.3 21a1.94 1.94 0 0 0 3.4 0"></path>
                        </svg><span
                            class="absolute top-0 right-0 h-4 w-4 rounded-full bg-red-500 text-[10px] font-medium text-white flex items-center justify-center">0</span></button><button
                        class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 hover:bg-accent hover:text-accent-foreground rounded-full w-9 h-9"
                        aria-label="تفعيل الوضع الليلي">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-moon h-5 w-5 text-gray-500">
                            <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <slot></slot>
        </main>
    </div>
</template>
<script setup>
import { router } from '@inertiajs/vue3'

function logout() {
    router.post('/logout')
}</script>
