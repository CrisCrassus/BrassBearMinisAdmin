<template>
    <div class="flex justify-center my-4">
        <img :src="'/' + this.rangeInput.banner_path">
    </div>

    <input type="file" @change="handleFileUpload" id="file" class="border-black border rounded-lg p-2"/>
</template>
<script>
import Action from './Action.vue';
export default {
    components: {
        Action,
    },
    props: {
        range: {
            type: Object,
            required: false,
            default: null,
        },
    },
    data () {
        return {
            imageInput: null,
            rangeInput: this.range ?? null,
        };
    },
    methods: {
        handleFileUpload(event) {
            this.imageInput = event.target.files[0];
            this.uploadImages();
            this.imageInput = null;
        },

        uploadImages() {
            let formData = new FormData();

            formData.append("image", this.imageInput);
            formData.append("slug", this.rangeInput.slug);

            axios
                .post('/admin/images/bannerUpload', formData)
                .then((response) => {
                    this.rangeInput.banner_path = response.data.file.path;
                    this.$emit('bannerPath', this.rangeInput);
                })
                .catch((error) => {
                    console.error(
                        "Error uploading file:",
                        error.response.data.error
                    );
                });
        },
    },
    emits: ['bannerPath'],
};
</script>
