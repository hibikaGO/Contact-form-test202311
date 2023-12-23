@extends('layouts.app')
<style>
</style>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('header')
<div class="header-button">
    <form action="/register">
    @csrf
    <button class="button-register">Register</button>
    </form>
</div>
@endsection

@section('content')
<div class="login-window">
    <div class="login-title">
        <h2 class="title">
            Login
        </h2>
    </div>
    <div class="login-content">
        <form action="/login" method="post" class="register-form">
        @csrf
            <div class="item-title">
                メールアドレス
            </div>
            <div class="item-content">
                <input type="mail" name="email" >
            </div>
            <div class="form__error">
            @error('email')
            {{ $message }}
            @enderror
            </div>
            <div class="item-title">
                パスワード
            </div>
            <div class="item-content">
                <input type="password" name="password">
            </div>
            <div class="form__error">
            @error('password')
            {{ $message }}
            @enderror
        </div>
            <div class="login-button">
                <button class="button" type="submit">ログイン</button>
            </div>

        </form>
    </div>
</div>

@endsection