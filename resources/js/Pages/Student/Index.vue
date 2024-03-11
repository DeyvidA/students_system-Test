<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Button from "@/Components/Button.vue";

defineProps({
    students: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <AppLayout title="Students">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
            <!-- number of users -->
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-between w-full">
                        <div
                            class="p-6 sm:px-20 bg-white border-b border-gray-200"
                        >
                            <div class="text-2xl">Students</div>
                            <span class="text-gray- 500"
                                >{{ students.length }} students</span
                            >
                        </div>
                        <div
                            class="p-6 sm:px-20 bg-white border-b border-gray-200 w-1/4"
                        >
                            <Button :onClick="() => route('dashboard')"
                                >Add Student</Button
                            >
                        </div>
                    </div>

                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="flex flex-col">
                            <div
                                class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                            >
                                <div
                                    class="py-2 align -middle inline-block min-w-full sm:px-6 lg:px-8"
                                >
                                    <div
                                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg"
                                    >
                                        <table
                                            class="min-w-full divide-y divide-gray-200"
                                        >
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Name
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Email
                                                    </th>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        Actions
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody
                                                class="bg-white divide-y divide-gray-200"
                                            >
                                                <tr
                                                    v-for="student in students"
                                                    :key="student.id"
                                                >
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <div
                                                            class="flex items -center"
                                                        >
                                                            <div
                                                                class="flex-shrink-0 h-10 w-10"
                                                            >
                                                                <img
                                                                    class="h-10 w-10 rounded-full"
                                                                    :src="
                                                                        student.profile_photo_url
                                                                    "
                                                                    alt=""
                                                                />
                                                            </div>
                                                            <div class="ml-4">
                                                                <div
                                                                    class="text-sm font-medium text-gray-900"
                                                                >
                                                                    {{
                                                                        student.name
                                                                    }}
                                                                </div>
                                                                <div
                                                                    class="text-sm text-gray-500"
                                                                >
                                                                    {{
                                                                        student.email
                                                                    }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap"
                                                    >
                                                        <div
                                                            class="text-sm text-gray-900"
                                                        >
                                                            {{ student.email }}
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium"
                                                    >
                                                        <a
                                                            href="#"
                                                            class="text-indigo-600 hover:text-indigo-900"
                                                            >Edit</a
                                                        >
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- if there is not users show this message -->
                                        <div
                                            v-if="students.length === 0"
                                            class="p-6 sm:px-20 bg-white"
                                        >
                                            <div class="text-2xl">
                                                No students
                                            </div>
                                            <span class="text-gray-500"
                                                >Add a new student</span
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped></style>
