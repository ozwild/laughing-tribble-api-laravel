<template>
    <ui-form :data="track" v-slot="{ data }">
        <fieldset>
            <container :fluid="true">
                <row>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.title"
                            id="title-field"
                            placeholder="Title..."
                            label="Title"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.source"
                            id="source-field"
                            placeholder="Fuente (URL)..."
                            label="Fuente (URL)"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.key"
                            id="key-field"
                            placeholder="Key..."
                            label="Key"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.bpm"
                            id="bpm-field"
                            placeholder="BPM..."
                            label="BPM"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.duration"
                            type="number"
                            id="duration-field"
                            placeholder="Duracion..."
                            label="Duracion"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.type"
                            id="type-field"
                            placeholder="Tipo..."
                            label="Tipo"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.collection_id"
                            id="collection-field"
                            placeholder="Coleccion..."
                            label="Coleccion"
                        ></ui-field>
                    </column>
                </row>
            </container>
        </fieldset>
    </ui-form>
</template>

<script>
export default {
    name: "tracks-form",
    props: ["track"],
    components: {},
    data() {
        return {};
    },
};
</script>

<style scoped></style>
