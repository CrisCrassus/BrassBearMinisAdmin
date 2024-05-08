<script setup>

const model = defineModel({
    required: true,
});

defineProps({
    objectList: {
        required: true,
    },

    asArray: {
        type: Boolean,
        default: false,
    },
});

</script>

<template>
    <select v-model="model" class="w-2/3 border border-gray-300 rounded-md shadow-sm">
        <option v-if="!asArray" v-for="(object) in objectList" :key="object.id" :value="object.id">
            {{ object.title }}
        </option>
        <option v-if="asArray" v-for="(object, index) in objectList" :key="index" :value="object">
            {{ object }}
        </option>
    </select>
</template>
