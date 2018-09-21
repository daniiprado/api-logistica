import Cookies from 'js-cookie';
import store from './../../store'

export default function (Vue) {
    Vue.auth = {
        hasToken: () => ( store.getters.getToken ),
        tokenEXpires: function () {
            if (Date.now() > parseInt(store.getters.getExpiresIn)) {
                store.dispatch('logout')
                    .then(() => this.destroyCookie())
                return false
            }
            return true
        },
        destroyCookie: () => Cookies.remove('destino_seguro'),
        isAuthenticated () { return this.hasToken() }
    };
    Object.defineProperties(Vue.prototype, {
        $auth: {
            get () { return Vue.auth }
        }
    });
}
