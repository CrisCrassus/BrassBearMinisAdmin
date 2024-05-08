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
import BannerUpload from "../Components/BannerUpload.vue";
import ServiceManager from "@/services/ServiceManager";
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
        BannerUpload,
        ToggleableAction,
        CustomAction,
        TabletSelect,
        TabletInput,
        Action,
    },
    props: {
        rangeToEdit: {
            type: Object,
            required: false,
            default: null,
        },
    },
    data() {
        return {
            range: this.rangeToEdit
                ? this.rangeToEdit
                : {
                      title: "",
                      description: "",
                      banner_path: "",
                  },
        };
    },
    methods: {
        saveRange() {
            if (this.rangeToEdit) {
                ServiceManager.updateRange(this.range)
                    .then(() => {
                        window.location.href = route('ranges');
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                ServiceManager.addRange(this.range)
                    .then((response) => {
                        window.location.href = route('ranges.update', response.data.slug);
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
    <Head v-if="rangeToEdit" title="Edit Range" />
    <Head v-else title="Add Range" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-if="rangeToEdit"
                >
                    Edit {{ range.title }}
                </h2>
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-else
                >
                    Add Range
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <BackPanel title="Range Properties">
                    <div>
                        <Label>Title</Label>
                        <TextInput
                            v-model="range.title"
                            class="w-2/3"
                        ></TextInput>
                    </div>
                    <div>
                        <Label>Description</Label>
                        <TextArea
                            v-model="range.description"
                            class="w-2/3"
                        ></TextArea>
                    </div>
                </BackPanel>

                <BackPanel v-if="rangeToEdit" title="Images">
                    <BannerUpload :range="range" @bannerPath="($event) => {this.range.banner_path = $event.banner_path}"/>
                </BackPanel>

                <BackPanel  title="Actions">
                    <div class="flex justify-between">
                        <Action label="Save" @click="saveRange()"/>
                    </div>
                </BackPanel>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
