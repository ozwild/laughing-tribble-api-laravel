<template>
    <label v-if="label" class="form-label" :for="id" v-html="label"></label>
    <input
        v-bind="$attrs"
        class="form-control"
        :name="name"
        :type="type"
        :placeholder="placeholder"
        :id="id"
        v-model="localValue"
    />
</template>

<script>
export default {
    name: "ui-field",
    props: {
        modelValue: {
            type: null,
        },
        label: {
            default: null,
            type: String,
        },
        id: {
            default: "",
            type: String,
        },
        name: {
            default: "",
            type: String,
        },
        type: {
            default: "text",
            type: String,
        },
        placeholder: {
            default: "",
            type: String,
        },
    },

    computed: {
        localValue: {
            get() {
                return this.modelValue;
            },
            set(value) {
                this.$emit("update:modelValue", value);
            },
        },
    },
};
</script>
