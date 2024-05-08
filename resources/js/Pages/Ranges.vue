<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import { ref } from "vue";
import ServiceManager from "@/services/ServiceManager";

const props = defineProps({
    ranges: {
        type: Array,
        required: true,
    },
});

function deleteRange() {
    ServiceManager.deleteRange(range.slug)
        .then(() => {
            window.location.href = route('ranges');
        })
        .catch((error) => {
            console.log(error);
        });
}

</script>

<template>
    <Head title="Ranges" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Ranges
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-4 sm:p-6 lg:p-8 bg-white rounded-lg border border-solid"
                >
                    <div class="flex justify-between">
                        <div class="text-gray-500">
                            You're viewing the Ranges page!
                        </div>
                        <a :href="route('ranges.add')">
                            <button
                            class="bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center items-center"
                        >
                            Add Range
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
                                    <th class="text-left py-3 px-2">
                                        Slug
                                    </th>
                                    <th class="text-left py-3 px-2">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(range, index) in ranges"
                                    :key="range.title"
                                    :class="{
                                        'border-b':
                                            index !== ranges.length - 1,
                                    }"
                                >
                                    <td class="py-3 px-2 text-xs">
                                        {{ range.title }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ range.slug }}
                                    </td>
                                    <td class="py-3 px-2 text-xs flex gap-x-4">
                                        <a :href="route('ranges.update', range.slug)">
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
