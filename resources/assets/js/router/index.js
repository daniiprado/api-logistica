/*
 * Copyright (c) 2017 - 2018. Daniel Prado. All Rights Reserved. All material on this project, including design, text, images, logos, code and sounds, are owned by Daniel Prado, either through copyright or trademark, unless otherwise indicated. Content may not be copied, reproduced, transmitted, distributed, downloaded or transferred in any form or by any means without Daniel Prado's prior written consent, and with express attribution to Daniel Prado. The only exception is that one temporary copy may be downloaded into a single computer's memory and one unaltered permanent copy may be used by the viewer for personal and non-commercial use only, with an attached copy of Daniel Prado's Disclaimer Notice. No part of the downloaded copy may be subsequently reproduced, disseminated or transferred. Copyright infringement is a violation of federal law subject to criminal and civil penalties. (For permission to reprint, please contact Daniel Prado at (+571) 318-603-7095 or via email at danii.prado@outlook.com.ar)
 */

import Vue from 'vue'
import VueRouter from 'vue-router';
import Dashboard from "../components/views/dashboard/Dashboard";
import Clients from "./../components/passport/Clients"
Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'm-menu__item--active',
    routes: [
        {
            path: '/dashboard',
            name: 'home',
            component: Dashboard,
            children: [
                {
                    path: 'clients',
                    name: 'home.clients',
                    component: Clients
                }
            ]
        },
    ]
});

export default router;
