<template>
    <a v-if="link != '#'" :href="link" target="_blank">
        <div
            class="bg-blue-300 hover:bg-blue-400 transition-all duration-200 w-44 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
        >
            {{ label }}
        </div>
    </a>


    <div v-else>
        <div
            class="bg-blue-300 hover:bg-blue-400 transition-all duration-200 w-44 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
        >
            {{ label }}
        </div>
    </div>
</template>

<script>



export default {
    props: {
        label: {
            type: String,
            required: true
        },
        link: {
            type: String,
            default: "#"
        }
    },
}
</script>
