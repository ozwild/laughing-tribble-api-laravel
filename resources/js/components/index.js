import VendorComponents from "./Vendor";
import CommonComponents from "./Common";
import ServiceProviders from "./Providers";
import CRUDComponents from "./CRUD";
import UIComponents from "./UIs";
import App from "./App";

App.register = (app) => app.component(App.name, App);

export default Object.assign(
    {},
    VendorComponents,
    CommonComponents,
    ServiceProviders,
    CRUDComponents,
    UIComponents,
    { App }
);
