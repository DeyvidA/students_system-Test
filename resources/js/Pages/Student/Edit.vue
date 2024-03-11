<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

import Button from "@/Components/Button.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

const props = defineProps({
    student: {
        type: Object,
        required: true,
    },
});

const form = useForm({
    first_name: props.student.first_name,
    last_name: props.student.last_name,
    username: props.student.username,
    email: props.student.email,
});

const submit = () => {
    form.put(route("students.update", props.student.id));
};
</script>



<template>
    <AppLayout title="Edit Student">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Student
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6 sm:px-20 bg-white">
                        <form @submit.prevent="submit">
                            <div class="flex flex-col">
                                <div class="flex justify-between w-full gap-4">
                                    <div class="mb-4 w-1/2">
                                        <InputLabel
                                            for="first_name"
                                            value="First Name"
                                        />
                                        <TextInput
                                            id="first_name"
                                            v-model="form.first_name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            required
                                            autofocus
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.first_name"
                                        />
                                    </div>
                                    <div class="mb-4 w-1/2">
                                        <InputLabel
                                            for="last_name"
                                            value="Last Name"
                                        />
                                        <TextInput
                                            id="last_name"
                                            v-model="form.last_name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            required
                                        />
                                        <InputError
                                            class="mt-2"
                                            :message="form.errors.last_name"
                                        />
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <InputLabel
                                        for="username"
                                        value="Username"
                                    />
                                    <TextInput
                                        id="username"
                                        v-model="form.username"
                                        type="text"
                                        class="mt-1 block w-full"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.username"
                                    />
                                </div>
                                <div class="mb-4">
                                    <InputLabel for="email" value="Email" />
                                    <TextInput
                                        id="email"
                                        v-model="form.email"
                                        type="email"
                                        class="mt-1 block w-full"
                                        required
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.email"
                                    />
                                </div>
                                <div class="mb-4">
                                    <Button type="submit">Update</Button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
