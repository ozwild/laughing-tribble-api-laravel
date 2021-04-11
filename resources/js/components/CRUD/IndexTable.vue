<template>
  <div class="flex-table u-full-width overflow-auto">

    <div class="flex-table-body u-full-width">
      <row v-for="row in data">

        <slot name="body" v-bind:row="row"></slot>

      </row>
    </div>
  </div>
</template>
<script>

export default {
  name: 'ui-index-table',
  props: {
    data: {
      type: Array,
      default: []
    }
  },
  data() {
    return {
      collection: null
    }
  }
}
</script>
<style scoped>
.flex-table {
  display: flex;
}

.flex-table-body {
  display: flex;
  flex-direction: column;
}

.item {

}
</style>
