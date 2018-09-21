const mutations = {
    LOGIN (state, response) {
        state.access_token = response.access_token;
        state.refresh_token = response.refresh_token;
        state.expires_in = response.expires_in;
    },

    LOGOUT (state) {
        state.access_token = null;
        state.refresh_token = null;
        state.expires_in = null;
    }
};


export default mutations;
