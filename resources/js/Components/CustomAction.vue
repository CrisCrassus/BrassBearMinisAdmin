<template>
    <div>
        <div
            v-if="value !== null"
            @click="toggle()"
            :class="'bg-' + trueColor + '-300 hover:bg-' + trueColor + '-400'"
            class="transition-all duration-200 w-44 inline-block py-4 px-5 rounded-lg text-center cursor-pointer"
        >
            {{ label }}
        </div>
        <div
            v-else
            @click="toggle()"
            :class="'bg-' + falseColor + '-300 hover:bg-' + falseColor + '-400'"
            class="transition-all duration-200 inline-block w-44 py-4 px-5 rounded-lg text-center cursor-pointer"
        >
            {{ label }}
        </div>
    </div>
</template>

<script>



export default {
    props: {
        value: {
            required: true
        },

        label: {
            type: String,
            required: true
        },


        trueColor: {
            type: String,
            default: 'green'
        },

        falseColor: {
            type: String,
            default: 'red'
        }

    },
    methods: {
        toggle() {
            this.$emit('input', !this.value);
        }
    }
}
</script>
