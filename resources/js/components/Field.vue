<template>
    <div>
        <label v-if="label" :for="id" v-html="label"></label>
        <input class="u-full-width"
               :type="type"
               :placeholder="placeholder"
               :id="id"
               v-model="localValue"
        />
    </div>
</template>

<script>
export default {
    name: 'ui-field',
    props: {
        value: {
            type: null,
        },
        label:{
            default: null,
            type: String,
        },
        id: {
            default: '',
            type: String
        },
        type: {
            default: 'text',
            type: String
        },
        placeholder: {
            default: '',
            type: String
        }
    },

    computed: {
        localValue: {
            get() {
                return this.value
            },
            set(value) {
                this.$emit('input', value)
            }
        }
    }
}
</script>
