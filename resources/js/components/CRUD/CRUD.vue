<template>
    <div>
        <vue-simple-spinner v-if="loading"></vue-simple-spinner>
        <h1 v-if="invalid">Bad URL</h1>
        <div>
            <row>
                <grid>
                    <button
                        class="button-primary u-pull-right"
                        @click="creating = true"
                    ></button>
                </grid>
            </row>
            <row>
                <grid>
                    <slot
                        name="listing"
                        v-if="listing && !loading"
                        :props="{ url, data, edit }"
                    ></slot>
                    <slot
                        name="editing"
                        v-if="editingId"
                        :props="{ url, editingId, refresh, end }"
                    ></slot>
                    <slot
                        name="creating"
                        v-if="creating"
                        :props="{ url, refresh, end }"
                    ></slot>
                </grid>
            </row>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    name: "ui-crud",
    props: ["url"],
    components: {},
    data() {
        return {
            loading: false,
            invalid: false,
            data: [],
            listing: true,
            creating: false,
            editingId: null,
        };
    },
    mounted() {
        if (!this.url) {
            this.invalid = true;
            return;
        }
        this.refresh();
    },
    methods: {
        refresh() {
            this.loading = true;
            return this.$http
                .get(this.url)
                .then(({ data }) => {
                    this.data = data;
                })
                .finally(() => {
                    this.loading = false;
                });
        },
        edit(id) {
            this.editingId = id;
        },
        end(shouldRefresh = false) {
            this.editingId = null;
            this.creating = false;
            if (shouldRefresh) this.refresh();
        },
    },
};
</script>

<style scoped></style>
