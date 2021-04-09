<template>
    <div>
        <ui-crud :url="url">
            <template v-slot:listing="{props:{ data, edit }}">

                <tracks-index-table :data="data" :edit="edit"></tracks-index-table>

            </template>

            <template v-slot:editing="{props:{url, editingId, end}}">

                <tracks-form :url="url" :id="editingId" :end="end"></tracks-form>

            </template>

            <template v-slot:creating="{props:{url,  end}}">

                <tracks-form :url="url" :end="end"></tracks-form>

            </template>
        </ui-crud>

    </div>
</template>

<script>
import Table from './Table'
import TracksIndexTable from "./Table";
import TracksForm from './Form';

export default {
    name: "track-crud",
    props: ['url'],
    components: {TracksIndexTable, TracksForm, Table}
}
</script>

<style scoped>

</style>
