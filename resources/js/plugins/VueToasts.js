import Toaster from "@meforma/vue-toaster";
import "vue-toast-notification/dist/theme-sugar.css";

const plugin = Toaster;
const options = {
    position: "top",
};

Toaster.register = (app) => {
    app.use(Toaster, options);
    app.provide("toaster", Toaster);
};

export default Toaster;
