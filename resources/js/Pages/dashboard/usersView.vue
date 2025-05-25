<template>
    <Layout>
        <div class="p-6">
            <div class="mb-6">
                <h1 class="text-2xl font-bold mb-2 hidden md:block">
                    المستخدمين
                </h1>
                <p class="text-muted-foreground">إدارة بيانات المستخدمين</p>
            </div>
            <div class="flex flex-col md:flex-row justify-between gap-4 md:items-center mb-6">
                <div class="relative w-full max-w-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-search absolute right-3 top-1/2 h-4 w-4 -translate-y-1/2 text-muted-foreground">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg><input v-model="search"
                        class="flex h-10 border px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium file:text-foreground placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 w-full pr-10 pl-4 bg-background border-input focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-lg"
                        placeholder="بحث برقم الهوية أو التسلسلي" type="search" value="" />
                </div>
                <button @click="openModalCreate = true"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 h-10 px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-circle-plus ml-2 h-4 w-4">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M8 12h8"></path>
                        <path d="M12 8v8"></path>
                    </svg>إضافة مستخدم جديد
                </button>
            </div>
            <div class="rounded-lg border bg-card shadow-sm">
                <div class="relative w-full overflow-auto">
                    <table class="w-full caption-bottom text-sm">
                        <thead class="[&_tr]:border-b bg-muted/50">
                            <tr class="border-b transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                <th
                                    class="h-12 px-4 align-middle text-muted-foreground [&:has([role=checkbox])]:pr-0 text-right font-bold">
                                    رقم الهوية
                                </th>
                                <th
                                    class="h-12 px-4 align-middle text-muted-foreground [&:has([role=checkbox])]:pr-0 text-right font-bold">
                                    رقم الشهادة
                                </th>
                                <th
                                    class="h-12 px-4 align-middle text-muted-foreground [&:has([role=checkbox])]:pr-0 text-right font-bold">
                                    الملف
                                </th>
                                <th
                                    class="h-12 px-4 align-middle text-muted-foreground [&:has([role=checkbox])]:pr-0 text-right font-bold">
                                    صفحة التحميل
                                </th>
                                <th
                                    class="h-12 px-4 align-middle text-muted-foreground [&:has([role=checkbox])]:pr-0 text-right font-bold">
                                    تعديل
                                </th>

                                <th
                                    class="h-12 px-4 align-middle text-muted-foreground [&:has([role=checkbox])]:pr-0 text-right font-bold">
                                    حذف
                                </th>
                            </tr>
                        </thead>
                        <tbody class="[&_tr:last-child]:border-0">
                            <tr v-for="user in filteredUsers"
                                class="border-b data-[state=selected]:bg-muted hover:bg-muted/50 transition-colors">
                                <!-- view user national id -->
                                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0 font-medium">
                                    {{ user.national_id }}
                                </td>
                                <!-- view user serial number -->
                                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                    {{ user.serial_number }}
                                </td>
                                <!-- view user pdf -->
                                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                    <a :href="user.pdf_url_qr" target="_blank" rel="noopener"
                                        class="inline-flex cursor-pointer items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 hover:text-accent-foreground h-10 w-10 hover:bg-blue-100  rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            class="lucide lucide-file-text h-5 w-5 text-blue-500" fill="#3b82f6">
                                            <path
                                                d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" />
                                        </svg>
                                        <span class="sr-only">عرض الملف</span>
                                    </a>
                                </td>
                                <!-- veiw page donwlad pdf -->
                                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                    <a :href="`/ar-quickverify?nationalnumber=${user.national_id}&certificatenumber=${user.serial_number}`"
                                        target="_blank" rel="noopener"
                                        class="inline-flex cursor-pointer items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 hover:text-accent-foreground h-10 w-10 hover:bg-[#00bf0038] rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" fill="#00bf00b5">
                                            <path
                                                d="M64 0C28.7 0 0 28.7 0 64L0 448c0 35.3 28.7 64 64 64l256 0c35.3 0 64-28.7 64-64l0-288-128 0c-17.7 0-32-14.3-32-32L224 0 64 0zM256 0l0 128 128 0L256 0zM216 408c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-102.1-31 31c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l72-72c9.4-9.4 24.6-9.4 33.9 0l72 72c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-31-31L216 408z" />
                                        </svg>
                                        <span class="sr-only">عرض الملف</span>
                                    </a>
                                </td>
                                <!-- update user -->
                                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                    <button
                                        @click="openUserModalUpdateWithData({ id: user.id, national_id: user.national_id, serial_number: user.serial_number })"
                                        class="inline-flex hover:bg-gray-200 items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 hover:text-accent-foreground h-10 w-10 hover:bg-muted rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-pencil h-5 w-5 text-muted-foreground">
                                            <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"></path>
                                            <path d="m15 5 4 4"></path>
                                        </svg><span class="sr-only">تعديل</span>
                                    </button>
                                </td>
                                <!-- delete user -->
                                <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                    <button @click="destroy(user.id)"
                                        class="inline-flex bg-red-500 hover:bg-red-300 items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 hover:text-accent-foreground h-10 w-10 hover:bg-muted rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="800px" height="800px"
                                            viewBox="0 0 24 24" fill="none">
                                            <path d="M4 7H20" stroke="#ddd" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M6 7V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V7"
                                                stroke="#ddd" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                stroke="#ddd" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg><span class="sr-only">حذف</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- create user modal -->
        <Teleport to="body">
            <createUser @addUserSuccess="addUserSuccess" :openModalCreate="openModalCreate"
                @closeModalCreate="openModalCreate = false" />
        </Teleport>
        <!-- update user modal -->
        <Teleport to="body">
            <UpdateUser :openModalUpdate="openModalUpdate" :user="selectedUser"
                @closeModalUpdate="openModalUpdate = false" />
        </Teleport>
        <!-- alert component -->
        <!-- <Teleport to="body">
            <alertComponent v-if="showAlert" :message="alertMessage" :type="alertType" @close="showAlert = false" />
        </Teleport> -->
    </Layout>
