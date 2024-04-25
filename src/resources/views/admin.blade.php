@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('link')
    <form action="/logout" class="form" method="post">
        @csrf
        <button class="header-nav__button">ログアウト</button>
    </form>
@endsection

@section('content')
    <div class="admin__content">
        <div class="admin__heading">
            <h2>Admin</h2>
        </div>
    </div>

    <div class="admin__search">
        <form class="form" action="/admin" class="search-form" method="post">
            @csrf
            <div class="search-form__item">
                <input class="search-form__item-input" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください"
                    value="{{ old('keyword') }}">
                <select class="search-form__item-select" name="gender">
                    <option value="">性別</option>
                    <option value="">全て</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
                <select class="search-form__item-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->content }}</option>
                    @endforeach
                </select>
                <input class="search-form__item-input" type="date" name="date" placeholder="日付検索">
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
                <input type="reset" name="reset" value="リセット">
            </div>
        </form>
    </div>

    {{-- ページネーション --}}
    <div class="pagination">
        <div class="page-item">
            {{ $contacts->appends(request()->query())->links() }}
        </div>
    </div>

    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <th class="admin-table__header">お名前</th>
                <th class="admin-table__header">性別</th>
                <th class="admin-table__header">メールアドレス</th>
                <th class="admin-table__header">お問い合わせの種類</th>
            </tr>
            @foreach ($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__col">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td class="admin-table__col">
                        {{-- フラグによって性別を表示 --}}
                        @if ($contact->gender === 1)
                            男性
                        @elseif ($contact->gender === 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                    <td class="admin-table__col">{{ $contact->email }}</td>
                    <td class="admin-table__col">{{ $contact->category->content }}</td>
                    {{-- 詳細のモーダルウィンドウ --}}
                    <td class="admin-table__col">
                        <input type="checkbox" class="admin-table__col-checkbox" id="modal-toggle">
                        <label for="modal-toggle" class="admin-table__col-btn">詳細</label>
                        {{-- モーダルウィンドウの中身 --}}
                        <div class="admin-table__modal">
                            <div class="admin-table__modal-content">
                                <label for="modal-toggle" class="admin-table__modal-close">×</label>
                                {{-- 詳細内容 --}}
                                <p>モーダルウィンドウの内容</p>
                                {{-- @livewire('modal') --}}
                                {{-- @livewire('modal') --}}
                                <form action="/admin" method="post">
                                    @csrf
                                    {{ $contact->last_name }} {{ $contact->first_name }}
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
