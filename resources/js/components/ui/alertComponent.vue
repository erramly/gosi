<template>
    <div :class="`flex absolute left-5 top-5 items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 ${type === 'success' ? 'text-green-800 border-green-300 bg-green-50' : ''}`"
        role="alert">
        <button @click="closeAlert" type="button"
            class="rounded-sm pl-5 opacity-70 ring-offset-background transition-opacity hover:opacity-100 focus:outline-none focus:ring-ring"><svg
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-x h-4 w-4">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg><span class="sr-only">Close</span></button>
        <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="currentColor" viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium"> {{ message }}</span>
        </div>
    </div>
</template>
<script setup>
import { onMounted } from 'vue';

const props = defineProps({
    message: {
        type: String,
        default: "Default alert message"
    },
    type: {
        type: String,
        default: "info"
    }
});

const emit = defineEmits(['close']);

onMounted(() => {
    setTimeout(() => {
        closeAlert();
    }, 3000);
});

const closeAlert = () => {
    emit('close');
};
</script>
