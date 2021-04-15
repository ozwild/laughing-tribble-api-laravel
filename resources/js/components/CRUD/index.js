import Form from "./Form";
import IndexTable from "./IndexTable";
import CRUD from "./CRUD";

Form.register = (app) => app.component(Form.name, Form);
IndexTable.register = (app) => app.component(IndexTable.name, IndexTable);
CRUD.register = (app) => app.component(CRUD.name, CRUD);

export {
    Form,
    IndexTable,
    CRUD,
};
