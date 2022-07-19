<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from '@inertiajs/inertia-vue3';
import Pagination from "../Components/Pagination.vue";

defineProps({
    users: Array,
});

// convert list of strings to unique comma separated string
function listToString(pens) {
    return pens.map(pen => pen.type).filter((item, index, array) => array.indexOf(item) === index).join(', ');
}
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg bg-slate-200">
                    <table class="table-auto w-full">
                        <thead>
                            <tr class="">
                                <th class="py-2">Name</th>
                                <th>Email</th>
                                <th>Pens</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in users.data" class="bg-white">
                                <td class="px-4 border-b border-slate-200">{{ user.name }}</td>
                                <td class="px-4 border-b border-slate-200">{{ user.email }}</td>
                                <td class="px-4 border-b border-slate-200">{{ listToString(user.pens) }}</td>
                                <td class="px-4 border-b border-slate-200">
                                    <Link :href="route('users.show', user)" class="rounded bg-blue-600 text-white p-1 px-3 inline-block my-1">Show</Link>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-center">
                                    <Pagination
                                        :links="users.meta.links"
                                    />
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
