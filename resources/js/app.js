import './bootstrap';

import {createApp} from 'vue/dist/vue.esm-bundler'
import router from "./router/index.js";
import Toaster from "@meforma/vue-toaster";

createApp()
    .use(router)
    .use(Toaster)
    .mount("#app")
