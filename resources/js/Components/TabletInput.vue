<template>
    <Label>{{ label }}</Label>
    <div class="flex justify-start gap-3 cursor-pointer flex-wrap">
        <div
            v-for="(item, index) in tablets"
            @click="deleteInput(index)"
            class="bg-gray-200 text-gray-900 px-3 py-2 rounded-lg capitalize"
        >
            {{ item }}
        </div>
    </div>
    <div class="flex mt-4 gap-x-5">
        <TextInput @keyup.enter="addInput(), $emit('tablets', tablets)" class="w-1/5" v-model="input" />
        <button
            @click="addInput(), $emit('tablets', tablets)"
            class="items-center bg-gray-400 hover:bg-gray-600 text-white outline-none focus:outline focus:outline-black transition-all duration-200 rounded-lg px-4 py-3 flex justify-center"
        >
            Add {{ label }}
        </button>
    </div>
</template>

<script>
import Label from './Label.vue';
import TextInput from './TextInput.vue';

export default {
    components: {
        Label,
        TextInput,
    },
    props: {
        label: {
            type: String,
            required: true,
        },
        currentTablets: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            input: '',
            product: this.currentTablets,
            tablets: this.currentTablets ?? [],
        };
    },
    methods: {
        addInput() {
            this.input = this.input.trim();
            this.input = this.input.toLowerCase();
            if ((this.input !== '' || this.input !== null) && !this.tablets.includes(this.input)) {
                this.tablets.push(this.input);
                this.input = '';
            }
        },



        deleteInput(index) {
            this.tablets.splice(index, 1);
        },
    },
    emits: ['tablets'],

};

</script>
