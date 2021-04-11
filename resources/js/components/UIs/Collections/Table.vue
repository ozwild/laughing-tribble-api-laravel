<template>
  <ui-index-table :data="data">
    <template v-slot:body="{row}">
      <grid :size="2">
        <button class="rounded" @click="edit(row.id)">
          <edit-2-icon size="1.25x"></edit-2-icon>
        </button>
      </grid>
      <grid :size="10" v-html="row.title"></grid>
    </template>
  </ui-index-table>
</template>

<script>
import {Edit2Icon} from 'vue-feather-icons'

export default {
  name: "collections-index-table",
  props: ['data', 'edit'],
  components: {Edit2Icon}
}
</script>

<style scoped>

</style>
