<template>
    <form :class="`crud-form u-full-width ${ready?'loaded':''}`" v-else @submit.prevent="save()">
        <container>
            <h5 v-html="formTitle"></h5>
            <slot :data="data"></slot>
            <separator size="lg"></separator>
            <row>
                <grid class="align-right">
                    <input class="" type="button" @click="cancel()" value="Cancelar">
                    <input class="button-primary ml-1" type="submit" value="Submit">
                </grid>
            </row>
        </container>
    </form>
</template>

<script>
import axios from 'axios';
import Vue from "vue";

export default {
    name: 'ui-form',
    props: ['url', 'id', 'title'],
    data() {
        return {
            ready: false,
            data: {}
        }
    },
    mounted() {
        if (this.id)
            this.get();
        else
            this.ready = true;
    },
    computed: {
        formTitle() {
            return this.title ?? this.id ? "Editando" : "Añadiendo";
        }
    },
    methods: {
        get() {
            this.$http.get(`${this.url}/${this.id}`)
                .then(({data}) => {
                    this.data = data;
                    this.ready = true;
                })
        },
        save() {
            this.id ? this.update() : this.store();
        },
        cancel() {
            this.ready = false;
            setTimeout(() => {
                this.$emit('cancel')
            }, 500)

        },
        store() {
            this.$http.post(this.url, this.data)
                .then(({data}) => {
                    Vue.$toast.success('Cambios guardados!')
                    this.ready = false;
                    setTimeout(() => {
                        this.$emit('save')
                        this.$emit('created', data)
                    }, 500)
                })
                .catch(() => {
                    Vue.$toast.error('Algo salio mal!')
                })
        },
        update() {
            this.$http.patch(`${this.url}/${this.id}`, this.data)
                .then(({data}) => {
                    Vue.$toast.success('Cambios guardados!')
                    this.ready = false;
                    setTimeout(() => {
                        this.$emit('save')
                        this.$emit('updated', data)
                    }, 500)
                })
                .catch(() => {
                    Vue.$toast.error('Algo salio mal!')
                })
        }
    }
}
</script>
<style>
.crud-form {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    transition: opacity 0.4s;
    opacity: 0;
    z-index: 500;
}

.crud-form > div {
    background: white;
    padding: 1em 3em;
    margin-top: 10vh;
    box-shadow: 0 -2px 14px 0 rgba(0, 0, 0, 0.23);
    border: 1px solid lightgray;
    transform: translate(0, -100vh);
    transition: transform 0.4s;
}

.crud-form.loaded {
    opacity: 1;
}

.crud-form.loaded > div {
    transform: translate(0, 0);
}
</style>
