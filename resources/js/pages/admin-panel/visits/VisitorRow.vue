<template>
    <tr>
        <td colspan="12" class="bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <table class="w-full pl-4 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead>
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th colspan="2" class="py-4 px-4"></th>
                    <th>Користувач</th>
                    <th>Час початку</th>
                    <th>Час закінчення</th>
                    <th>Знижка</th>
                    <th>Статус</th>
                    <th>Дії</th>
                </tr>
                </thead>

                <tbody>

                <tr v-for="(item, index) in modelValue.visitors" class="border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th class="py-4 px-4"></th>
                    <td class="w-4 p-4">
                        <div class="flex items-center">
                            <input id="checkbox-table-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-table-1" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <td>Google</td>
                    <td>U$8.00000 </td>
                    <td> 2016/09/27</td>
                    <td> 2017/09/27</td>
                    <td> 2017/09/27</td>
                    <td> 2017/09/27</td>
                </tr>

                </tbody>
            </table>
        </td>
    </tr>
</template>

<script setup>
const props = defineProps({
    modelValue: {
        type: Object,
        required: false,
    },
});
</script>
