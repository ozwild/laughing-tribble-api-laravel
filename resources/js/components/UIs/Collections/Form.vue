<template>
    <ui-form
        :url="url"
        :id="id"
        @cancel="()=>end()"
        @save="()=>end(true)"
        @created="(collection)=>this.$emit('created', collection)"
        @updated="(collection)=>this.$emit('updated', collection)"
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
                    <ui-field v-model="data.art_url"
                              id="art-field"
                              placeholder="Art (URL)..."
                              label="Art (URL)"
                    ></ui-field>
                </grid>
            </row>

        </template>
    </ui-form>
</template>

<script>
export default {
    name: "collections-form",
    props: ['url', 'id', 'end']
}
</script>

<style scoped>

</style>
