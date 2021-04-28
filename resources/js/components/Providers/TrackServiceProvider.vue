<template>
    <div>
        <slot
            :tracks="tracks.value"
            :track="track.value"
            :loading="isLoadingTracks"
        ></slot>
    </div>
</template>

<script>
import {inject, reactive, readonly, provide, ref, toRefs} from "vue";
import axios from "axios";
import debounce from "lodash/debounce";

export default {
    name: "track-service-provider",
    setup() {
        const account = inject("account");
        const collection = inject("collection");

        const refreshTrigger = ref(1);
        const refresh = () => {
            refreshTrigger.value++;
        };

        const createTrack = (formData) => {
            return axios({
                method: "post",
                url: `/api/v1/accounts/${account.value.id}/collections/${collection.value.id}/tracks`,
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                data: formData,
            }).then(() => {
                refresh();
            });
        };

        const updateTrack = async (track, formData) => {
            formData.append("_method", "patch");
            return axios({
                method: "post",
                url: `/api/v1/accounts/${account.value.id}/collections/${collection.value.id}/tracks/${track.id}`,
                headers: {
                    "Content-Type": "multipart/form-data",
                },
                data: formData,
            }).then(() => {
                refresh();
            });
        };

        const servicePayload = reactive({
            tracks: [],
            track: {},
            isLoadingTracks: false,
            refresh,
            createTrack,
            updateTrack,
            setTracks(v) {
                this.tracks = v;
            },
            setTrack(v) {
                this.track = v;
            },
        });

        provide("trackService", servicePayload);

        return {
            account,
            collection,
            refreshTrigger,
            ...toRefs(servicePayload),
        };
    },
    data() {
        return {
            debouncedGet: debounce(this.get, 250),
        };
    },
    watch: {
        refreshTrigger(newValue, oldValue) {
            console.log("refresh trigger", oldValue, newValue);
            if (newValue !== oldValue) {
                this.debouncedGet();
            }
        },
        "collection.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.debouncedGet();
            }
        },
        "account.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.debouncedGet();
            }
        },
    },
    methods: {
        get() {
            if (!this.account.value || !this.collection.value) {
                return;
            }
            const collectionQuery = this.collection.value
                ? `collectionId=${this.collection.value.id}`
                : "";

            this.isLoadingTracks = true;
            this.$http
                .get(
                    `accounts/${this.account.value.id}/tracks?${collectionQuery}`
                )
                .then(({data}) => {
                    this.setTracks(data);
                    this.isLoadingTracks = false;
                });
        },
    },
};
</script>

<style scoped></style>
