<template>
  <div :class="`${variant}`">
    <slot></slot>
  </div>
</template>
<script>
export default {
  name: 'row',
  props: {
    variant: {
      type: String,
      default: "row",
      enum: ["row", "auto-row"]
    }
  },
}
</script>

<style>
.auto-row {
  display: flex;
}

.auto-row > * {
  flex: 1 auto;
}
</style>
