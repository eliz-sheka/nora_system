<template>
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="w-4 p-4">
            <button @click.prevent="emit('toggleVisitors', index)">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                </svg>
            </button>
        </td>
        <td class="w-4 p-4">
            <div class="flex items-center">
                <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="checkbox-table-1" class="sr-only">checkbox</label>
            </div>
        </td>
        <td v-if="modelValue.label_id !== null" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ modelValue.label.name }}
        </td>
        <td v-else class="px-6 py-3">
            <select id="countries" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option v-for="label in page.props.labels" :value="label.id">{{ label.name }}</option>
            </select>
        </td>
        <td v-if="modelValue.visit_type_id !== null" class="px-6 py-4">
            {{ modelValue.visit_type.description }}
        </td>
        <td v-else class="px-6 py-3">
            <select id="countries" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option v-for="visitType in page.props.visit_types" :value="visitType.id">{{ visitType.description }}</option>
            </select>
        </td>
        <td v-if="modelValue.id && modelValue.visitors.length > 0" class="px-6 py-4 ">
            {{ modelValue.visitors.length }}
        </td>
        <td v-else class="px-6 py-4 ">
            <input v-model="modelValue.visitors_number" type="number" id="number-input" min="1" max="30" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required />
        </td>
        <td v-if="modelValue.start_time !== null" class="px-6 py-4">
            {{ modelValue.start_time }}
        </td>
        <td v-else class="px-6 py-4">
            <vue-timepicker format="HH:mm"
                            close-on-complete
                            :hour-range="[8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]"
                            hide-disabled-hours
                            v-model="modelValue.start_time"
                            :minute-interval="10"></vue-timepicker>
<!--            <input type="time" id="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="08:00" max="22:00" value="12:00" required />-->
        </td>
        <td v-if="modelValue.visitors.length > 0" class="px-6 py-4">
            {{ discountValue ? '+' : '-' }}
        </td>
        <td v-else class="px-6 py-3">
            <select id="countries" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option :value="null"> Без знижки </option>
                <option v-for="discount in page.props.discounts" :value="discount.id">{{ discount.name }}</option>
            </select>
        </td>
        <td v-if="modelValue.id" class="px-6 py-4">
            TODO
        </td>
        <td v-else class="px-6 py-3">
            New
        </td>
        <td v-if="modelValue.id" class="px-6 py-4 accordion-toggle" data-toggle="collapse" data-target="#demo1">
            <button class="btn btn-default btn-xs">Open</button>
            <a @click.prevent="editForm(item)" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        </td>
        <td v-else class="px-6 py-4">
            <a @click.prevent="emit('cancel')" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2">Cancel</a>
            <a @click.prevent="save(item)" href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Save</a>
        </td>
    </tr>
</template>

<script setup>
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import VueTimepicker from '../../../components/VueTimepicker.vue';

const page = usePage();
const props = defineProps({
    modelValue: {
        type: Object,
        required: false,
    },
    index: {
        type: Number,
    }
});

const emit = defineEmits(['cancel', 'toggleVisitors']);

const editForm = () => {

}

const discountValue = computed(() => Boolean(props.modelValue.visitors.some((visitor) => visitor.discount !== undefined)));

</script>
