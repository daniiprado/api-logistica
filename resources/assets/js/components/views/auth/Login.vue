<!--
  - Copyright (c) 2017 - 2018. Daniel Prado. All Rights Reserved. All material on this project, including design, text, images, logos, code and sounds, are owned by Daniel Prado, either through copyright or trademark, unless otherwise indicated. Content may not be copied, reproduced, transmitted, distributed, downloaded or transferred in any form or by any means without Daniel Prado's prior written consent, and with express attribution to Daniel Prado. The only exception is that one temporary copy may be downloaded into a single computer's memory and one unaltered permanent copy may be used by the viewer for personal and non-commercial use only, with an attached copy of Daniel Prado's Disclaimer Notice. No part of the downloaded copy may be subsequently reproduced, disseminated or transferred. Copyright infringement is a violation of federal law subject to criminal and civil penalties. (For permission to reprint, please contact Daniel Prado at (+571) 318-603-7095 or via email at danii.prado@outlook.com.ar)
  -->

<template>


    <form @submit.prevent="onSubmit" class="m-login__form m-form" method="post" :action="action" @keydown="form.errors.clear( $event.target.name )">
        <div v-if="alert" class="m-alert m-alert--outline alert alert-danger" role="alert">
            <span v-text="alert"></span>
        </div>
        <slot></slot>
        <div class="form-group m-form__group" :class="{'has-danger': ( errors.has('email') || form.errors.has('email') ) }">
            <input class="form-control m-input" v-validate="'required|email'"
                   type="email"
                   v-model="form.email"
                   :placeholder="lang.get('validation.attributes.email').capitalize()"
                   name="email" autocomplete="off">
            <div v-if="form.errors.has('email') || errors.has('email')" class="form-control-feedback">
                {{ errors.first('email') || form.errors.first('email') }}
            </div>
        </div>
        <div class="form-group m-form__group" :class="{'has-danger': form.errors.has('password') || errors.has('password') }">
            <input class="form-control m-input m-login__form-input--last" v-validate="'required'"
                   type="password"
                   v-model="form.password"
                   :placeholder="lang.get('validation.attributes.password').capitalize()"
                   @keydown="form.errors.clear('password')"
                   name="password">
            <div v-if="form.errors.has('password') || errors.has('password')" class="form-control-feedback">
                {{ form.errors.first('password') || errors.first('password') }}
            </div>
        </div>
        <div class="row m-login__form-sub">
            <div class="col m--align-left">
                <label class="m-checkbox m-checkbox--focus">
                    <input type="checkbox" name="remember" v-model="form.remember">
                    {{ lang.get('validation.attributes.remember_me').capitalize() }}
                    <span></span>
                </label>
            </div>
            <div class="col m--align-right">
                <a href="javascript:;" id="m_login_forget_password" class="m-link" v-text="lang.get('pages.login.forget_password')"></a>
            </div>
        </div>
        <div class="m-login__form-action">
            <button id="m_login_signin_submit" type="submit"
                    class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air"
                    :class="{ 'm-loader m-loader--right m-loader--light': loading }"
                    :disabled="loading || form.errors.any() || errors.any()"
                    v-text="lang.get('pages.buttons.sign_in')">
            </button>
        </div>
    </form>
</template>

<script>
    import {API} from "../../../services/Api";
    import {MixinMoment} from "../../../mixins/mixin-moment";
    import { Errors } from "../../../services/Errors";
    import { Form } from "../../../services/Form";
    import swal from 'sweetalert'

    export default {
        name: "Login",
        mixins: [MixinMoment],
        props: {
            action: {
                type: String,
                required: true
            }
        },
        data: () => {
            return {
                lang: lang,
                loading: false,
                form: new Form({
                    email: null,
                    password: null,
                    remember: false
                }),
                alert: null,
            }
        },
        methods: {
            onSubmit: function () {
                this.$validator.validateAll().then( (result) => {
                    if ( result ) {
                        this.loading = true;
                        this.$store.dispatch('login', this.form.data())
                            .then(() => {
                                this.form.post('/login')
                                    .then((response) => {
                                        window.location.reload();
                                        this.loading = false;
                                    })
                                    .catch((error) => {
                                        this.onFail(error);
                                    })
                            })
                            .catch((error) => {
                                this.alert = this.lang.get('auth.failed');
                                this.loading = false;
                                this.onFail(error);
                            });
                    }
                });
            },

            onFail: function () {
                this.$store.dispatch('logout')
                    .then(() => {
                        this.$auth.destroyCookie()
                    })
            }
        }
    }
</script>

<style scoped>

</style>
