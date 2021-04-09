<template>
    <div :class="`${gridSize} ${gridSize === 'one' ? 'column' : 'columns'}`">
        <slot></slot>
    </div>
</template>
<script>
export default {
    name: 'grid',
    props: {
        size: {
            type: Number,
            default: 12
        }
    },
    computed: {
        gridSize() {
            switch (this.size) {
                case 1:
                    return "one";
                case 2:
                    return "two";
                case 3:
                    return "three";
                case 4:
                    return "four";
                case 5:
                    return "five";
                case 6:
                    return "six";
                case 7:
                    return "seven";
                case 8:
                    return "eight";
                case 9:
                    return "nine";
                case 10:
                    return "ten";
                case 11:
                    return "eleven";
                case 12:
                default:
                    return "twelve";
            }
        }
    }
}
</script>
