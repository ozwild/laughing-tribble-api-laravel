<template>
    <div>
        <slot
            :collections="collections"
            :collection="collection"
            :loading="isLoadingCollections"
        ></slot>
    </div>
</template>

<script>
import { inject, provide, reactive, ref, toRefs, readonly } from "vue";
import axios from "axios";
export default {
    name: "collection-service-provider",
    setup() {
        const account = inject("account");
        const refreshTrigger = ref(1);
        const refresh = () => {
            refreshTrigger.value++;
        };

        const createCollection = (formData) => {
            return axios({
                method: "post",
                url: `/api/v1/accounts/${account.value.id}/collections`,
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                data: formData,
            }).then(() => {
                refresh();
            });
        };

        const updateCollection = async (collection, formData) => {
            formData.append("_method", "patch");
            return axios({
                method: "post",
                url: `/api/v1/accounts/${account.value.id}/collections/${collection.id}`,
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                data: formData,
            }).then(() => {
                refresh();
            });
        };

        const servicePayload = reactive({
            collections: [],
            collection: {},
            isLoadingCollections: false,
            refresh,
            createCollection,
            updateCollection,
            setCollections(v) {
                this.collections = v;
            },
            setCollectionById(id) {
                const [collection] = this.collections.filter(
                    (c) => (c.id === id)
                );

                if (collection) {
                    this.collection = collection;
                }
            },
            setCollection(v) {
                this.collection = v;
            },
        });

        provide("collection", readonly(servicePayload.collection));
        provide("collectionService", servicePayload);

        return {
            account,
            refreshTrigger,
            ...toRefs(servicePayload),
        };
    },
    data() {
        return {};
    },
    watch: {
        refreshTrigger(newValue, oldValue) {
            if (newValue !== oldValue) {
                this.get();
            }
        },
        "account.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.get();
            }
        },
    },
    methods: {
        get() {
            const accountId = this.account.value.id;
            this.isLoadingCollections = true;
            this.$http
                .get(`accounts/${accountId}/collections`)
                .then(({ data }) => {
                    this.setCollections(data);
                    this.isLoadingCollections = true;
                });
        },
    },
};
</script>

<style scoped></style>
