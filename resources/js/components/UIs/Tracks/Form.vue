<template>
    <ui-form :data="track" v-slot="{ data }" :loading="loading">
        <p class="lead">
            {{ track ? "Editando" : "Creando" }} <strong>{{ data.title }}</strong>
        </p>

        <fieldset>
            <container :fluid="true">
                <row>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.title"
                            id="title-field"
                            placeholder="Titulo..."
                            label="Titulo"
                            name="title"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            id="source-field"
                            type="file"
                            placeholder="Fuente (audio)"
                            label="Fuente (audio)"
                            name="file"
                            accept="audio/mpeg"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.key"
                            id="key-field"
                            placeholder="Tonalidad..."
                            label="Tonalidad"
                            name="key"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.bpm"
                            id="bpm-field"
                            type="number"
                            placeholder="Tempo..."
                            label="Tempo"
                            name="key"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.duration"
                            type="number"
                            id="duration-field"
                            placeholder="Duracion..."
                            label="Duracion"
                            name="duration"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.type"
                            id="type-field"
                            placeholder="Tipo..."
                            label="Tipo"
                            name="type"
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
    props: ["track", "loading"],
};
</script>

<style scoped></style>
