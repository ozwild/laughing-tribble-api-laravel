import Spinner from "./Spinner";
import Separator from "./Separator";
import Container from "./_Container";
import Row from "./_Row";
import Column from "./_Column";
import Field from "./Field";
import Table from "./_Table";
import Card from "./_Card";
import FluidImage from "./FluidImage";
import Select from "./_Select";
import Badge from "./_Badge";

Select.register = (app) => app.component(Select.name, Select);
Spinner.register = (app) => app.component(Spinner.name, Spinner);
Separator.register = (app) => app.component(Separator.name, Separator);
Container.register = (app) => app.component(Container.name, Container);
Row.register = (app) => app.component(Row.name, Row);
Column.register = (app) => app.component(Column.name, Column);
Field.register = (app) => app.component(Field.name, Field);
Table.register = (app) => app.component(Table.name, Table);
Card.register = (app) => app.component(Card.name, Card);
FluidImage.register = (app) => app.component(FluidImage.name, FluidImage);
Badge.register = (app) => app.component(Badge.name, Badge);

export default {
    Select,
    Spinner,
    Separator,
    Container,
    Row,
    Column,
    Field,
    Table,
    Card,
    FluidImage,
    Badge,
};
