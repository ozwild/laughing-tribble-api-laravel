import Form from "./Form";
import CRUD from "./CRUD";

Form.register = (app) => app.component(Form.name, Form);
CRUD.register = (app) => app.component(CRUD.name, CRUD);

export { Form, CRUD };
