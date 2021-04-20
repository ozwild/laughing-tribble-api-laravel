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
import { inject, reactive, readonly, provide, ref, toRefs } from "vue";
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

        const createTrack = (d) => {
            /* createTrackData.value = d; */
            return Promise.resolve();
        };

        const updateTrack = async (d) => {
            return axios
                .patch(`/api/v1/accounts/${account.value.id}/tracks/${d.id}`, d)
                .then(({ data }) => {
                    console.log("track updated", data);
                    refresh();
                    /* setTrack(data); */
                });
        };

        const servicePayload = reactive({
            tracks: [],
            track: {},
            isLoadingTracks: false,
            refresh,
            updateTrack,
            setTracks(v) {
                this.tracks = v;
            },
            setTrack(v) {
                this.track = v;
            },
        });

        provide("trackService", servicePayload);
        provide("createTrack", createTrack);
        /* provide("updateTrack", updateTrack); */

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
                .then(({ data }) => {
                    this.setTracks(data);
                    this.isLoadingTracks = false;
                });
        },
    },
};
</script>

<style scoped></style>
