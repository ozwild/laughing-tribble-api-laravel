<template>
    <div>
        <vue-simple-spinner v-if="loading"></vue-simple-spinner>
        <h1 v-if="invalid">Bad URL</h1>
        <div>
            <row>
                <grid>
                    <button class="button-primary u-pull-right" @click="creating = true">
                        <plus-icon size="1x"></plus-icon>
                    </button>
                </grid>
            </row>
            <row>
                <grid>
                    <slot name="listing" v-if="listing && !loading" :props="{url, data, edit}"></slot>
                    <slot name="editing" v-if="editingId" :props="{url, editingId, refresh, end}"></slot>
                    <slot name="creating" v-if="creating" :props="{url, refresh, end}"></slot>
                </grid>
            </row>
        </div>
    </div>
</template>

<script>
import axios from "axios";
import {PlusIcon} from 'vue-feather-icons'

export default {
    name: "ui-crud",
    props: ['url'],
    components: {PlusIcon},
    data() {
        return {
            loading: false,
            invalid: false,
            data: null,
            listing: true,
            creating: false,
            editingId: null
        }
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
            return axios.get(this.url)
                .then(({data}) => {
                    this.data = data;
                    this.loading = false;
                })
        },
        edit(id) {
            this.editingId = id;
        },
        end(shouldRefresh = false) {
            this.editingId = null;
            this.creating = false;
            if (shouldRefresh)
                this.refresh();
        }
    }
}
</script>

<style scoped>

</style>
