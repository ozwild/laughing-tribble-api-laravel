<template>
    <vue-simple-spinner v-if="loading"></vue-simple-spinner>
    <div v-else>
        <slot :collections="collections" :loading="loading"></slot>
    </div>
</template>

<script>
export default {
    name: "collection-service-provider",
    props: ['account'],
    data() {
        return {
            collections: null,
            collection: null,
            loading: true
        }
    },
    watch: {
        account() {
            const {account} = this;
            if (account) {
                this.get();
            }
        }
    },
    methods: {
        get() {
            this.$http.get(`accounts/${this.account.id}/collections`)
                .then(({data}) => {
                    this.collections = data;
                    this.loading = false;
                })
        }
    }
}
</script>

<style scoped>

</style>
