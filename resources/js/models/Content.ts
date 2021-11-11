import BaseModel from "./BaseModel";

export default class Content extends BaseModel<Content> {

    constructor(
        public title: string = "",
        public content: string = "",
    ) {
        super();
    }


    public print() {
        console.log(this.title + " " + this.content);
    }


}
