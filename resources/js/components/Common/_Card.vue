<template>
    <div class="card" :style="`z-index: ${index}`">
        <img v-if="imageSource" :src="imageSource" class="card-img-top" />
        <div class="card-body">
            <h5 v-if="title" class="card-title">{{ title }}</h5>
            <h6 v-if="subtitle" class="card-subtitle mb-2 text-muted">
                {{ subtitle }}
            </h6>
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
        title: {
            type: String,
            default: null,
        },
        subtitle: {
            type: String,
            default: null,
        },
        imageSource: {
            type: String,
            default: null,
        },
    },
};
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
