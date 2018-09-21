<template>
    <li class="m-menu__item" :class="{'m-menu__item--active m-menu__item--open': isActive }" aria-haspopup="true" m-menu-submenu-toggle="hover">
        <a href="javascript:;" class="m-menu__link m-menu__toggle">
            <i class="m-menu__link-icon" :class="icon"></i>
            <span class="m-menu__link-text">
                <slot></slot>
            </span>
            <slot name="badge"></slot>
            <i class="m-menu__ver-arrow la la-angle-right"></i>
        </a>
        <div class="m-menu__submenu">
            <span class="m-menu__arrow"></span>
            <ul class="m-menu__subnav">
                <li class="m-menu__item  m-menu__item--parent" aria-haspopup="true">
                    <span class="m-menu__link">
                        <span class="m-menu__link-text"></span>
                    </span>
                </li>
                <slot name="item"></slot>
            </ul>
        </div>
    </li>
</template>

<script>
    export default {
        name: "AsideMenuWithSubMenu",
        props: {
            icon: {
                type: String,
                default: 'flaticon-layers'
            },
            route: {
                type: [String, Array, Object],
                default: 'home'
            }
        },
        data: () => {
            return {
                isActive: false,
            }
        },
    }
</script>

<style scoped>

</style>
