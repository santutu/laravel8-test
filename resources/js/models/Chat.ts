import User from "./User";

export default class Chat {


    public constructor(
        public user: User,
        public message: string = ""
    ) {
    }


}
