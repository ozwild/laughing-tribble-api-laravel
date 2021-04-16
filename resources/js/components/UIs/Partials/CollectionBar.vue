<template>
    <div :class="`jumbotron ${collection ? 'with-collection' : ''}`">
        <div class="collection-background" :style="{ backgroundImage }"></div>
        <div class="collection-art" :style="{ backgroundImage }"></div>
        <div
            :class="`jumbotron-content ${hasArt ? 'with-collection-art' : ''}`"
        >
            <container :fluid="true" class="mb-3">
                <row>
                    <column>
                        <vue-select
                            class="collection-selector"
                            v-if="collections.length > 1"
                            v-model="collectionId"
                            v-slot="{ option }"
                            :options="collections"
                            label="title"
                        >
                            <strong>{{ option.title }}</strong>
                        </vue-select>
                        <button class="btn btn-dark ms-2">
                            <vue-feather
                                type="edit-2"
                                size="16"
                                title="Edit collection"
                            ></vue-feather>
                        </button>
                        <button class="btn btn-dark ms-2">
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
                    <column> </column>
                </row>
            </container>
        </div>
    </div>
</template>

<script>
import { inject } from "vue";

export default {
    name: "collection-bar",
    emits: ["update:modelValue"],
    components: {},
    setup() {
        const appCollections = inject("collections", []);
        const appCollection = inject("collection", {});
        const setCollection = inject("setCollection");

        return {
            appCollections,
            appCollection,
            setCollection,
        };
    },
    data() {
        return {
            collectionId: null,
            collections: [],
            collection: null,
        };
    },
    watch: {
        "appCollection.value": function (newValue) {
            this.collection = newValue;
            this.collectionId = newValue.id;
        },
        "appCollections.value": function (newValue) {
            this.collections = newValue;
            const [firstCollection] = newValue;
            if (firstCollection) this.collectionId = firstCollection.id;
        },
        collectionId(id) {
            const [collection] = this.collections.filter(
                (option) => option.id === id
            );
            if (collection) this.setCollection(collection);
        },
    },
    computed: {
        backgroundImage() {
            return this.hasArt ? `url(${this.collection.art_url})` : "";
        },
        hasArt() {
            return this.collection && this.collection.art_url;
        },
    },
    methods: {},
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
    z-index: 9;

    &.with-collection {
        min-height: 13em;

        .collection-selector {
            min-width: 15em;
        }
    }

    .jumbotron-content {
        position: relative;
        z-index: 10;

        &.with-collection-art {
            margin-right: 14em;
        }
    }

    .collection-background {
        position: absolute;
        width: 150%;
        height: 100%;
        top: 0%;
        left: -46%;
        background-size: contain;
        filter: blur(9px) grayscale(0) brightness(1.5) contrast(0.45);
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
        top: 0%;
        right: 0%;
        box-shadow: 0 0 10px 1px #222;
        border: 1px solid white;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        z-index: 5;
    }
}
</style>
