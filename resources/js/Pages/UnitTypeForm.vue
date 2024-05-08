<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import TextInput from "@/Components/TextInput.vue";
import Label from "../Components/Label.vue";
import TextArea from "../Components/TextArea.vue";
import BackPanel from "../Components/BackPanel.vue";
import Action from "../Components/Action.vue";
import ServiceManager from "@/services/ServiceManager";

export default {
    components: {
        AuthenticatedLayout,
        Head,
        TextInput,
        Label,
        TextArea,
        BackPanel,
        Action,
    },
    props: {
        unitTypeToEdit: {
            type: Object,
            required: false,
            default: null,
        },
    },
    data() {
        return {
            unitType: this.unitTypeToEdit
                ? this.unitTypeToEdit
                : {
                      title: "",
                      description: "",
                      slug: "",
                  },
        };
    },
    methods: {
        saveUnitType() {
            if (this.unitTypeToEdit) {
                ServiceManager.updateUnitType(this.unitType)
                    .then(() => {
                        window.location.href = route('unitTypes');
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                ServiceManager.addUnitType(this.unitType)
                    .then(() => {
                        window.location.href = route('unitTypes');
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
    <Head v-if="unitTypeToEdit" title="Edit Unit Type" />
    <Head v-else title="Add Unit Type" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-if="unitTypeToEdit"
                >
                    Edit {{ unitType.title }}
                </h2>
                <h2
                    class="font-semibold text-xl text-gray-800 leading-tight"
                    v-else
                >
                    Add Unit Type
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <BackPanel title="Unit Type Properties">
                    <div>
                        <Label>Title</Label>
                        <TextInput
                            v-model="unitType.title"
                            class="w-2/3"
                        ></TextInput>
                    </div>
                    <div>
                        <Label>Description</Label>
                        <TextArea
                            v-model="unitType.description"
                            class="w-2/3"
                        ></TextArea>
                    </div>
                </BackPanel>

                <BackPanel  title="Actions">
                    <div class="flex justify-between">
                        <Action label="Save" @click="saveUnitType()"/>
                    </div>
                </BackPanel>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
