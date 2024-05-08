<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    unitTypes: {
        type: Array,
        required: true,
    },
});
</script>

<template>
    <Head title="Unit Types" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Unit Types
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-4 sm:p-6 lg:p-8 bg-white rounded-lg border border-solid"
                >
                    <div class="flex justify-between">
                        <div class="text-gray-500">
                            You're viewing the Unit Types page!
                        </div>
                        <a :href="route('unit-types.add')">
                            <button
                                class="bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center items-center"
                            >
                                Add Unit Type
                            </button>
                        </a>
                    </div>
                    <div
                        class="rounded-lg overflow-hidden border-1 border-solid border-gray-300 my-5 shadow-xl"
                    >
                        <table class="w-full">
                            <thead
                                class="bg-gray-50 border-b border-gray-300 border-solid text-sm"
                            >
                                <tr>
                                    <th class="text-left py-3 px-2">Title</th>
                                    <th class="text-left py-3 px-2">Slug</th>
                                    <th class="text-left py-3 px-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(unitType, index) in unitTypes"
                                    :key="unitType.title"
                                    :class="{
                                        'border-b':
                                            index !== unitTypes.length - 1,
                                    }"
                                >
                                    <td class="py-3 px-2 text-xs">
                                        {{ unitType.title }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ unitType.slug }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        <a :href="route('unit-types.edit', unitType.slug)">
                                            <button
                                            class="bg-gray-400 text-xs hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-2 flex justify-center items-center"
                                        >
                                            Edit
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
