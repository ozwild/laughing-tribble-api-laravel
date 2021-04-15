import AccountServiceProvider from "./AccountServiceProvider";
import UserServiceProvider from "./UserServiceProvider";
import CollectionServiceProvider from "./CollectionServiceProvider";
import TrackServiceProvider from "./TrackServiceProvider";

AccountServiceProvider.register = (app) =>
    app.component(AccountServiceProvider.name, AccountServiceProvider);

UserServiceProvider.register = (app) =>
    app.component(UserServiceProvider.name, UserServiceProvider);

CollectionServiceProvider.register = (app) =>
    app.component(CollectionServiceProvider.name, CollectionServiceProvider);

CollectionServiceProvider.register = (app) =>
    app.component(CollectionServiceProvider.name, CollectionServiceProvider);

TrackServiceProvider.register = (app) =>
    app.component(TrackServiceProvider.name, TrackServiceProvider);

export default {
    AccountServiceProvider,
    UserServiceProvider,
    CollectionServiceProvider,
    TrackServiceProvider,
};
