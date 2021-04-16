<template>
    <table class="table">
        <thead>
            <tr>
                <slot name="header"></slot>
            </tr>
        </thead>
        <tbody>
            <tr :key="row.id" v-for="row in data">
                <slot name="body" v-bind:row="row"></slot>
            </tr>
        </tbody>
    </table>
</template>
<script>
export default {
    name: "ui-table",
    props: {
        data: {
            type: Array,
            default: [],
        },
    },
    data() {
        return {
            collection: null,
        };
    },
};
</script>
<style scoped>
.flex-table {
    display: flex;
}

.flex-table-body {
    display: flex;
    flex-direction: column;
}

.item {
}
</style>
