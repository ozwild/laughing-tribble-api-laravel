<template>
    <ui-index-table :data="data">
        <template v-slot:body="{ row }">
            <grid :size="2">
                <button class="rounded" @click="edit(row.id)"></button>
            </grid>
            <grid :size="10" v-html="row.title"></grid>
        </template>
    </ui-index-table>
</template>

<script>
export default {
    name: "collections-index-table",
    props: ["data", "edit"],
    components: {},
};
</script>

<style scoped></style>
