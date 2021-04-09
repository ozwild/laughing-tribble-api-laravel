<template>
    <ui-index-table :data="data">
        <template v-slot:header>
            <th>ID</th>
            <th>Colección</th>
            <th>Art URL</th>
            <th></th>
        </template>
        <template v-slot:body="{row}">
            <td v-html="row.id"></td>
            <td v-html="row.title"></td>
            <td v-html="row.art_url"></td>
            <td>
                <button @click="edit(row.id)">
                    <edit-2-icon size="1.25x"></edit-2-icon>
                </button>
            </td>
        </template>
    </ui-index-table>
</template>

<script>
import {Edit2Icon} from 'vue-feather-icons'

export default {
    name: "collections-index-table",
    props: ['data', 'edit'],
    components: {Edit2Icon}
}
</script>

<style scoped>

</style>
