@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-container">
    <div class="logout-button">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-link">logout</button>
        </form>
    </div>

    <h2 class="admin-title">Admin</h2>

    <form class="admin__search-form" method="GET" action="{{ route('admin') }}">
        <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">
        <select name="gender">
            <option value="">性別</option>
            <option value="0" {{ request('gender') === '0' ? 'selected' : '' }}>男性</option>
            <option value="1" {{ request('gender') === '1' ? 'selected' : '' }}>女性</option>
            <option value="2" {{ request('gender') === '2' ? 'selected' : '' }}>その他</option>
        </select>
        <select name="detail">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('detail') == $category->id ? 'selected' : '' }}>
                {{ $category->content }}
                </option>
            @endforeach
        </select>
        <input type="date" name="created_at" value="{{ request('created_at') }}">
        <button type="submit" class="search-button">検索</button>
        <a href="{{ route('admin') }}" class="reset-button">リセット</a>
    </form>

    <div class="pagination-export-container">
        <form method="GET" action="{{ route('admin.export') }}">
            <input type="hidden" name="last_name" value="{{ request('last_name') }}">
            <input type="hidden" name="email" value="{{ request('email') }}">
            <input type="hidden" name="gender" value="{{ request('gender') }}">
            <input type="hidden" name="detail" value="{{ request('detail') }}">
            <input type="hidden" name="date" value="{{ request('date') }}">
            <button type="submit" class="export-button">エクスポート</button>
        </form>
        <div class="pagination-wrapper">
            {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <table class="admin__table">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ ['男性', '女性', 'その他'][$contact->gender] }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td>
                    <button class="modal-button" data-id="{{ $contact->id }}">詳細</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-container">
</div>
<!-- モーダル -->
<div id="modal" class="modal hidden">
    <div class="modal-content">
        <span class="close-button">×</span>
        <div id="modal-body">
            <!-- 詳細がここに入る -->
        </div>
        <form id="delete-form" method="POST" action="">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">削除</button>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modal');
        const modalBody = document.getElementById('modal-body');
        const closeBtn = document.querySelector('.close-button');
        const deleteForm = document.getElementById('delete-form');

        document.querySelectorAll('.modal-button').forEach(button => {
            button.addEventListener('click', function () {
                const id = button.dataset.id;
                fetch(`/admin/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        modalBody.innerHTML = `
                            <p>名前：${data.last_name} ${data.first_name}</p>
                            <p>メール：${data.email}</p>
                            <p>性別：${data.gender == 0 ? '男性' : data.gender == 1 ? '女性' : 'その他'}</p>
                            <p>電話番号：${data.tel}</p>
                            <p>住所：${data.address}</p>
                            <p>建物名：${data.building}</p>
                            <p>お問い合わせ種類：${data.category.content}</p>
                            <p>内容：${data.content}</p>
                        `;
                        deleteForm.action = `/admin/${id}`;
                        modal.classList.remove('hidden');

                        console.log(getComputedStyle(modal));
                    });
            });
        });

        closeBtn.addEventListener('click', function () {
        modal.classList.add('hidden');
        });
    });
</script>
@endsection