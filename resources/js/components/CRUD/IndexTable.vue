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
    props: ['data']
}
</script>
