@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/mypage/index.css') }}">
@endsection

@section('content')
    <h1 class="sr-only">mypage</h1>

    <div class="profile-header">
        <div class="profile-header-left">
            <div class="profile-header-avatar">
                @if ($user->profile_image)
                    <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}のアイコン">
                @else
                    <div class="profile-header-avatar-placeholder" aria-hidden="true"></div>
                @endif
            </div>

            <div class="profile-header-name">{{ $user->name }}</div>
        </div>

        <div class="profile-header-right">
            <div class="profile-header-actions">
                <a href="{{ route('profile.edit', ['from' => 'mypage']) }}" class="btn btn-outline profile-header-button">
                    プロフィールを編集
                </a>
            </div>
        </div>
    </div>

    <div class="tabs-container">
        <ul class="tabs">
            <li class="tab {{ $activePage === 'sell' ? 'active' : '' }}">
                <a class="tab-link" href="{{ route('mypage.index', ['page' => 'sell']) }}">出品した商品</a>
            </li>
            <li class="tab {{ $activePage === 'buy' ? 'active' : '' }}">
                <a class="tab-link" href="{{ route('mypage.index', ['page' => 'buy']) }}">購入した商品</a>
            </li>
        </ul>
    </div>

    <div class="products-grid">
        @forelse ($items as $item)
            <div class="product-card">
                <a href="{{ route('products.show', ['item_id' => $item->id]) }}">
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}">
                </a>
                <h3 class="product-card-name">{{ $item->name }}</h3>
                @if ($item->status === 'sold')
                    <span class="sold-label">Sold</span>
                @endif
            </div>
        @empty
            <p>表示する商品がありません</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $items->links() }}
    </div>
@endsection
