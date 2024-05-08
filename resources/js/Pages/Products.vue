<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import ServiceManager from "@/services/ServiceManager";

const props = defineProps({
    products: {
        type: Array,
        required: true,
    },
});

function deleteProduct(slug) {
    ServiceManager.deleteProduct(slug)
        .then(() => {
            window.location.reload();
        })
        .catch((error) => {
            console.error(error);
        });
}

</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-4 sm:p-6 lg:p-8 bg-white rounded-lg border border-solid"
                >
                    <div class="flex justify-between">
                        <div class="text-gray-500">
                            You're viewing the Products page!
                        </div>
                        <a :href="route('products.add')">
                            <button
                                class="bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center items-center"
                            >
                                Add Products
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
                                    <th class="text-left py-3 px-2">
                                        Published
                                    </th>
                                    <th class="text-left py-3 px-2">Title</th>
                                    <th class="text-left py-3 px-2">
                                        Identifier
                                    </th>
                                    <th class="text-left py-3 px-2">Price</th>
                                    <th class="text-left py-3 px-2">Range</th>
                                    <th class="text-left py-3 px-2">
                                        Featured
                                    </th>
                                    <th class="text-left py-3 px-2">
                                        Model Count
                                    </th>
                                    <th class="text-left py-3 px-2">Sold</th>
                                    <th class="text-left py-3 px-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(product, index) in products"
                                    :key="product.title"
                                    :class="{
                                        'border-b':
                                            index !== products.length - 1,
                                    }"
                                >
                                    <td class="py-3 px-2 text-xs">
                                        <div v-if="product.published">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6 text-green-500"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                        <div v-else>
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 24 24"
                                                fill="currentColor"
                                                class="w-6 h-6 text-red-600"
                                            >
                                                <path
                                                    fill-rule="evenodd"
                                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                                                    clip-rule="evenodd"
                                                />
                                            </svg>
                                        </div>
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ product.title }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ product.identifier }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        £{{ product.price }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ product.range.title }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ product.is_featured ? "Yes" : "No" }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ product.model_count }}
                                    </td>
                                    <td class="py-3 px-2 text-xs">
                                        {{ product.sold_at ? "Yes" : "-" }}
                                    </td>
                                    <td class="py-3 px-2 text-xs flex gap-x-4 items-center">
                                        <a
                                            :href="route('products.edit', product.slug)"
                                        >
                                            <button
                                                class="bg-gray-400 text-xs hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-2 flex justify-center items-center"
                                            >
                                                Edit
                                            </button>
                                        </a>
                                        <button
                                            @click="deleteProduct(product.slug)"
                                            class="bg-red-400 text-xs hover:bg-red-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-2 flex justify-center items-center"
                                        >
                                            Delete
                                        </button>
                                        <p>|</p>
                                        <a
                                            :href="route('fe.products.show', product.slug)"
                                            target="_blank"
                                        >
                                            <button
                                                class="bg-blue-400 text-xs hover:bg-blue-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-2 flex justify-center items-center"
                                            >
                                                View Live
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
@/services/ServiceManager
