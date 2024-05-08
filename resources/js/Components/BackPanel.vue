<template>
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg flex flex-col gap-y-5">
        <div class="border-b border-gray-300 border-solid py-4">
            <h4 class="text-2xl">{{ title }}</h4>
        </div>
        <slot></slot>
    </div>
</template>

<script>

export default {
    name: "BackPanel",
    props: {
        title: {
            type: String,
            required: true,
        }
    }
}

</script>
