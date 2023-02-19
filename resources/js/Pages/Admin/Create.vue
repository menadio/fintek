<template>
    <Head title="Admins" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Create Admin Account</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">Create Admin Account</div>

                    <div class="p-6">
                        <form @submit.prevent="submit">
                            <div>
                                <InputLabel for="name" value="Name"/>

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full md:w-1/2"
                                    v-model="form.name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                />

                                <InputError class="mt-2" :message="form.errors.name"/>
                            </div>

                            <div class="mt-2">
                                <InputLabel for="email" value="Email"/>

                                <TextInput
                                    id="email"
                                    type="email"
                                    class="mt-1 block w-full md:w-1/2"
                                    v-model="form.email"
                                    required
                                    autofocus
                                    autocomplete="email"
                                />

                                <InputError class="mt-2" :message="form.errors.email"/>
                            </div>

                            <div class="mt-2">
                                <InputLabel for="name" value="Password"/>

                                <TextInput
                                    id="password"
                                    type="password"
                                    class="mt-1 block w-full md:w-1/2"
                                    v-model="form.password"
                                    required
                                    autofocus
                                    autocomplete="password"
                                />

                                <InputError class="mt-2" :message="form.errors.password"/>
                            </div>

                            <div class="mt-2">
                                <InputLabel for="phone" value="Phone"/>

                                <TextInput
                                    id="phone"
                                    type="tel"
                                    class="mt-1 block w-full md:w-1/2"
                                    v-model="form.phone"
                                    required
                                    autofocus
                                    autocomplete="phone"
                                />

                                <InputError class="mt-2" :message="form.errors.phone"/>
                            </div>

                            <div class="flex items-center justify-start mt-8">
                                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                    Submit
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head, useForm} from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({
    isSuperAdmin: Boolean
})

const form = useForm({
    name: '',
    email: '',
    password: '',
    phone: '',
})

const submit = () => {
    form.post(route('admins.store'), {
        onFinish: () => form.reset()
    });
}
</script>

<style scoped>

</style>
