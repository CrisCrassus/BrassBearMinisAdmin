<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import Label from "../Components/Label.vue";
import TextArea from "../Components/TextArea.vue";
import NumberInput from "../Components/NumberInput.vue";
import SelectMenu from "../Components/SelectMenu.vue";
import axios from "axios";

export default {
    components: {
        AuthenticatedLayout,
        Head,
        TextInput,
        Label,
        TextArea,
        NumberInput,
        SelectMenu,
    },
    props: {
        productToEdit: {
            type: Object,
            required: false,
            default: null,
        },
        features: {
            type: Array,
            required: true,
        },
        ranges: {
            type: Array,
            required: true,
        },
        unitTypes: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            product: this.productToEdit
                ? this.productToEdit
                : {
                      title: "",
                      description: "",
                      keywords: [],
                      wargear: [],
                      base_size: 0,
                      model_count: 0,
                      price: 0,
                      ebay_link: "",
                  },
            newKeyword: "",
            newWargear: "",
        };
    },
    methods: {
        addKeyword() {
            if (this.newKeyword !== "") {
                this.product.keywords.push(this.newKeyword);
                this.newKeyword = "";
            }
        },

        deleteKeyword(index) {
            this.product.keywords.splice(index, 1);
        },

        addWargear() {
            if (this.newWargear !== "") {
                this.product.wargear.push(this.newWargear);
                this.newWargear = "";
            }
        },

        deleteWargear(index) {
            this.product.wargear.splice(index, 1);
        },

        toggleFeatured() {
            this.product.is_featured = !this.product.is_featured;
        },

        togglePublished() {
            this.product.published = !this.product.published;
        },

        markSold() {
            this.product.sold_at = new Date();
        },

        saveProduct() {
            axios
                .post("/products/" + this.product.slug, this.product)
                .then((response) => {
                    console.log("HERE");
                    window.location.href = "/products";
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
};
</script>

<template>
    <Head v-if="product !== null" title="Edit Product" />
    <Head v-else title="Add Product" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-if="product !== null"
                >
                    Edit {{ product.title }} | {{ product.identifier }}
                </h2>
                <Label
                    v-if="product.sold_at !== null"
                    class="font-bold text-red-500"
                    >Sold: {{ product.sold_at }}
                </Label>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div
                    class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col gap-y-5"
                >
                    <div class="border-b border-gray-300 border-solid py-4">
                        <h4 class="text-2xl">Model Properties</h4>
                    </div>
                    <div>
                        <Label>Title</Label>
                        <TextInput
                            v-model="product.title"
                            class="w-2/3"
                        ></TextInput>
                    </div>
                    <div>
                        <Label>Description</Label>
                        <TextArea
                            v-model="product.description"
                            class="w-2/3"
                        ></TextArea>
                    </div>
                    <div>
                        <Label>Unit Types</Label>
                        <SelectMenu
                            v-model="product.unit_type_id"
                            :objectList="unitTypes"
                        >
                        </SelectMenu>
                    </div>
                    <div>
                        <Label>Range</Label>
                        <SelectMenu
                            v-model="product.range_id"
                            :objectList="ranges"
                        >
                        </SelectMenu>
                    </div>
                    <div>
                        <Label>Keywords</Label>
                        <div class="flex justify-start gap-x-3 cursor-pointer">
                            <div
                                v-for="(item, index) in product.keywords"
                                @click="deleteKeyword(index)"
                                class="bg-gray-200 text-gray-900 px-3 py-2 rounded-lg"
                            >
                                {{ item }}
                            </div>
                        </div>
                        <div class="flex mt-4 gap-x-5">
                            <TextInput class="w-1/5" v-model="newKeyword" />
                            <button
                                @click="addKeyword()"
                                class="items-center bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center"
                            >
                                Add Keyword
                            </button>
                        </div>
                    </div>
                    <div>
                        <Label>Wargear</Label>
                        <div class="flex justify-start gap-x-3 cursor-pointer">
                            <div
                                v-for="(item, index) in product.wargear"
                                @click="deleteWargear(index)"
                                class="bg-gray-200 text-gray-900 px-3 py-2 rounded-lg"
                            >
                                {{ item }}
                            </div>
                        </div>
                        <div class="flex mt-4 gap-x-5">
                            <TextInput class="w-1/5" v-model="newWargear" />
                            <button
                                @click="addWargear()"
                                class="items-center bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center"
                            >
                                Add Wargear
                            </button>
                        </div>
                    </div>

                    <div>
                        <Label>Base Size (mm)</Label>
                        <NumberInput
                            v-model="product.base_size"
                            class="w-2/3"
                        ></NumberInput>
                    </div>
                </div>
                <div
                    class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col gap-y-5"
                >
                    <div class="border-b border-gray-300 border-solid py-4">
                        <h4 class="text-2xl">Sale Information</h4>
                    </div>
                    <div>
                        <Label>Model Count</Label>
                        <NumberInput
                            v-model="product.model_count"
                            class="w-2/3"
                        ></NumberInput>
                    </div>
                    <div>
                        <Label>Features</Label>
                        <div class="flex justify-start gap-x-3 cursor-pointer">
                            <div
                                v-for="(item, index) in product.features"
                                @click="deleteWargear(index)"
                                class="bg-gray-200 text-gray-900 px-3 py-2 rounded-lg"
                            >
                                {{ item }}
                            </div>
                        </div>
                        <div class="flex mt-4 gap-x-5">
                            <SelectMenu
                                :objectList="features"
                                :asArray="true"
                            />
                            <!-- <button
                                @click="addWargear()"
                                class="items-center bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center"
                            >
                                Add Wargear
                            </button> -->
                        </div>
                    </div>
                    <div>
                        <Label>Price (£)</Label>
                        <NumberInput
                            v-model="product.price"
                            class="w-2/3"
                        ></NumberInput>
                    </div>
                    <div>
                        <Label>Ebay Link</Label>
                        <TextInput
                            v-model="product.ebay_link"
                            class="w-2/3"
                        ></TextInput>
                    </div>
                </div>
                <div
                    class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col gap-y-5"
                >
                    <div class="border-b border-gray-300 border-solid py-4">
                        <h4 class="text-2xl">Actions</h4>
                    </div>
                    <div class="flex justify-between">
                        <div>
                            <div
                                v-if="product.is_featured"
                                @click="toggleFeatured()"
                                class="bg-green-300 hover:bg-green-400 transition-all duration-200 w-44 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
                            >
                                Featured
                            </div>
                            <div
                                v-else
                                @click="toggleFeatured()"
                                class="bg-red-300 hover:bg-red-400 transition-all duration-200 inline-block w-44 py-4 px-5 rounded-lg text-center cursor-pointer"
                            >
                                Not Featured
                            </div>
                        </div>
                        <div>
                            <div
                                v-if="product.sold_at === null"
                                @click="markSold()"
                                class="w-44 bg-amber-300 hover:bg-amber-400 transition-all duration-200 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
                            >
                                Mark As Sold
                            </div>
                            <div
                                v-else
                                class="bg-green-300 hover:bg-green-400 transition-all duration-200 inline-block py-4 px-5 rounded-lg w-44 text-center cursor-pointer"
                            >
                                Sold
                            </div>
                        </div>
                        <div>
                            <div
                                v-if="product.published"
                                @click="togglePublished()"
                                class="w-44 bg-green-300 hover:bg-green-400 transition-all duration-200 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
                            >
                                Published
                            </div>
                            <div
                                v-else
                                @click="togglePublished()"
                                class="bg-amber-300 hover:bg-amber-400 transition-all duration-200 inline-block py-4 px-5 rounded-lg w-44 text-center cursor-pointer"
                            >
                                Unpublished
                            </div>
                        </div>
                        <div>
                            <div
                                @click="saveProduct()"
                                class="w-44 bg-blue-300 hover:bg-blue-400 transition-all duration-200 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
                            >
                                Save
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
