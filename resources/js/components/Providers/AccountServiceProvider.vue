<template>
    <slot v-bind:account="account"></slot>
</template>

<script>

export default {
    name: "account-service-provider",
    props: ['userId'],
    data() {
        return {
            account: null
        }
    },
    mounted() {
        this.get();
    },
    methods: {
        get() {
            this.$http.get(`users/${this.userId}`)
                .then(({data}) => {
                    console.log(data);
                    this.user = data;
                    this.account = data.account;
                    this.ready = true;
                })
        }
    }
}
</script>

<style scoped>

</style>
