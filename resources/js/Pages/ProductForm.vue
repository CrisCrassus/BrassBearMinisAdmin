<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import Label from "../Components/Label.vue";
import TextArea from "../Components/TextArea.vue";
import NumberInput from "../Components/NumberInput.vue";
import SelectMenu from "../Components/SelectMenu.vue";
import axios from "axios";
import BackPanel from "../Components/BackPanel.vue";
import ToggleableAction from "../Components/ToggleableAction.vue";
import CustomAction from "../Components/CustomAction.vue";
import Action from "../Components/Action.vue";
import TabletSelect from "../Components/TabletSelect.vue";
import TabletInput from "../Components/TabletInput.vue";
import ImageUpload from "../Components/ImageUpload.vue";
import { urls } from "../urls";

export default {
    components: {
        AuthenticatedLayout,
        Head,
        TextInput,
        Label,
        TextArea,
        NumberInput,
        SelectMenu,
        BackPanel,
        ImageUpload,
        ToggleableAction,
        CustomAction,
        TabletSelect,
        TabletInput,
        Action,
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
        materials: {
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
                      range_id: null,
                      unit_type_id: null,
                      ebay_link: "",
                      is_featured: false,
                      sold_at: false,
                      published: false,
                      features: [],
                      images: [],
                  },
            primaryImageId: null,
        };
    },
    methods: {
        saveProduct() {
            if (this.productToEdit) {
                const productData = {
                    product: this.product,
                    primaryImageId: this.primaryImageId ?? null
                };

                axios
                    .post(urls['products.update'] + this.product.slug, productData)
                    .then((response) => {
                        window.location.href = urls['products.index'];
                        console.log(response);
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                const productData = {
                    product: this.product,
                };

                axios
                    .post(urls['products.store'], productData)
                    .then((response) => {
                        window.location.href = urls['products.update'] + response.data.slug;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            }
        },
    },
};
</script>

<template>
    <Head v-if="productToEdit" title="Edit Product" />
    <Head v-else title="Add Product" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-if="productToEdit"
                >
                    Edit {{ product.title }} | {{ product.identifier }}
                </h2>
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-else
                >
                    Add Product
                </h2>
                <Label
                    v-if="product.sold_at !== null && product.sold_at !== false"
                    class="font-bold text-red-500 mb-0"
                    >Sold: {{ product.sold_at }}
                </Label>
                <CustomAction v-if="productToEdit && product.sold_at === null" falseColor="amber" label="Mark Sold" :value="this.product.sold_at" @input="($event) => {this.product.sold_at = new Date()}"/>

            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <BackPanel title="Model Properties">
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

                    <TabletInput label="Keywords" :currentTablets="this.product.keywords" @tablets="($event) => { this.product.keywords = $event}" />
                    <TabletInput label="Wargear" :currentTablets="this.product.wargear" @tablets="($event) => { this.product.wargear = $event}" />

                    <div>
                        <Label>Base Size (mm)</Label>
                        <NumberInput
                            v-model="product.base_size"
                            class="w-2/3"
                        ></NumberInput>
                    </div>
                </BackPanel>

                <BackPanel title="Sale Information">
                    <div>
                        <Label>Model Count</Label>
                        <NumberInput
                            v-model="product.model_count"
                            class="w-2/3"
                        ></NumberInput>
                    </div>
                    <TabletSelect label="Features" :currentTablets="this.product.features" :list="features" @tablets="($event) => { this.product.features = $event}"/>

                    <div>
                        <Label>Material</Label>
                        <div class="flex mt-4 gap-x-5">
                            <SelectMenu
                                v-model="this.product.material"
                                :objectList="this.materials"
                                :asArray="true"
                            />
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
                </BackPanel>

                <BackPanel v-if="productToEdit" title="Images">
                    <ImageUpload :images="this.product.images" :id="this.product.id" :identifier="this.product.identifier" @primaryImageId="($event) => {this.primaryImageId = $event}"/>
                </BackPanel>

                <BackPanel  title="Actions">
                    <div class="flex justify-between">
                        <ToggleableAction label="Featured" :value="this.product.is_featured" @input="($event) => {this.product.is_featured = $event}"/>
                        <ToggleableAction label="Published" :value="this.product.published" @input="($event) => {this.product.published = $event}"/>
                        <Action label="Save" @click="saveProduct()"/>
                        <Action label="View Live" :link="'/products/' + this.product.slug"/>
                    </div>
                </BackPanel>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
