<template>
    <div>
        <slot :tracks="tracks.value" :track="track.value" :loading="loading"></slot>
    </div>
</template>

<script>
import { inject, reactive, readonly, provide } from "vue";
import debounce from "lodash/debounce";

export default {
    name: "track-service-provider",
    setup() {
        const account = inject("account");
        const collection = inject("collection");

        const tracks = reactive([]);
        const track = reactive({});

        const setTracks = (v) => {
            tracks.value = v;
        };

        const setTrack = (v) => {
            track.value = v;
        };

        provide("tracks", readonly(tracks));
        provide("setTracks", setTracks);
        provide("track", readonly(track));
        provide("setTrack", setTrack);

        return {
            account,
            collection,
            tracks,
            track,
            setTracks,
            setTrack,
        };
    },
    data() {
        return {
            deboucedGet: debounce(this.get, 800),
            loading: true,
            accountId: null,
        };
    },
    watch: {
        "collection.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.get();
            }
        },
        "account.value": function (newValue, oldValue) {
            if (newValue?.id !== oldValue?.id) {
                this.accountId = newValue.id;
                this.get();
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

            this.$http
                .get(
                    `accounts/${this.account.value.id}/tracks?${collectionQuery}`
                )
                .then(({ data }) => {
                    this.setTracks(data);
                    this.loading = false;
                });
        },
    },
};
</script>

<style scoped></style>
