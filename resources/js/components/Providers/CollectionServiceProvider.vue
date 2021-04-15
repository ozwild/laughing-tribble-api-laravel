<template>
    <div>
        <slot
            :collections="collections.value"
            :collection="collection"
            :loading="loading"
        ></slot>
    </div>
</template>

<script>
import { inject, provide, reactive, readonly } from "vue";
export default {
    name: "collection-service-provider",
    setup() {
        const account = inject("account");

        const collections = reactive([]);
        const collection = reactive({});

        const setCollections = (v) => {
            collections.value = v;
        };

        const setCollection = (v) => {
            collection.value = v;
        };

        provide("collections", readonly(collections));
        provide("setCollections", setCollections);
        provide("collection", readonly(collection));
        provide("setCollection", setCollection);

        return {
            account,
            collections,
            setCollections,
            collection,
            setCollection,
        };
    },
    data() {
        return {
            loading: false,
        };
    },
    watch: {
        "account.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.get();
            }
        },
    },
    methods: {
        get() {
            this.loading = true;
            this.$http
                .get(`accounts/${this.account.value.id}/collections`)
                .then(({ data }) => {
                    this.setCollections(data);
                    this.loading = false;
                });
        },
    },
};
</script>

<style scoped></style>