</template>

<script setup>
import createUser from "@/components/home/modals/createUser.vue";
import UpdateUser from "../../components/home/modals/updateUser.vue";
import alertComponent from "../../components/ui/alertComponent.vue";
import { router } from '@inertiajs/vue3';
import Layout from "@/Layouts/AppLayout.vue";
import { ref, computed } from "vue";

const props = defineProps([
    "users"
]);

console.log(props.users);


const usersNoFilter = ref(props.users)
const search = ref('');

const showAlert = ref(false);
const alertMessage = ref("");
const alertType = ref("success"); // success, error, warning, info
const openModalCreate = ref(false);
//for update user
const selectedUser = ref(null);
const openModalUpdate = ref(false);

//delete user
const destroy = (id) => {
    if (confirm('هل تريد الحذف؟')) {
        router.post(`/delete-user/${id}`, {}, {
            onSuccess: () => {
                location.reload();
            }
        });
        showAlert.value = true;
        alertMessage.value = "تم الحذف بنجاح";
        alertType.value = "success"; // success, error, warning, info
    }

}
//open modal alert
const addUserSuccess = () => {

    showAlert.value = true;
    alertMessage.value = "تم إضافة المستخدم بنجاح";
    alertType.value = "success"; // success, error, warning, info
}

const openUserModalUpdateWithData = (user) => {
    selectedUser.value = user;
    openModalUpdate.value = true;
};


const filteredUsers = computed(() => {
    if (!search.value) return usersNoFilter.value;
    // Filter users based on search input
    return usersNoFilter.value.filter(user =>
        user.national_id.toLowerCase().includes(search.value.toLowerCase()) || user.serial_number.toLowerCase().includes(search.value.toLowerCase())
    );
});
</script>

<style scoped>
.modal {
    position: fixed;
    z-index: 999;
    top: 20%;
    left: 50%;
    width: 300px;
    margin-left: -150px;
}
</style>
