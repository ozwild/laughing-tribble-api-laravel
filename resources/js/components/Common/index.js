import Spinner from "./Spinner";
import Separator from "./Separator";
import Container from "./Container";
import Row from "./Row";
import Grid from "./Grid";
import Field from "./Field";
import Card from "./Card";
import FluidImage from "./FluidImage";
import Select from "./Select";

Select.register = (app) => app.component(Select.name, Select);
Spinner.register = (app) => app.component(Spinner.name, Spinner);
Separator.register = (app) => app.component(Separator.name, Separator);
Container.register = (app) => app.component(Container.name, Container);
Row.register = (app) => app.component(Row.name, Row);
Grid.register = (app) => app.component(Grid.name, Grid);
Field.register = (app) => app.component(Field.name, Field);
Card.register = (app) => app.component(Card.name, Card);
FluidImage.register = (app) => app.component(FluidImage.name, FluidImage);

export default {
    Select,
    Spinner,
    Separator,
    Container,
    Row,
    Grid,
    Field,
    Card,
    FluidImage,
};
