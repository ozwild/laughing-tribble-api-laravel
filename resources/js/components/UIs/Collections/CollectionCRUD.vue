<template>
    <div>
        <ui-crud :url="url">
            <template v-slot:listing="{props:{ data, edit }}">

                <collections-index-table :data="data" :edit="edit"></collections-index-table>

            </template>

            <template v-slot:editing="{props:{url, editingId, end}}">

                <collections-form :url="url" :id="editingId" :end="end"></collections-form>

            </template>

            <template v-slot:creating="{props:{url,  end}}">

                <collections-form :url="url" :end="end"></collections-form>

            </template>
        </ui-crud>

    </div>
</template>

<script>
import Table from './Table'
import CollectionsIndexTable from "./Table";
import CollectionsForm from './Form';

export default {
    name: "collection-crud",
    props: ['url'],
    components: {CollectionsIndexTable, CollectionsForm, Table}
}
</script>

<style scoped>

</style>
