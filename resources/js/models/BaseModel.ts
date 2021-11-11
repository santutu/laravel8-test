import {classToPlain} from "class-transformer";
import {ClassProperties} from "../types/types";

export default class BaseModel<SubClass> {


    public toPlain(): ClassProperties<SubClass> {
        return classToPlain(this) as ClassProperties<SubClass>;
    }
}
