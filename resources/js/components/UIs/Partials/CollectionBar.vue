<template>
    <div :class="`jumbotron ${collection ? 'with-collection' : ''}`">
        <div class="collection-background" :style="{ backgroundImage }"></div>
        <div class="collection-art" :style="{ backgroundImage }"></div>
        <div
            :class="`jumbotron-content ${hasArt ? 'with-collection-art' : ''}`"
        >
            <vue-select
                v-if="collections.length > 1"
                v-model="collectionId"
                v-slot="{ option }"
                :options="collections"
                placeholder="Collection"
                label="title"
            >
                <strong>{{ option.title }}</strong>
            </vue-select>
            <span
                v-else-if="collection"
                class="md-title"
                v-html="collection.name"
            ></span>
        </div>
    </div>
</template>

<script>
import { inject } from "vue";
import VueSelect from "../../Common/Select";

export default {
    name: "collection-bar",
    emits: ["update:modelValue"],
    components: { VueSelect },
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
        "appCollection.value": function (newCollection) {
            this.collection = newCollection;
            this.collectionId = newCollection.id;
        },
        "appCollections.value": function (newCollections) {
            this.collections = newCollections;
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

<style scoped>
.jumbotron {
    position: relative;
    padding: 2rem 1rem;
    margin-bottom: 2rem;
    background-color: #e9ecef;
    overflow: hidden;
    min-height: 0em;
    transition: min-height 0.5s;
}
.jumbotron-content {
    position: relative;
    z-index: 10;
}
.with-collection {
    min-height: 13em;
}
.with-collection-art {
    margin-right: 14em;
}
.collection-background {
    position: absolute;
    width: 150%;
    height: 100%;
    top: 0%;
    left: -46%;
    background-size: contain;
    background-repeat: repeat;
    filter: blur(2px) saturate(0.5) brightness(0.5);
    transform: scale(1.5);
    z-index: 1;
}
.collection-art {
    position: absolute;
    width: 13em;
    height: 13em;
    top: 0%;
    right: 0%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    z-index: 5;
}
</style>
