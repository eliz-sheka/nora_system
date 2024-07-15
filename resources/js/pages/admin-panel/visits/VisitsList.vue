<template>
    <Sidebar/>

    <div class="p-16 sm:ml-64">
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex p-6">
                    <h2 class="text-2xl font-bold dark:text-white">Візити</h2>
                    <a @click.prevent="newVisit" href="#" class="inline-flex ml-auto items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Новий візит
                        <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </a>
                </div>

                <table v-if="list.length" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Жетон
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Тип візиту
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Кількість від-ів
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Час початку
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Знижка
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Статус
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Дії
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="item in list" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td v-if="item.label_id !== null" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ item.label.name }}
                        </td>
                        <td v-else class="px-6 py-3">
                            <select id="countries" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option v-for="label in page.props.labels" :value="label.id">{{ label.name }}</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            Silver
                        </td>
                        <td class="px-6 py-4">
                            Laptop
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            $2999
                        </td>
                        <td class="px-6 py-4">
                            <a @click.prevent="editForm(item)" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from '../Sidebar.vue';
import { ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

// const props = defineProps({
//     visits: Array,
//     labels: Array,
// });
const page = usePage();
let list = ref(page.props.visits);
// list.value = props.visits;

const visit = {
    id: null,
    label_id: null,
    visitors_number: null,
    discount: null,
    start_time: null,
};

let newVisitForm = false;

const editForm = () => {

}
const newVisit = () => {
    if (newVisitForm) {
        return;
    }

    newVisitForm = true;
    list.value.unshift(visit);
}
</script>

<style scoped>

</style>
