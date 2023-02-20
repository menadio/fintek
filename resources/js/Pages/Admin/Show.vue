<template>
    <Head title="Admin Details" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Administrator Management</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="pt-6 text-gray-900 dark:text-gray-100">
                        <div class="px-4 py-4 sm:px-6">
                            <h3 class="text-lg font-medium leading-6 text-gray-400">Account Information</h3>
                        </div>

                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-4 border-b sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Full name</dt>
                                    <dd class="mt-1 text-sm text-gray-300 sm:col-span-2 sm:mt-0">{{ admin.name }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-4 border-b sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Email address</dt>
                                    <dd class="mt-1 text-sm text-gray-300 sm:col-span-2 sm:mt-0">{{ admin.email }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-4 border-b sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Telephone</dt>
                                    <dd class="mt-1 text-sm text-gray-300 sm:col-span-2 sm:mt-0">{{ admin.phone }}</dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">Created At</dt>
                                    <dd class="mt-1 text-sm text-gray-300 sm:col-span-2 sm:mt-0">{{ admin.created_at }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>

import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from '@inertiajs/vue3';

defineProps({
    admin: Object
})
</script>

<style scoped>

</style>
