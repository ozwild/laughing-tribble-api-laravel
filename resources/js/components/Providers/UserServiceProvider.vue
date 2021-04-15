<template>
    <div>
        <slot :user="user" :loading="loading"></slot>
    </div>
</template>

<script>
import { provide, reactive } from "vue";

export default {
    name: "user-service-provider",
    mounted() {
        this.get();
    },
    setup() {
        const user = reactive({});

        const updateUser = (v) => {
            user.value = v;
        };

        provide("user", user);

        return {
            user,
            updateUser,
        };
    },
    props: ["userId"],
    data() {
        return {
            loading: true,
        };
    },
    methods: {
        get() {
            this.$http.get(`users/${this.userId}`).then(({ data }) => {
                this.updateUser(data);
                this.loading = false;
            });
        },
    },
};
</script>

<style scoped></style>
