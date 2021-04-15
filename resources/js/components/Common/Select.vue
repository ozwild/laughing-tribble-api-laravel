<template>
    <div>
        <select
            v-model="localValue"
            aria-label="Select Box"
            class="form-select"
        >
            <option disabled value="">Please select one</option>
            <option
                :key="option.id"
                v-for="option in options"
                :value="option.id"
            >
                <slot name="option" :option="option">{{
                    option[label ? label : "name"]
                }}</slot>
            </option>
        </select>
    </div>
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

<style scoped></style>
