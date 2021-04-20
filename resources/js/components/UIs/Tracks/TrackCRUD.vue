<template>
    <div>
        <button
            class="btn btn-dark ms-2 float-end"
            @click="trackService.refresh()"
        >
            <vue-feather
                type="plus"
                size="16"
                title="Add Track to Collection"
            ></vue-feather>
        </button>
        <tracks-table
            :data="trackService.tracks"
            :edit="updating"
            :loading="trackService.isLoadingTracks"
        ></tracks-table>
        <tracks-form
            v-if="isUpdating && editingTrack"
            :track="editingTrack"
            @cancel="cancel"
            @save="update"
        ></tracks-form>
        <!-- <tracks-form
            v-if="isCreating"
            @cancel="cancel"
            @save="create"
        ></tracks-form> -->
    </div>
</template>

<script>
import { inject } from "vue";
import TracksTable from "./Table";
import TracksForm from "./Form";

export default {
    name: "track-crud",
    props: ["url"],
    components: { TracksTable, TracksForm },
    setup() {
        /* const updateTrack = inject("updateTrack"); */
        const createTrack = inject("createTrack");
        const trackService = inject("trackService");

        return {
            trackService,
            /* updateTrack, */
            createTrack,
        };
    },
    data() {
        return {
            /* tracks: this.appTracks, */
            editingTrack: null,
            isUpdating: false,
            editingId: null,
            isCreating: false,
        };
    },
    watch: {},
    methods: {
        creating() {
            this.isCreating = true;
        },
        updating(d) {
            console.log("updating", d);
            this.editingTrack = d;
            /* this.setTrack(d); */
            this.isUpdating = true;
            /* this.editingId = d.id; */
        },
        create(d) {
            console.log("creating");
            this.createTrack(d).then(() => {
                this.isCreating = false;
            });
        },
        update(d) {
            console.log("update", d);
            this.trackService.updateTrack(d).then(() => {
                this.isUpdating = false;
                /* this.editingId = null; */
            });
        },
        cancel() {
            console.log("cancelling form");
            this.isCreating = false;
            this.isUpdating = false;
            /* this.editingId = null; */
        },
    },
};
</script>

<style scoped></style>
