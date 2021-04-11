<template>
    <div class="card">
        <div class="card-content">
            <slot></slot>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card.vue"
}
</script>

<style scoped>
.card {
    background: white;
    border: 1px solid #fefefe;
    box-shadow: 0 0 8px -2px rgba(0, 0, 0, 0.25);
}

.card .card-content {
    padding: 1em 2em;
}
</style>
