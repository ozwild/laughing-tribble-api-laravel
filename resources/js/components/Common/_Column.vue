<template>
    <div :class="columnClasses">
        <slot></slot>
    </div>
</template>
<script>
const columnSizeValidator = (value) => value > 0 && value <= 12;

export default {
    name: "column",
    props: {
        size: {
            type: Number,
            default: 12,
            validator: columnSizeValidator,
        },
        sm: {
            type: Number,
            default: null,
            validator: columnSizeValidator,
        },
        md: {
            type: Number,
            default: null,
            validator: columnSizeValidator,
        },
        lg: {
            type: Number,
            default: null,
            validator: columnSizeValidator,
        },
        xl: {
            type: Number,
            default: null,
            validator: columnSizeValidator,
        },
    },
    computed: {
        columnClasses() {
            const b = this.baseClass;
            const c = this.columnClass;
            return `${b()} ${c("sm")} ${c("md")} ${c("lg")} ${c("xl")}`;
        },
    },
    methods: {
        baseClass() {
            const value = this.size;
            return `col-${value}`;
        },
        columnClass(property) {
            const value = this[property];

            if (!value) {
                return "";
            }

            if (!value) {
                return "";
            }

            return `col-${property}-${value}`;
        },
    },
};
</script>
