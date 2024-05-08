<template>
    <div class="grid grid-cols-4 gap-y-5 gap-x-4 w-full">
        <div
            v-for="(image, index) in associatedImagePaths"
            :key="index"
            class="col-span-1"
        >
            <img :src="'/' + image.path" alt="Product Image" :class="{'border-8 border-amber-400 border-solid': image.is_primary === 1}" @click="setNewPrimaryImage(image)"/>
            <p class="my-2">{{ image.filename }}</p>
        </div>
    </div>

    <input type="file" @change="handleFileUpload" id="file" class="border-gray-200 shadow-md border rounded-lg p-2"/>
    <!-- <Action label="Upload" @click="uploadImages()" class="flex justify-end"/> -->
</template>
<script>
import Action from './Action.vue';
export default {
    components: {
        Action,
    },
    props: {
        id: {
            type: Number,
            required: true,
        },
        identifier: {
            type: String,
            required: true,
        },
        images: {
            type: Array,
            required: true,
        },
    },
    data () {
        return {
            imageInput: null,
            associatedImagePaths: this.images ?? {},
        };
    },
    methods: {
        handleFileUpload(event) {
            this.imageInput = event.target.files[0];
            this.uploadImages();
            this.imageInput = null;
        },

        setNewPrimaryImage(i) {
            this.associatedImagePaths.forEach((image) => {
                image.is_primary = 0;
            });

            i.is_primary = 1;

            this.$emit('primaryImageId', i.id);
        },

        uploadImages() {
            let formData = new FormData();

            formData.append("image", this.imageInput);
            formData.append("id", this.id);
            formData.append("identifier", this.identifier);

            axios
                .post('/admin/images/upload', formData)
                .then((response) => {
                    this.associatedImagePaths.push(response.data.file);
                })
                .catch((error) => {
                    console.error(
                        "Error uploading file:",
                        error.response.data.error
                    );
                });
        },
    },
    emits: ['primaryImageId'],
};
</script>
