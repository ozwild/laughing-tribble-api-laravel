import CollectionCRUD from "./Collections/CollectionCRUD";
import TrackCrud from "./Tracks/TrackCRUD";
import Partials from "./Partials/index";

CollectionCRUD.register = (app) =>
    app.component("collection-crud", CollectionCRUD);

TrackCrud.register = (app) => app.component(TrackCrud.name, TrackCrud);

export default { CollectionCRUD, TrackCrud, ...Partials };
