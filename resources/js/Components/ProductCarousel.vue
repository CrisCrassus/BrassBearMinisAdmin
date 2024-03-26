<template>
    <img :src="paths[currentImage]" alt="" />
    <div class="grid grid-cols-3 gap-12 mt-5">
        <div v-for="(path, index) in paths" @click="changeImage(index)" class="cursor-pointer">
            <img
                :src="path"
                alt=""
                class="border-2 border-transparent"
                :class="{ 'border-2 border-primary': index === currentImage }"
            />
        </div>
    </div>
</template>
<script>
export default {
    props: {
        paths: {
            type: Array,
            required: true,
        },
    },
    data() {
        return {
            currentImage: 0,
        };
    },
    methods: {
        changeImage(index) {
            this.currentImage = index;
        },
    },
};
</script>
