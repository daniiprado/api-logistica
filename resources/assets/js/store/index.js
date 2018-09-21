import Vue from 'vue'
import Vuex from 'vuex'
import Cookies from 'js-cookie'
import createPersistedState from 'vuex-persistedstate'
import ApiAuth from './modules/auth'

Vue.use(Vuex);
const debug = process.env.NODE_ENV !== 'production';

const store = new Vuex.Store({
    modules: {
        ApiAuth
    },
    plugins: [
        createPersistedState({
            key: 'destino_seguro',
            storage: {
                getItem: key => Cookies.getJSON(key),
                setItem: (key, value) => Cookies.set(key, value, { expires: 0.5, secure: false }),
                removeItem: key => Cookies.remove(key)
            },
            getState: (key) => Cookies.getJSON(key),
            setState: (key, state) => Cookies.set(key, state, { expires: 0.5, secure: false })
        })
    ],
    strict: debug
});

export default store;
