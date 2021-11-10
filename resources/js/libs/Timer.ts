import {injectable} from "inversify";

@injectable()
export default class Timer {

    constructor(
        public second = 1
    ) {
    }

    add() {
        this.second += 1;
    }

}
