<template>
  <div>
    <ui-crud :url="url">

      <template v-slot:listing="{props:{ data, edit }}">
        <row>
          <grid>
            <label for="collection-selector">Collection</label>
          </grid>
        </row>
        <row variant="auto-row">
          <div style="flex: 3 auto">
            <multiselect v-if="data"
                         v-model="localValue"
                         :options="data"
                         track-by="title"
                         label="title"
                         placeholder="Collection"
                         id="collection-selector"
            >
              <template slot="singleLabel" slot-scope="{ option }">
                <strong>{{ option.title }}</strong>
              </template>
            </multiselect>
          </div>
          <button v-if="localValue"
                  @click="edit(localValue.id)"
                  class="ml-1"
          >
            <edit-2-icon size="1.25x"></edit-2-icon>
          </button>
        </row>


      </template>

      <template v-slot:editing="{props:{url, editingId, end}}">

        <collections-form :url="url" :id="editingId" :end="end" v-on:updated="handleUpdate"></collections-form>

      </template>

      <template v-slot:creating="{props:{url,  end}}">

        <collections-form :url="url" :end="end" v-on:created="handleCreation"></collections-form>

      </template>
    </ui-crud>

  </div>
</template>

<script>
import Table from './Table'
import CollectionsIndexTable from "./Table";
import CollectionsForm from './Form';
import {Edit2Icon} from 'vue-feather-icons'

export default {
  name: "collection-crud",
  props: ['account', 'value'],
  components: {CollectionsIndexTable, CollectionsForm, Table, Edit2Icon},
  data() {
    return {}
  },
  computed: {
    url() {
      return `accounts/${this.account.id}/collections`
    },
    localValue: {
      get() {
        return this.value;
      },
      set(value) {
        this.$emit('input', value);
      }
    }
  },
  methods: {
    handleUpdate(collection) {
      console.log(collection)
      this.$emit('input', collection);
    },
    handleCreation(collection) {
      this.$emit('input', collection);
    }
  }
}
</script>

<style scoped>

</style>
