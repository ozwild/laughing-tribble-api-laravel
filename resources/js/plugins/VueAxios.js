import Axios from "axios";
import VueAxios from "vue-axios";

const options = Axios.create({
    baseURL: "/api/v1/",
    headers: {
        common: {
            "X-Requested-With": "XMLHttpRequest",
        },
    },
});

VueAxios.register = (app) => {
    app.use(VueAxios, options);
    app.provide("axios", VueAxios);
};

export default VueAxios;
