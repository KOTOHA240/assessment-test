@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('pageTitle')
<div class="page-title-area">
    <h1 class="page-title" href="/">Contact</h1>
</div>
@endsection

@section('content')

<div class="contact-form__content">
    <form class="form" action="{{ route('contacts.confirm') }}" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content name-flex">
                <div class="form__input--text">
                    <input type="text" name="last_name" id="last_name" placeholder="例:山田" value="{{ old('last_name') }}" />
                </div>
                <div class="form__error">
                    @error('last_name')
                    {{ $message }}
                    @enderror
                </div>
                <div class="form__input--text">
                    <input type="text" name="first_name" id="first_name" placeholder="例:太郎" value="{{ old('first_name') }}" />
                </div>
                <div class="form__error">
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="gender-radio-group">
                    <label>
                        <input type="radio" name="gender" value="0" {{ old('gender', '0') == '0' ? 'checked' : '' }}>男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="1" {{ old('gender') == '1' ? 'checked' : '' }}>女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2" {{ old('gender') == '2' ? 'checked' : '' }}>その他
                    </label>
                </div>
                <div class="form__error">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}" />
                </div>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content tel-flex">
                <div class="form__input--text">
                    <input type="text" name="tel1" value="{{ old('tel1') }}" placeholder="080" />
                </div>
                <div class="form__error">
                    @error('tel1')
                    {{ $message }}
                    @enderror
                </div>
                <span class="tel-separator">-</span>
                <div class="form__input--text">
                    <input type="text" name="tel2" value="{{ old('tel2') }}" placeholder="1234" />
                </div>
                <div class="form__error">
                    @error('tel2')
                    {{ $message }}
                    @enderror
                </div>
                <span class="tel-separator">-</span>
                <div class="form__input--text">
                    <input type="text" name="tel3" value="{{old('tel3') }}" placeholder="5678" />
                </div>
                <div class="form__error">
                    @error('tel3')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
                </div>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building" placeholder="例:千駄ヶ谷マンション101">
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--select">
                    <select name="detail" required>
                        <option value="" disabled {{ old('detail') ? '' : 'selected' }}>選択してください</option>
                        <option value="1" {{ old('detail') == '1' ? 'selected' : '' }}>1.商品のお届けについて</option>
                        <option value="2" {{ old('detail') == '2' ? 'selected' : '' }}>2.商品の交換について</option>
                        <option value="3" {{ old('detail') == '3' ? 'selected' : '' }}>3.商品トラブル</option>
                        <option value="4" {{ old('detail') == '4' ? 'selected' : '' }}>4.ショップへのお問い合わせ</option>
                        <option value="5" {{ old('detail') == '5' ? 'selected' : '' }}>5.その他</option>
                    </select>
                </div>
                <div class="form__error">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="content" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
                </div>
                <div class="form__error">
                    @error('content')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection
