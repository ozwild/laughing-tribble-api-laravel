<template>
    <vue-simple-spinner v-if="loading"></vue-simple-spinner>
    <div v-else>
        <slot :user="user" :loading="loading"></slot>
    </div>
</template>

<script>

export default {
    name: "user-service-provider",
    props: ['userId'],
    data() {
        return {
            user: null,
            loading: true
        }
    },
    mounted() {
        this.get();
    },
    methods: {
        get() {
            this.$http.get(`users/${this.userId}`)
                .then(({data}) => {
                    this.user = data;
                    this.loading = false;
                })
        }
    }
}
</script>

<style scoped>

</style>
