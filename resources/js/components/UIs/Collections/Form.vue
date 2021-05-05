<template>
    <ui-form :data="collection" v-slot="{ data }" :loading="loading">
        <p class="lead">
            {{ collection ? "Editando" : "Creando" }}
            <strong>{{ data.title }}</strong>
        </p>

        <fieldset>
            <container :fluid="true">
                <row>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.title"
                            id="title-field"
                            placeholder="Title..."
                            label="Title"
                            name="title"
                        ></ui-field>
                    </column>
                    <column :size="12" :md="6" class="mb-3">
                        <ui-field
                            v-model="data.art_url"
                            id="art-field"
                            placeholder="Art (URL)..."
                            label="Art (URL)"
                            name="art_url"
                        ></ui-field>
                    </column>
                </row>
            </container>
        </fieldset>
    </ui-form>
</template>

<script>
export default {
    name: "collections-form",
    props: ["collection", "loading"],
};
</script>

<style scoped></style>
