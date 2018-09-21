<template>
    <router-link class="m-menu__item" tag="li" :to="href" linkActiveClass="m-menu__item--active" aria-haspopup="true">
        <a  class="m-menu__link">
            <i class="m-menu__link-icon" :class="icon"></i>
            <span class="m-menu__link-title">
                <span class="m-menu__link-wrap">
                    <span class="m-menu__link-text">
                        <slot></slot>
                    </span>
                    <slot name="badge"></slot>
                </span>
            </span>
        </a>
    </router-link>
</template>

<script>
    export default {
        name: "AsideMenu",
        props: {
            icon: {
                type: String,
                default: 'flaticon-settings'
            },
            href: {
                type: [Array, Object],
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
