<template>
    <router-link class="m-menu__item" tag="li" :to="href" linkActiveClass="m-menu__item--active" aria-haspopup="true">
        <a class="m-menu__link ">
            <i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i>
            <span class="m-menu__link-text">
                <slot></slot>
            </span>
        </a>
    </router-link>
</template>

<script>
    export default {
        name: "AsideMenuItem",
        props: {
            href: {
                type: [Array, Object],
                required: true
            }
        }
    }
</script>

<style scoped>

</style>
