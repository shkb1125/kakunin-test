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
    <div class="modal">
        @livewire('modal')
    </div>
@endsection
