<template>
    <form
        :class="`crud-form ${ready ? 'loaded' : ''}`"
        @submit.prevent="save"
        enctype="multipart/form-data"
    >
        <container class="form-container text-white bg-dark">
            <slot :data="formData" :addFile="setFile"></slot>
            <separator size="lg"></separator>
            <row>
                <div v-if="loading">
                    <spinner></spinner>
                </div>
                <column class="text-end" v-else>
                    <input
                        class="btn btn-outline-secondary me-2"
                        type="button"
                        @click="cancel()"
                        value="Cancelar"
                    />
                    <input
                        class="btn btn-primary"
                        type="submit"
                        value="Submit"
                    />
                </column>
            </row>
        </container>
    </form>
</template>

<script>
export default {
    name: "ui-form",
    props: ["loading", "data", "title"],
    data() {
        return {
            ready: false,
            formData: {},
            file: null,
        };
    },
    mounted() {
        if (this.data) {
            this.formData = {...this.data};
        }
        setTimeout(() => {
            this.ready = true;
        }, 400);
    },
    methods: {
        setFile(file) {
            this.file = file;
        },
        save(event) {
            const formData = new FormData(event.srcElement);
            this.$emit("save", formData);
        },
        cancel() {
            this.ready = false;
            setTimeout(() => {
                this.$emit("cancel");
            }, 150);
        },
    },
};
</script>
<style scoped lang="scss">
.crud-form {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    transition: opacity 0.4s;
    opacity: 0;
    z-index: 500;
    max-height: 100%;
    max-width: 100%;
    overflow: auto;

    &.loaded {
        transition: opacity 0.4s;
        opacity: 1;

        .form-container {
            transition: transform 0.4s;
            transform: translate(0, 0);
        }
    }

    .form-container {
        background: white;
        padding: 1em 3em;
        margin-top: 10vh;
        max-width: 60em;
        box-shadow: 0 -2px 14px 0 rgba(0, 0, 0, 0.23);
        border: 1px solid lightgray;
        transition: transform 0.4s;
        transform: translate(0, -100vh);
    }
}
</style>
