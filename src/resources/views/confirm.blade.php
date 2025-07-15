@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('pageTitle')
<a class="header__logo" href="/">
    Confirm
</a>
@endsection

@section('content')
<div class="confirm__content">
    <form class="form" action="/contacts" method="post">
        @csrf

        @php
            $types = [
                '1' => '商品のお届けについて',
                '2' => '商品の交換について',
                '3' => '商品トラブル',
                '4' => 'ショップへのお問い合わせ',
                '5' => 'その他',
            ];

            $genderLabels = [
                '0' => '男性',
                '1' => '女性',
                '2' => 'その他',
                ];
        @endphp

        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        {{ $contact['last_name'] }} {{ $contact['first_name'] }}
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        {{ $genderLabels[$contact['gender']] ?? '未設定' }}
                        <input type="hidden" name="gender" value="{{ $contact['gender'] }}"  />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        {{ $contact['email'] }}
                        <input type="hidden" name="email" value="{{ $contact['email'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        {{ $contact['tel1'] }} {{ $contact['tel2'] }} {{ $contact['tel3'] }}
                        <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}" />
                        <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}" />
                        <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        {{ $contact['address'] }}
                        <input type="hidden" name="address" value="{{ $contact['address'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        {{ $contact['building'] }}
                        <input type="hidden" name="building" value="{{ $contact['building'] }}" />
                    </td>
                </tr>

                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">
                        {{ $types[$contact['detail']] ?? '未選択' }}
                        <input type="hidden" name="detail" value="{{ $contact['detail'] }}" />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        {!! nl2br(e($contact['content'])) !!}
                        <input type="hidden" name="content" value="{{ $contact['content'] }}" />
                    </td>
                </tr>
            </table>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        <div class="form__button">
            <a class="form__button-edit" href="{{ route('contact.index') }}">修正</a>
        </div>
    </form>
</div>
@endsection

