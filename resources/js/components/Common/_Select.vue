<template>
    <select v-model="localValue" aria-label="Select Box">
        <option disabled value="">Please select one</option>
        <option :key="option.id" v-for="option in options" :value="option.id">
            <slot name="option" :option="option">{{
                option[label ? label : "name"]
            }}</slot>
        </option>
    </select>
</template>

<script>
export default {
    name: "vue-select",
    props: ["options", "label", "modelValue"],
    emits: ["update:modelValue"],
    computed: {
        localValue: {
            get() {
                return this.modelValue;
            },
            set(v) {
                this.$emit("update:modelValue", v);
            },
        },
    },
};
</script>

<style scoped>
select {
    outline: none;
    display: inline-block;
    transition: all 1s;
    font-size: 1.25em;
    padding: 4px 8px 4px 0px;
    background: none;
    border: none;
    border-bottom: 2px solid;
}
</style>
