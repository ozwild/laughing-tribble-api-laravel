<template>
    <div class="track-table-wrapper">
        <ui-index-table :data="data">
            <template v-slot:body="{ row }">
                <td v-html="row.title"></td>
                <td>
                    <button @click="edit(row.id)"></button>
                </td>
            </template>
        </ui-index-table>
    </div>
</template>

<script>
export default {
    name: "tracks-index-table",
    props: ["data", "edit"],
    components: {},
};
</script>

<style scoped>
.track-table-wrapper {
    max-height: 30em;
    overflow: auto;
}
</style>
