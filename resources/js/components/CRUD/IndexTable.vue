<template>
    <div class="u-full-width overflow-auto">
        <table class="u-full-width">
            <thead>
            <tr>
                <slot name="header"></slot>
            </tr>
            </thead>
            <tbody>
            <tr v-for="row in data">
                <slot name="body" v-bind:row="row"></slot>
            </tr>
            </tbody>
        </table>
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
