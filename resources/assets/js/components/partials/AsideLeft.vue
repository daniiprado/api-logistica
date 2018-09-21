<template>
    <!-- BEGIN: Left Aside -->
    <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark "
             m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <slot></slot>
            </ul>
        </div>
    </div>
    <!-- END: Left Aside -->
</template>

<script>
    export default {
        name: "AsideLeft"
    }
</script>

<style scoped>

</style>
