<template>
    <div :class="`separator ${gapSize}`">
        <slot></slot>
    </div>
</template>
<script>
export default {
    name: 'separator',
    props: {
        size: {
            type: String,
            default: 'md'
        }
    },
    computed: {
        gapSize() {
            switch (this.size) {
                case 'xs':
                    return 'xs';
                case 'sm':
                    return 'sm';
                case 'md':
                    return 'md';
                case 'lg':
                    return 'lg';
                case 'xl':
                    return 'xl';
                default:
                    return 'md';
            }
        }
    }
}
</script>
<style scoped>
.separator {
    display: block;
    margin: 1em 0;
}

.separator.xs {
    margin: 0.5em 0;
}

.separator.sm {
    margin: 0.75em 0;
}

.separator.lg {
    margin: 1.5em 0;
}

.separator.xl {
    margin: 2.5em 0;
}
</style>
