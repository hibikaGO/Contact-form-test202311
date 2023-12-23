@extends('layouts.app')
<style>
</style>
@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('header')
<div class="header-button">
    <button class="button-logout">logout</button>
</div>
@endsection

@section('content')
<div class="admin__content">
    <div class="admin-title">
        <h2 class="title">Admin</h2>
    </div>
    <form action="/admin/filter" class="admin__form" method="get">
    @csrf
        <div class="form__content">
            <div class="form__search">
                <div class="form__text">
                    <input type="text" name="name_or_email" placeholder="名前やメールアドレスを入力してください">
                </div>
                <button class="button__search" type="submit">
                    <div class="my-parts"><span></span></div>
                </button>
            </div>
            <div class="form__select-gender">
                <div class="selector-gender">
                    <select name="gender" id="gender">
                        <option value="0">
                            全部
                        </option>
                        <option value="1"@if($selectedGender ?? '' === '1') selected @endif>
                            男性
                        </option>
                        <option value="2"@if($selectedGender ?? '' === '2') selected @endif>
                            女性
                        </option>
                        <option value="3"@if($selectedGender ?? '' === '3') selected @endif>
                            その他
                        </option>
                    </select>
                </div>
            </div>
            <div class="form__select-content">
                <div class="selector-content">
                    <select name="content">
                        <option value="" selected disabled>
                            お問い合わせの種類
                        </option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"@if(old('category_id') == $category->id) selected @endif>
                            {{$category->content}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__select-day">
                <div class="selector-day">
                    <input type="date" id="day-search" name="created_at">
                    <label for="day-search">日付を選択してください</label>
                </div>
            </div>
        </div>
    </form>
    <div class="content__header">
        <div class="header__export">
            <form action="/export-csv" class="form__export" method="get">
            @csrf
                <input type="hidden" name="name_or_email" value="{{ request()->input('name_or_email') }}">
                <input type="hidden" name="gender" value="{{ request()->input('gender') }}">
                <input type="hidden" name="content" value="{{ request()->input('content') }}">
                <input type="hidden" name="created_at" value="{{ request()->input('created_at') }}">
                <button class="button__export" type="submit" name="export_csv">エクスポート</button>
            </form>
        </div>
        <div class="header__paginate">
            {{$contacts->links()}}
        </div>
    </div>
    <div class="admin__table">
        <table class="admin__table__inner">
            <div class="table__header">
                <tr class="table__header__item">
                    <td class="item-title-name">
                        <div class="item-name">
                            お名前
                        </div>
                    </td>
                    <td class="item-title-gender">
                        <div class="item-gender">
                            性別
                        </div>
                    </td>
                    <td class="item-title-email">
                        <div class="item-email">
                            メールアドレス
                        </div>
                    </td>
                    <td class="item-title-content">
                        <div class="item-content">
                            お問い合わせの種類
                        </div>
                    </td>
                    <td class="item-title-button">
                        <div class="item-button"></div>
                    </td>
                </tr>
            </div>
            <div class="table__result">
                @foreach($contacts as $contact)
                <tr class="table__result-content">
                    <td class="result__content-name">
                        <div class="result-name">
                            {{$contact->first_name}}
                            {{$contact->last_name}}
                        </div>
                    </td>
                    <td class="result__content-gender">
                        <div class="result-gender">
                            {{$contact->gender}}
                        </div>
                    </td>
                    <td class="result__content-email">
                        <div class="result-email">
                            {{$contact->email}}
                        </div>
                    </td>
                    <td class="result__content-content">
                        <div class="result-content">
                            {{ $contact->category ? $contact->category->content : 'No Category' }}
                        </div>
                    </td>
                    <td class="result__content-button">
                        <div class="result-button">
                            <form action="" >
                            @csrf
                                <button class="table__detail">詳細</button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </div>
        </table>
    </div>
    <form action="/admin" class="admin__form" method="get">
    @csrf
            <button class="button__reset" type="submit">リセット</button>
    </form>
</div>
@endsection
