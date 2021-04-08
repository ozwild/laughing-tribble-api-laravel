<template>
    <h1 v-if="loading">Loading...</h1>
    <form v-else @submit.prevent="save()">
        <slot :data="data"></slot>
        <separator size="lg"></separator>
        <input class="button-primary u-pull-right" type="submit" value="Submit">
    </form>
</template>

<script>
import axios from 'axios';
import Vue from "vue";

export default {
    name: 'ui-form',
    props: ['url', 'id'],
    data() {
        return {
            loading: true,
            data: {}
        }
    },
    mounted() {
        this.get();
    },
    methods: {
        get() {
            this.loading = true;
            axios.get(`${this.url}/${this.id}`)
                .then(({data}) => {
                    this.loading = false;
                    this.data = data;
                })
        },
        save() {
            this.id ? this.update() : this.store()
        },
        store() {

        },
        update() {
            axios.patch(`${this.url}/${this.id}`, this.data)
                .then(() => {
                    Vue.$toast.success('Cambios guardados!')
                })
                .catch(() => {
                    Vue.$toast.error('Algo salio mal!')
                })
        }
    }
}
</script>
