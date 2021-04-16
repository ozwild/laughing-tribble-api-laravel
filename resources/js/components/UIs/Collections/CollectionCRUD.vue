<template>
    <div>
        <ui-crud :url="url">
            <template v-slot:listing="{ props: { edit } }">
                <row>
                    <grid>
                        <label for="collection-selector">Collection</label>
                    </grid>
                </row>
                <row variant="auto-row">
                    <div style="flex: 3 auto"></div>
                    <button
                        v-if="localValue"
                        @click="edit(localValue.id)"
                        class="ml-1"
                    ></button>
                </row>
            </template>

            <template v-slot:editing="{ props: { url, editingId, end } }">
                <collections-form
                    :url="url"
                    :id="editingId"
                    :end="end"
                    v-on:updated="handleUpdate"
                ></collections-form>
            </template>

            <template v-slot:creating="{ props: { url, end } }">
                <collections-form
                    :url="url"
                    :end="end"
                    v-on:created="handleCreation"
                ></collections-form>
            </template>
        </ui-crud>
    </div>
</template>

<script>
import Table from "./Table";
import CollectionsIndexTable from "./Table";
import CollectionsForm from "./Form";
import { CRUD } from "../../CRUD";
import { Row, Grid } from "../../Common";

export default {
    name: "collection-crud",
    props: ["account", "value"],
    components: {
        CollectionsIndexTable,
        CollectionsForm,
        Table,
        Row,
        CRUD,
    },
    data() {
        return {};
    },
    computed: {
        url() {
            return `accounts/${this.account.id}/collections`;
        },
        localValue: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit("input", value);
            },
        },
    },
    methods: {
        handleUpdate(collection) {
            console.log(collection);
            this.$emit("input", collection);
        },
        handleCreation(collection) {
            this.$emit("input", collection);
        },
    },
};
</script>

<style scoped></style>
