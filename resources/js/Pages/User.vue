<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User: {{ user.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-200 overflow-hidden shadow-xl sm:rounded-lg">
                    <h2 class="font-bold text-xl p-4 border-b border-slate-400">Pens</h2>
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="">
                            <th class="py-2">Type</th>
                            <th>Colour</th>
                            <th>Size</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pen in user.pens" class="bg-white">
                            <td class="px-4 border-b border-slate-200">{{ pen.type }}</td>
                            <td class="px-4 border-b border-slate-200 text-center">{{ pen.color }}</td>
                            <td class="px-4 border-b border-slate-200 text-center">{{ pen.size }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-slate-200 overflow-hidden shadow-xl sm:rounded-lg">
                    <h2 class="font-bold text-xl p-4 border-b border-slate-400">Related Users</h2>
                    <table class="table-auto w-full">
                        <thead>
                        <tr class="">
                            <th class="py-2">Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="user in related.data" class="bg-white">
                            <td class="px-4 border-b border-slate-200">{{ user.name }}</td>
                            <td class="px-4 border-b border-slate-200">{{ user.email }}</td>
                            <td class="px-4 border-b border-slate-200">
                                <Link :href="route('users.show', user)" class="rounded bg-blue-600 text-white p-1 px-3 inline-block my-1">Show</Link>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "../Components/Pagination.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    user: Object,
    related: Object,
});
</script>
