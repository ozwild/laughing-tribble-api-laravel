<template>
    <ui-form
        :url="url"
        :id="id"
        @cancel="()=>end()"
        @save="()=>end(true)"
    >
        <template v-slot="{data}">
            <row>
                <grid :size="6">
                    <ui-field v-model="data.title"
                              id="title-field"
                              placeholder="Title..."
                              label="Title"
                    ></ui-field>
                </grid>
                <grid :size="6">
                    <ui-field v-model="data.source"
                              id="source-field"
                              placeholder="Fuente (URL)..."
                              label="Fuente (URL)"
                    ></ui-field>
                </grid>
            </row>

            <row>
                <grid :size="6">
                    <ui-field v-model="data.key"
                              id="key-field"
                              placeholder="Key..."
                              label="Key"
                    ></ui-field>
                </grid>
                <grid :size="6">
                    <ui-field v-model="data.bpm"
                              id="bpm-field"
                              placeholder="BPM..."
                              label="BPM"
                    ></ui-field>
                </grid>
            </row>

            <row>
                <grid :size="6">
                    <ui-field v-model="data.duration"
                              type="number"
                              id="duration-field"
                              placeholder="Duracion..."
                              label="Duracion"
                    ></ui-field>
                </grid>
                <grid :size="6">
                    <ui-field v-model="data.type"
                              id="type-field"
                              placeholder="Tipo..."
                              label="Tipo"
                    ></ui-field>
                </grid>
            </row>
            <row>
                <grid :size="6">
                    <ui-field v-model="data.collection_id"
                              id="collection-field"
                              placeholder="Coleccion..."
                              label="Coleccion"
                    ></ui-field>
                </grid>
            </row>

        </template>
    </ui-form>
</template>

<script>
export default {
    name: "tracks-form",
    props: ['url', 'id', 'end']
}
</script>

<style scoped>

</style>
