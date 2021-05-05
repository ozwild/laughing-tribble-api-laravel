<template>
    <div>
        <button
            class="btn btn-light ms-2 float-end"
            @click="creating"
        >
            <vue-feather
                type="plus"
                size="16"
                title="Add Track to Collection"
            ></vue-feather>
        </button>
        <tracks-table
            class="table-dark table-striped"
            :data="trackService.tracks"
            :edit="updating"
            :loading="trackService.isLoadingTracks"
        ></tracks-table>
        <tracks-form
            v-if="isUpdating && editingTrack"
            :track="editingTrack"
            :loading="isSubmitting"
            @cancel="cancel"
            @save="update"
        ></tracks-form>
        <tracks-form
            v-if="isCreating"
            :loading="isSubmitting"
            @cancel="cancel"
            @save="create"
        ></tracks-form>
    </div>
</template>

<script>
import {inject} from "vue";
import TracksTable from "./Table";
import TracksForm from "./Form";

export default {
    name: "track-crud",
    props: ["url"],
    components: {TracksTable, TracksForm},
    setup() {
        const trackService = inject("trackService");

        return {
            trackService,
        };
    },
    data() {
        return {
            editingTrack: null,
            isSubmitting: false,
            isUpdating: false,
            isCreating: false,
        };
    },
    watch: {},
    methods: {
        creating() {
            this.isCreating = true;
        },
        updating(d) {
            this.editingTrack = d;
            this.isUpdating = true;
        },
        create(formData) {
            this.isSubmitting = true;
            this.trackService
                .createTrack(formData)
                .then(() => {
                    this.isCreating = false;
                })
                .catch((response) => {
                    this.$toast.error(`Something went wrong. ${response.message}`);
                })
                .finally(() => {
                    this.isSubmitting = false;
                });

        },
        update(formData) {
            this.isSubmitting = true;
            this.trackService
                .updateTrack(this.editingTrack, formData)
                .then(() => {
                    this.isUpdating = false;
                    this.editingTrack = null;
                })
                .catch((response) => {
                    this.$toast.error(`Something went wrong. ${response.message}`);
                })
                .finally(() => {
                    this.isSubmitting = false;
                });
        },
        cancel() {
            this.isCreating = false;
            this.isUpdating = false;
            this.editingTrack = null;
        },
    },
};
</script>

<style scoped></style>
