import { createApp } from "vue";
import components from "./components";
import plugins from "./plugins";

const app = createApp({
    name: "LaughingTribbleAdmin",
    components: { ...components },
});

Object.keys(components).forEach((key) => {
    const component = components[key];
    component.register(app);
});

plugins.forEach(({ plugin, options }) => {
    app.use(plugin, options);
});

app.mount("#app");
