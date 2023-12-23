@extends('layouts.app')
<style>
</style>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('header')
<div class="header-button">
    <form action="/login">
    @csrf
    <button class="button-login">login</button>
    </form>
</div>
@endsection

@section('content')
<div class="register-window">
    <div class="register-title">
        <h2 class="title">
            Register
        </h2>
    </div>
    <div class="register-content">
        <form action="/register" method="post" class="register-form">
        @csrf
            <div class="item-title">
                お名前
            </div>
            <div class="item-content">
                <input type="text" name="name" placeholder="例）山田 太郎" value="{{ old('name') }}">
            </div>
                <div class="form__error">
                @error('name')
                {{ $message }}
                @enderror
                </div>
            <div class="item-title">
                メールアドレス
            </div>
            <div class="item-content">
                <input type="mail" name="email" placeholder="例）test@example.com"value="{{ old('email') }}">
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
                <input type="password" placeholder="例)coachtech1106" name="password">
            </div>
                <div class="form__error">
                @error('password')
                {{ $message }}
                @enderror
                </div>
            <div class="item-title">
                確認用パスワード
            </div>
            <div class="item-content">
                <input type="password" placeholder="例)coachtech1106" name="password_confirmation">
            </div>
            <div class="register-button">
                <button class="button" type="submit">登録</button>
            </div>
        </form>
    </div>
</div>

@endsection