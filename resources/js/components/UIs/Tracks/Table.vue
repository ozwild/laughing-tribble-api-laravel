<template>
    <div class="track-table-wrapper">
        <ui-index-table :data="data">
            <template v-slot:body="{row}">
                <td v-html="row.title"></td>
                <td>
                    <button @click="edit(row.id)">
                        <edit-2-icon size="1.25x"></edit-2-icon>
                    </button>
                </td>
            </template>
        </ui-index-table>
    </div>
</template>

<script>
import {Edit2Icon} from 'vue-feather-icons'

export default {
    name: "tracks-index-table",
    props: ['data', 'edit'],
    components: {Edit2Icon}
}
</script>

<style scoped>
.track-table-wrapper {
    max-height: 30em;
    overflow: auto;
}
</style>
