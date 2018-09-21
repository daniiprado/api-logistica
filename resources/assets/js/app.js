
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

import Vue from 'vue'
import es from 'vee-validate/dist/locale/es';
import VeeValidate, {Validator} from 'vee-validate';
import Lang from 'lang.js';
import messages from './lang/messages';
import GlobalComponents from './global-components';
import Auth from './packages/auth/Auth';
import BootstrapVue from 'bootstrap-vue'

window.lang = new Lang({ messages });
Validator.localize('es', es);
Vue.use(VeeValidate);
Vue.use(GlobalComponents);
Vue.use(BootstrapVue);
Vue.use(Auth);

import App from './components/App'
import router from './router'
import store from './store'

window.axios.defaults.headers.common['Authorization'] = store.getters.getToken;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



const app = new Vue({
    el: '#app',
    components: { App },
    router,
    store
});
