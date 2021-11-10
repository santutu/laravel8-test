import BaseServiceProvider from "./BaseServiceProvider";
import {container} from "../system/container";
import Timer from "../libs/Timer";
import {injectable} from "inversify";

@injectable()
export default class AppServiceProvider extends BaseServiceProvider {
    async register() {
        container.bind(Timer).toConstantValue(new Timer());
    }

}
