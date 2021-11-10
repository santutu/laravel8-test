
export default function injectCustomPropertiesToVueInstance(vueApp: any) {
    vueApp.config.globalProperties.$test = () => {
        console.log('test')
    }
}
