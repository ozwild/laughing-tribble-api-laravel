<template>
    <form
        :class="`crud-form ${ready ? 'loaded' : ''}`"
        @submit.prevent="save()"
    >
        <container class="form-container">
            <h5 v-html="formTitle"></h5>
            <slot :data="formData"></slot>
            <separator size="lg"></separator>
            <row>
                <column class="align-right">
                    <input
                        class="btn"
                        type="button"
                        @click="cancel()"
                        value="Cancelar"
                    />
                    <input
                        class="btn btn-primary ml-1"
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
    props: ["data", "id", "title"],
    data() {
        return {
            ready: false,
            formData: {},
        };
    },
    mounted() {
        if (this.data) {
            this.formData = { ...this.data };
        }
        setTimeout(() => {
            this.ready = true;
        }, 400);
    },
    computed: {
        formTitle() {
            return this.formData.id ? "Editando" : "Añadiendo";
        },
    },
    methods: {
        save() {
            this.$emit("save", this.formData);
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
