<template>
    <div class="fluid-image" :style="`background-image: url(${source})`"></div>
</template>

<script>
export default {
    name: "fluid-image",
    props: ['source']
}
</script>

<style scoped>
.fluid-image {
    padding: 50%;
    background-size: cover;
    background-position: 50%;
}
</style>
