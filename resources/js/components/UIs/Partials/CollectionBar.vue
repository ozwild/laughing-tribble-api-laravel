<template>
    <div
        :class="`jumbotron ${
            collectionService.collection ? 'with-collection' : ''
        }`"
    >
        <div class="collection-background" :style="{ backgroundImage }"></div>
        <div class="collection-art" :style="{ backgroundImage }"></div>
        <div
            :class="`jumbotron-content ${hasArt ? 'with-collection-art' : ''}`"
        >
            <container
                :fluid="true"
                class="mb-3"
                v-if="collectionService.collections"
            >
                <row>
                    <column>
                        <vue-select
                            class="collection-selector mb-3"
                            v-if="collectionService.collections.length > 1"
                            :modelValue="collectionService.collection.id"
                            :options="collectionService.collections"
                            @update:modelValue="changeOfSelection"
                            label="title"
                        >
                            <strong>{{ option.title }}</strong>
                        </vue-select>
                        <button class="btn btn-dark ms-2" @click="updating">
                            <vue-feather
                                type="edit-2"
                                size="16"
                                title="Edit collection"
                            ></vue-feather>
                        </button>
                        <button class="btn btn-dark ms-2" @click="creating">
                            <vue-feather
                                type="plus"
                                size="16"
                                title="Add collection"
                            ></vue-feather>
                        </button>
                    </column>
                </row>
            </container>

            <container :fluid="true">
                <row>
                    <column>
                        <collections-form
                            v-if="isUpdating && editingCollection"
                            :collection="editingCollection"
                            :loading="isSubmitting"
                            @cancel="cancel"
                            @save="update"
                        ></collections-form>
                        <collections-form
                            v-if="isCreating"
                            :loading="isSubmitting"
                            @cancel="cancel"
                            @save="create"
                        ></collections-form>
                    </column>
                </row>
            </container>
        </div>
    </div>
</template>

<script>
import { inject } from "vue";
import CollectionsForm from "../Collections/Form";

export default {
    name: "collection-bar",
    emits: ["update:modelValue"],
    components: { CollectionsForm },
    setup() {
        const collectionService = inject("collectionService", {});
        return {
            collectionService,
        };
    },
    data() {
        return {
            editingCollection: null,
            isSubmitting: false,
            isUpdating: false,
            editingId: null,
            isCreating: false,
        };
    },
    watch: {
        "collectionService.collections": function (newValue) {
            if (!this.collectionService) {
                return;
            }
            const { collection: currentCollection } = this.collectionService;
            const [firstCollection] = newValue;
            if (firstCollection) {
                if (
                    !currentCollection ||
                    !this.collectionService?.collections?.includes(
                        currentCollection
                    )
                ) {
                    this.collectionService.setCollection(firstCollection);
                }
            }
        },
    },
    computed: {
        backgroundImage() {
            if (!this.collectionService) {
                return "";
            }
            const { collection } = this.collectionService;
            return this.hasArt ? `url(${collection.art_url})` : "";
        },
        hasArt() {
            if (!this.collectionService) {
                return false;
            }
            const { collection } = this.collectionService;
            return collection && collection.art_url;
        },
    },
    methods: {
        changeOfSelection(collectionId) {
            this.collectionService.setCollectionById(collectionId);
        },
        creating() {
            this.isCreating = true;
        },
        updating() {
            const { collection } = this.collectionService;
            this.editingCollection = collection;
            this.isUpdating = true;
        },
        create(formData) {
            console.log(formData);
            this.isSubmitting = true;
            this.collectionService
                .createCollection(formData)
                .then(() => {
                    this.isCreating = false;
                })
                .catch((response) => {
                    this.$toast.error(
                        `Something went wrong. ${response.message}`
                    );
                })
                .finally(() => {
                    this.isSubmitting = false;
                });
        },
        update(formData) {
            console.log(formData);
            this.isSubmitting = true;
            this.collectionService
                .updateCollection(this.editingCollection, formData)
                .then(() => {
                    this.isUpdating = false;
                    this.editingCollection = null;
                })
                .catch((response) => {
                    this.$toast.error(
                        `Something went wrong. ${response.message}`
                    );
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

<style scoped lang="scss">
.btn {
    line-height: 1;
}
.jumbotron {
    position: relative;
    padding: 2rem 1rem;
    margin-bottom: 2rem;
    background-color: #e9ecef;
    overflow: hidden;
    min-height: 0em;
    transition: min-height 0.5s;
    box-shadow: -2px 3px 16px -2px black;
    z-index: 1;

    @media (min-width: 576px) {
        padding: 0.75rem 0.5rem;
    }

    &.with-collection {
        min-height: 9em;
        max-height: 9em;
        height: 9em;

        .collection-selector {
            min-width: 10em;
            max-width: 40vw;
            width: 30%;
        }
    }

    .jumbotron-content {
        position: relative;
        z-index: 10;

        &.with-collection-art {
            @media (min-width: 576px) {
                margin-right: 13em;
            }
        }
    }

    .collection-background {
        position: absolute;
        width: 150%;
        height: 100%;
        top: 0%;
        left: -46%;
        background-size: contain;
        filter: blur(2px) opacity(0.5) hue-rotate(205deg);
        transform: scale(1.5);
        z-index: 1;
        box-shadow: inset 0 0 2em black, inset 0 0 4px white,
            inset 0 0 7em purple;

        &::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            box-shadow: inset 0px 0px 150px darkslateblue;
        }
    }
    .collection-art {
        position: absolute;
        width: 13em;
        height: 13em;
        top: -25%;
        right: 0%;
        box-shadow: 0 0 10px 1px #222;
        border: 1px solid white;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        z-index: 5;

        @media (max-width: 575px) {
            top: 0%;
            width: 100%;
            height: 100%;
            filter: blur(2px) opacity(0.5);
        }
    }
}
</style>
