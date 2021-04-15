<template>
    <div :class="`card elevation-${elevation}`" :style="`z-index: ${index}`">
        <div class="card-content">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "card",
    props: {
        index: {
            type: Number,
            default: 1,
        },
        elevation: {
            type: Number,
            default: 2
        }
    },
}
</script>

<style scoped>
.card {
    position: relative;
    background: white;
    border: 1px solid #fefefe;
    z-index: 1;
}

.card.elevation-0 {
    box-shadow: none;
}

.card.elevation-1 {
    box-shadow: 0 0 4px -1px rgba(0, 0, 0, 0.25);
}

.card.elevation-2 {
    box-shadow: 0 0 8px -2px rgba(0, 0, 0, 0.25);
}

.card.elevation-3 {
    box-shadow: 0 0 16px -2px rgba(0, 0, 0, 0.25);
}

.card .card-content {
    padding: 1em 2em;
}
</style>
