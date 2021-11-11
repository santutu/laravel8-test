export default class SetInterval {

    protected setIntervalObj: any
    protected _until: number = 0
    protected _interval: number = 0
    protected _cb: Function = () => {
    };

    protected pass = 0;

    constructor() {
    }

    protected init() {
        this.pass = 0;
    }


    public until(millis: number) {
        this._until = millis
        return this;
    }

    public interval(millis: number) {
        this._interval = millis;
        return this;
    }

    public cb(cb: Function) {
        this._cb = cb;
        return this;

    }


    public start() {
        this.clearInterval()
        this.init();
        this.setIntervalObj = setInterval(this.wrapperCb, this._interval)
    }

    protected wrapperCb = () => {
        if (this.isTimeout()) {
            this.clearInterval()
        }
        this._cb();
        this.pass += this._interval;
    }

    protected clearInterval = () => {
        if (this.setIntervalObj) {
            clearInterval(this.setIntervalObj);
        }
    }

    protected isTimeout = (): boolean => {
        return this.pass >= this._until

    }

}
