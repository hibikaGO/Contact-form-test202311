@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

@endsection

@section('content')
<div class="contact-form__content">
    <h2 class="contact-form-title">
        Contact
    </h2>
        <div class="form__content">
            <form action="/confirm" class="form" method="post">
            @csrf
            <table class="form__table">
                <tr class="form__group">
                    <td class="form__group-title">
                            お名前
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form_name">
                            <div class="form__input-first_name">
                                <input type="text" name="first_name" placeholder="例：山田" value="{{ old('first_name') }}">
                            </div>
                            <div class="form__input-last_name">
                                <input type="text" name="last_name" placeholder="例:太郎" value="{{ old('last_name') }}">
                            </div>
                        </div>
                    </td>
                    <div class="form__error">
                        @error('first_name')
                        {{ $message }}
                        @enderror
                        @error('last_name')
                        {{ $message }}
                        @enderror
                    </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            性別
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-gender">
                                <div class="form__input-gender-radio">
                                    <input type="radio" id="male" name="gender" value="1"{{ old('gender') === '男性' ? 'checked' : ''}} checked><label for="male">男性</label>
                                </div>
                                <div class="form__input-gender-radio">
                                    <input type="radio" id="female" name="gender" value="2"{{old('gender')==='女性' ? 'checked':''}}><label for="female">女性</label>
                                </div>
                                <div class="form__input-gender-radio">
                                    <input type="radio" id="other" name="gender" value="3"{{old('gender')==='女性' ? 'checked':''}}><label for="other">その他</label>
                                </div>
                        </div>
                    </td>
                        <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            メールアドレス
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-email">
                            <input type="email" name="email" placeholder="例:text@sample.com" value="{{ old('email') }}">
                        </div>
                    </td>
                        <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            電話番号
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-tell">
                            <div class="form__input-tell-cell">
                                <input type="text" name="tell1" placeholder="080" value="{{ old('tell1') }}">
                            </div>
                            <span>-</span>
                            <div class="form__input-tell-cell">
                                <input type="text" name="tell2" placeholder="1234" value="{{ old('tell2') }}">
                            </div>
                            <span>-</span>
                            <div class="form__input-tell-cell">
                                <input type="text" name="tell3" placeholder="5678" value="{{ old('tell3') }}">
                            </div>
                        </div>
                    </td>
                        <div class="form__error">
                        @error('tell1')
                        {{ $message }}
                        @enderror
                        @error('tell2')
                        {{ $message }}
                        @enderror
                        @error('tell3')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            住所
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-address">
                            <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                        </div>
                    </td>
                        <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            建物名
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-building">
                            <input type="text"name="building" placeholder="例:千駄ヶ谷マンション101" value="{{ old('building') }}">
                        </div>
                    </td>
                        <div class="form__error">
                        @error('building')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            お問い合わせの種類
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-content">
                            <select name="category_id">
                                <option value="" selected disabled>選択してください</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->content }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                        <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
                <tr class="form__group">
                    <td class="form__group-title">
                            お問い合わせ内容
                            <span class="form__label-required">
                            ※
                            </span>
                    </td>
                    <td class="form__group-content">
                        <div class="form__input-detail">
                            <textarea name="detail" cols="51" rows="5" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                        </div>
                    </td>
                        <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                        </div>
                </tr>
            </table>
            <button class="form__button" type="submit">確認画面</button>
            </form>
        </div>
    </form>
</div>
@endsection