import VueFeather from "vue-feather";

VueFeather.register = (app) => app.component(VueFeather.name, VueFeather);

export default {
    VueFeather,
};
