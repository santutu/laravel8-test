import 'reflect-metadata';
import 'es6-promise/auto'

require('./bootstrap');

import {createApp, h} from 'vue';
import {createInertiaApp} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';
import InitializeSystem from "../system/InitializeSystem";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

declare const route: any;

(async ()=>{

    await (new InitializeSystem()).init();

    createInertiaApp({
                         title: (title) => `${title} - ${appName}`,
                         resolve: (name) => require(`./Pages/${name}.vue`),
                         setup({el, app, props, plugin}) {
                             return createApp({render: () => h(app, props)})
                                 .use(plugin)
                                 .mixin({methods: {route}})
                                 .mount(el) as any;
                         },
                     });

    InertiaProgress.init({color: '#4B5563'});

})()
