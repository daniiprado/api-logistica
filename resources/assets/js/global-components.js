/*
 * Copyright (c) 2017 - 2018. Daniel Prado. All Rights Reserved. All material on this project, including design, text, images, logos, code and sounds, are owned by Daniel Prado, either through copyright or trademark, unless otherwise indicated. Content may not be copied, reproduced, transmitted, distributed, downloaded or transferred in any form or by any means without Daniel Prado's prior written consent, and with express attribution to Daniel Prado. The only exception is that one temporary copy may be downloaded into a single computer's memory and one unaltered permanent copy may be used by the viewer for personal and non-commercial use only, with an attached copy of Daniel Prado's Disclaimer Notice. No part of the downloaded copy may be subsequently reproduced, disseminated or transferred. Copyright infringement is a violation of federal law subject to criminal and civil penalties. (For permission to reprint, please contact Daniel Prado at (+571) 318-603-7095 or via email at danii.prado@outlook.com.ar)
 */

const GlobalComponents = {
    install(Vue) {
        Vue.component('login', require('./components/views/auth/Login.vue'));
        Vue.component('aside-left', require('./components/partials/AsideLeft.vue'));
        Vue.component('aside-section', require('./components/partials/AsideSection.vue'));
        Vue.component('aside-menu', require('./components/partials/AsideMenu.vue'));
        Vue.component('aside-menu-sub-menu', require('./components/partials/AsideMenuWithSubMenu.vue'));
        Vue.component('aside-menu-item', require('./components/partials/AsideMenuItem.vue'));
        Vue.component('aside-menu-badge', require('./components/partials/MenuBadge.vue'));
        Vue.component('vue-footer', require('./components/partials/Footer.vue'));
        Vue.component('portlet', require('./components/partials/Portlet.vue'));
        Vue.component('empty-portlet', require('./components/partials/EmptyPortlet.vue'));
        Vue.component('action-item', require('./components/partials/ActionItem.vue'));
        Vue.component('portlet-tool', require('./components/partials/PortletTool.vue'));
        Vue.component('data-table', require('./components/partials/DataTable.vue'));
    }
};

export default GlobalComponents;
