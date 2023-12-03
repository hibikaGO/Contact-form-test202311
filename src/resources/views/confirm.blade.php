@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">

@endsection

@section('content')
<div class="confirm__content">
    <h2 class="confirm-title">
        Confirm
    </h2>
        <div class="confirm__content">
            <form action="/thanks" class="confirm__table__content" method="post">
            @csrf
            <table class=confirm__table>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        お名前
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="first_name" value="{{ $contact['first_name'] }}" readonly/>
                        <input type="text" name="last_name" value="{{ $contact['last_name'] }}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        性別
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="gender" value="{{$contact['gender']}}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        メールアドレス
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="email" value="{{$contact['email']}}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        電話番号
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="tell" value="{{$contact['tell1']}}{{$contact['tell2']}}{{$contact['tell2']}}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        住所
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="address" value="{{$contact['address']}}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        建物名
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="building" value="{{$contact['building']}}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        お問い合わせの種類
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="content" value="{{$contact['content']}}" readonly/>
                    </td>
                </tr>
                <tr class="confirm__table-item">
                    <td class="confirm__item-title">
                        お問い合わせ内容
                    </td>
                    <td class="confirm__item-text">
                        <input type="text" name="detail" value="{{$contact['detail']}}" readonly/>
                    </td>
                </tr>
            </table>
            <div class="confirm__buttons">
                <button class="button-send" type="submit">送信</button>
                <a href="#" onclick="history.back(-1);return false;" class="correction">修正</a>
            </div>
            </form>
        </div>
</div>

@endsection