/*
 * Copyright (c) 2017 - 2018. Daniel Prado. All Rights Reserved. All material on this project, including design, text, images, logos, code and sounds, are owned by Daniel Prado, either through copyright or trademark, unless otherwise indicated. Content may not be copied, reproduced, transmitted, distributed, downloaded or transferred in any form or by any means without Daniel Prado's prior written consent, and with express attribution to Daniel Prado. The only exception is that one temporary copy may be downloaded into a single computer's memory and one unaltered permanent copy may be used by the viewer for personal and non-commercial use only, with an attached copy of Daniel Prado's Disclaimer Notice. No part of the downloaded copy may be subsequently reproduced, disseminated or transferred. Copyright infringement is a violation of federal law subject to criminal and civil penalties. (For permission to reprint, please contact Daniel Prado at (+571) 318-603-7095 or via email at danii.prado@outlook.com.ar)
 */

import {API} from "../../../../services/Api";
import {Form} from "../../../../services/Form";

const actions = {

    login: ({commit}, user) => {

        let api = new Form({
            grant_type: API.GRANT_TYPE,
            client_id: API.CLIENT_ID,
            client_secret: API.CLIENT_SECRET,
            username: user.email,
            password: user.password
        });

        return new Promise((resolve, reject) => {
            api.post(API.URL + API.ENDPOINT_LOGIN)
                .then((response) => {
                    response.expires_in = parseInt(response.expires_in) + Date.now();
                    commit('LOGIN', response);
                    resolve( response );
                })
                .catch(error => reject(error))
        })
    },

    logout: ({commit}) => {
        commit('LOGOUT')
    }
};

export default actions
