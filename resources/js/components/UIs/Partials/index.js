import AppBar from "./AppBar";
import CollectionBar from "./CollectionBar";

AppBar.register = (app) => app.component(AppBar.name, AppBar);

CollectionBar.register = (app) =>
    app.component(CollectionBar.name, CollectionBar);

export default {
    AppBar,
    CollectionBar,
};
