<template>
    <table class="table table-hover">
        <thead>
            <tr>
                <slot name="header"></slot>
            </tr>
        </thead>
        <tbody>
            <tr v-if="loading">
                <td colspan="100%" class="loading">
                    <slot name="loading">
                        <spinner class="mx-auto"></spinner>
                        <h5>Loading...</h5>
                    </slot>
                </td>
            </tr>
            <tr v-else-if="!loading && data.length === 0">
                <td colspan="100%" class="zero-state">
                    <slot name="zero-state">
                        <h5>No data to show</h5>
                    </slot>
                </td>
            </tr>
            <tr v-else :key="row.id" v-for="row in data">
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
        loading: {
            type: Boolean,
            default: false,
        },
    },
    data() {
        return {
            collection: null,
        };
    },
};
</script>
<style scoped lang="scss">
.zero-state {
    text-align: center;
    padding: 2em 0;
}
.loading {
    text-align: center;
    padding: 2em 0;
}
</style>
