<template>
    <div :class="`badge rounded-pill ${variant}`">
        <slot></slot>
    </div>
</template>
<script>
export default {
    name: "badge",
    props: {
        variant: {
            type: String,
            default: "bg-dark text-light",
        },
    },
};
</script>

<style></style>
