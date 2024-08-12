<template>
    <Sidebar/>

    <div class="p-16 sm:ml-64">
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="flex p-6">
                    <h2 class="text-2xl font-bold dark:text-white">Візити</h2>

                    <button v-if="newVisitForm" type="button" :disabled="newVisitForm" class="inline-flex ml-auto items-center text-white bg-blue-400 dark:bg-blue-500 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Новий візит
                        <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </button>

                    <button v-else type="button" @click.prevent="newVisit" class="inline-flex ml-auto items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Новий візит
                        <svg class="w-4 h-4 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/>
                        </svg>
                    </button>

                </div>

                <table v-if="list.length" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Деталі</th>
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
                        <th scope="col" class="px-6 py-3 ">
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
                    <visit-row v-if="newVisitForm" v-model="visit" key="new" @cancel="cancel()"></visit-row>
                    <visitor-row v-if="newVisitForm" v-model="visit"></visitor-row>
                    <template v-for="(item, index) in list" :key="item.id">
                        <visit-row v-model="list[index]" :index="index" @toggleVisitors="toggleVisitors"></visit-row>
                        <visitor-row v-model="list[index]" v-if="isOpen[index]"></visitor-row>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script setup>
import Sidebar from '../Sidebar.vue';
import { ref, watch } from 'vue';
import { usePage } from '@inertiajs/vue3';
import VisitRow from './VisitRow.vue';
import VisitorRow from './VisitorRow.vue';

const page = usePage();
const list = ref(page.props.visits);

const visitor = {
    id: null,
    discount_id: null,
    start_time: null,
    end_time: null,
    status: null,
    user: {},
};

const defaultVisit = {
    id: null,
    label_id: null,
    visit_type_id: null,
    visitors_number: 1,
    discount: null,
    start_time: null,
    visit_type: {},
    label: {},
    visitors: [{ ...visitor }],
};

const visit = ref(defaultVisit);
const newVisitForm = ref(false);

watch(() => visit.value.visitors_number,
    (newValue, oldValue) => {
        if (newValue > oldValue) {
            visit.value.visitors.push({ ...visitor });
        } else if (oldValue > newValue) {
            visit.value.visitors.pop();
        }
    },
{ deep: true });


const newVisit = () => {
    if (newVisitForm.value) {
        return;
    }

    newVisitForm.value = true;
}

const cancel = () => {
    newVisitForm.value = false;
    visit.value = defaultVisit;
};

const isOpen = ref({});

const toggleVisitors = (event) => {
    console.log('wee')
    console.log(event)
    isOpen.value[event] = !isOpen.value[event];
}

</script>
