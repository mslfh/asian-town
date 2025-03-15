import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';

// Quasar
import { Quasar, AppFullscreen,Notify,Dialog } from 'quasar'
import quasarLang from 'quasar/lang/zh-CN'
import quasarLangZhCN from 'quasar/lang/zh-CN';
import quasarLangEnUS from 'quasar/lang/en-US';

// Import icon libraries
import '@quasar/extras/material-icons/material-icons.css'
import '@quasar/extras/material-icons-outlined/material-icons-outlined.css'
import '@quasar/extras/material-symbols-outlined/material-symbols-outlined.css'
import '@quasar/extras/material-symbols-rounded/material-symbols-rounded.css'
import '@quasar/extras/material-symbols-sharp/material-symbols-sharp.css'
import '@quasar/extras/fontawesome-v6/fontawesome-v6.css'
import '@quasar/extras/bootstrap-icons/bootstrap-icons.css'

// A few examples for animations from Animate.css:
// import @quasar/extras/animate/fadeIn.css
// import @quasar/extras/animate/fadeOut.css

// Import Quasar css

import 'quasar/dist/quasar.css'

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(Quasar, {
                lang: quasarLangEnUS,
                config: {
                    brand: {
                        primary: '#7367F0',
                        secondary: '#A8AAAE',
                        accent: '#9C27B0',

                        dark: '#2f3349',
                        'dark-page': '#2f3349',

                        positive: '#21BA45',
                        negative: '#C10015',
                        info: '#31CCEC',
                        warning: '#F2C037'
                    },
                    notify:{
                    }
                },
                plugins: {
                    AppFullscreen,
                    Notify,
                    Dialog
                },
            })
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
