<template>
    <Head title="Admins" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-if="admins.length === 0" class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                        There are no admin accounts to manage yet. Create <Link :href="route('admins.create')" class="text-blue-500">new</Link> admin
                    </div>
                </div>

                <div v-else class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex items-center justify-end mt-2">
                            <Link
                                :href="route('admins.create')"
                                class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            >
                                Create Admin
                            </Link>
                        </div>

                        <div class="mx-auto grid max-w-7xl gap-y-20 gap-x-8 px-6 lg:px-8 xl:grid-cols-3">
                            <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 md:grid-cols-3 sm:gap-y-16 xl:col-span-3">
                                <li v-for="admin in admins" :key="admin.name">
                                    <Link :href="route('admins.show', admin)">
                                        <div class="flex items-center gap-x-6">
                                                <img class="h-16 w-16 rounded-full"
                                                    :src="admin.imageUrl ?? 'https://via.placeholder.com/150'" alt=""/>
                                                <div>
                                                    <h3 class="text-base font-semibold leading-7 tracking-tight text-white">
                                                        {{ admin.name }}</h3>
                                                    <p class="text-sm font-semibold leading-6 text-gray">{{
                                                            admin.phone
                                                        }}</p>
                                                </div>
                                        </div>
                                    </Link>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link} from '@inertiajs/vue3';

defineProps({
    admins: Array
})
</script>

<style scoped>

</style>
