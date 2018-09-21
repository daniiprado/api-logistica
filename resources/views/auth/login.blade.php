@extends('layouts.app')

@section('content')
    <div id="app" class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: url({{ asset('img//bg/bg-3.jpg') }});">
        <div class="m-login__wrapper-1 m-portlet-full-height">
            <div class="m-login__wrapper-1-1">
                <div class="m-login__contanier">
                    <div class="m-login__content">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{{ asset('img/logos/logo-2.png') }}">
                            </a>
                        </div>
                        <div class="m-login__title">
                            <h3>{{ config('app.name', 'Contingencies') }}</h3>
                        </div>
                        <div class="m-login__desc">
                            Amazing Stuff is Lorem Here.Grownng Team
                        </div>
                    </div>
                </div>
                <div class="m-login__border">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="m-login__wrapper-2 m-portlet-full-height">
            <div class="m-login__contanier">
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Login To Your Account</h3>
                    </div>
                    <login action="{{ route('login') }}">
                        @csrf
                    </login>
                </div>
                <div class="m-login__forget-password">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgotten Password ?</h3>
                        <div class="m-login__desc">Enter your email to reset your password:</div>
                    </div>
                    <form class="m-login__form m-form" action="">
                        <div class="form-group m-form__group">
                            <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                        </div>
                        <div class="m-login__form-action">
                            <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
                            <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom ">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
