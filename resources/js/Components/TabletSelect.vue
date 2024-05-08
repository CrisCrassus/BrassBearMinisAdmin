<template>
    <Label>{{ label }}</Label>
    <div class="flex justify-start gap-x-3 cursor-pointer">
        <div
            v-for="(item, index) in tablets"
            @click="deleteFeature(index)"
            class="bg-gray-200 text-gray-900 px-3 py-2 rounded-lg"
        >
            {{ item }}
        </div>
    </div>
    <div class="flex mt-4 gap-x-5">
        <SelectMenu v-model="model" :objectList="list" :asArray="asArray" />
        <button
            @click="addFeature(), $emit('tablets', tablets)"
            class="items-center bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center"
        >
            Add {{ label }}
        </button>
    </div>
</template>

<script>
import SelectMenu from './SelectMenu.vue';
import Label from './Label.vue';

export default {
    components: {
        Label,
        SelectMenu,
    },
    props: {
        label: {
            type: String,
            required: true,
        },
        list: {
            type: Array,
            required: true,
        },
        currentTablets: {
            type: Array,
            required: true,
        },
        asArray: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            model: null,
            tablets: this.currentTablets ?? [],
        };
    },
    methods: {
        addFeature() {
            if (this.model !== null) {
                this.tablets.push(this.model);
                this.model = null;
            }
        },
        deleteFeature(index) {
            this.tablets.splice(index, 1);
        },
    },
    emits: ['tablets'],
};
</script>
