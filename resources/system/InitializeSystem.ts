import {container} from "./container";
import {injectable} from "inversify";
import {serviceProviderClasses} from "../js/config/app";

@injectable()
export default class InitializeSystem {

    static isOnceRegisterServiceProviders = false;

    async init() {
        await this.registerServiceProviders();
    }

    protected async registerServiceProviders() {
        for (const serviceProviderClass of serviceProviderClasses) {
            const serviceProvider = container.get(serviceProviderClass)
            await serviceProvider.register();
        }
        InitializeSystem.isOnceRegisterServiceProviders = true
    }
}
