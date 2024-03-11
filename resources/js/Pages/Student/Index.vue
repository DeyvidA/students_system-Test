<script setup>
import { Link, router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps({
    students: {
        type: Array,
        required: true,
    },
});

const deleteStudent = (id) => {
    if (confirm("Are you sure you want to delete this student?")) {
        router.delete(route("students.destroy", id));
    }
};
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
                    <div
                        class="flex justify-between w-full border-b border-gray-200 items-center"
                    >
                        <div class="p-6 md:px-20 bg-white">
                            <div class="text-2xl">Students</div>
                            <span class="text-gray- 500"
                                >{{ students.length }} students</span
                            >
                        </div>
                        <div class="p-6 md:px-20 bg-white lg:w-1/4">
                            <Link
                                :href="route('students.create')"
                                class="w-full rounded-md py-2 px-4 text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-opacity-50"
                                >Add Student</Link
                            >
                        </div>
                    </div>

                    <div class="p-6 md:px-20 bg-white border-b border-gray-200">
                        <div class="flex flex-col">
                            <div
                                class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8"
                            >
                                <div
                                    class="py-2 align -middle inline-block min-w-full sm:px-6 lg:px-8"
                                >
                                    <div class="">
                                        <table
                                            class="min-w-full divide-y divide-gray-200"
                                        >
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th
                                                        scope="col"
                                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                                    >
                                                        User
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
                                                            class="text-sm font-medium text-gray-900"
                                                        >
                                                            {{
                                                                student.username
                                                            }}
                                                        </div>
                                                        <div
                                                            class="text-sm text-gray-500"
                                                        >
                                                            {{
                                                                student.first_name +
                                                                " " +
                                                                student.last_name
                                                            }}
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
                                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-4"
                                                    >
                                                        <a
                                                            :href="
                                                                route(
                                                                    'students.edit',
                                                                    student.id
                                                                )
                                                            "
                                                            class="text-blue-600 hover:text-blue-900 text-bold"
                                                            >Edit</a
                                                        >
                                                        <a
                                                            href="#"
                                                            @click="
                                                                deleteStudent(
                                                                    student.id
                                                                )
                                                            "
                                                            class="text-red-600 hover:text-red-900"
                                                            >Delete</a
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
