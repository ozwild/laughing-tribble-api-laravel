import CRUD from "./CRUD";

CRUD.register = (app) => app.component(CRUD.name, CRUD);

export { CRUD };
