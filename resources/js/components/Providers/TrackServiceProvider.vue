<template>
    <vue-simple-spinner v-if="loading"></vue-simple-spinner>
    <div v-else>
        <slot :tracks="tracks" :loading="loading"></slot>
    </div>
</template>

<script>
export default {
    name: "track-service-provider",
    props: ['account', 'collection'],
    data() {
        return {
            tracks: null,
            track: null,
            loading: true
        }
    },
    watch: {
        $props: {
            handler() {
                if (this.account)
                    this.get();
            },
            deep: true,
            immediate: true,
        }
    },
    methods: {
        get() {
            const collectionQuery = this.collection ? `collectionId=${this.collection.id}` : '';
            this.$http.get(`accounts/${this.account.id}/tracks?${collectionQuery}`)
                .then(({data}) => {
                    this.tracks = data;
                    this.loading = false;
                })
        }
    }
}
</script>

<style scoped>

</style>
