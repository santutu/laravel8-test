import {random} from "lodash";

export default class Card {

    public isOpen = false
    public color: string = this.getRandomColor()

    constructor(
        public name = "",
        public text = ""
    ) {


    }

    protected getRandomColor(): string {

        let arr = [
            random(10, 20),
            random(10, 50),
            random(88, 99)
        ]

        arr = _.shuffle(arr);

        return _.reduce(
            arr,
            (last: string, curr: number) => last += curr.toString(),
            "#"
        );
    }


}
