@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/auth/form.css') }}">
@endsection

@section('content')
    <div class="login-page">
        <h1 class="page-title">ログイン</h1>
        <div class="form-content">
            <div class="form-body">
                <form class="form" method="POST" action="{{ route('login') }}" novalidate>
                    @csrf
                    <!-- メールアドレス -->
                    <div class="form-group">
                        <div class="form-group-title">
                            <label class="form-label-item" for="email">メールアドレス</label>
                        </div>
                        <div>
                            <input class="field-control" id="email" type="email" name="email"
                                value="{{ old('email') }}" autocomplete="email" inputmode="email" required />
                        </div>
                        <div class="form-error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                    <!-- パスワード -->
                    <div class="form-group">
                        <div class="form-group-title">
                            <label class="form-label-item" for="password">パスワード</label>
                        </div>
                        <div class="form-group-content">
                            <div class="field">
                                <input class="field-control" id="password" type="password" name="password"
                                    autocomplete="current-password" required />
                            </div>
                            <div class="form-error">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-actions">
                <div class="form-button">
                    <button class="btn btn-solid auth-form-submit" type="submit">ログインする</button>
                </div>
            </div>
            </form>

            <div class="form-footer">
                <a href="{{ route('register') }}" class="form-footer-link">会員登録はこちら</a>
            </div>
        </div>
    </div>
@endsection
