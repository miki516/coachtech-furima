<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class MyPageController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $page = $request->query('page', 'sell');
        if (!in_array($page, ['sell', 'buy'], true)) {
            $page = 'sell';
        }

        if ($page === 'sell') {
            // 自分が出品した商品
            $items = Product::with('categories')
                ->where('seller_id', $user->id)
                ->latest()
                ->paginate(12, ['*'], 'p')
                ->withQueryString();
        } else {
            // 自分が購入した商品
            $productIds = Order::where('buyer_id', $user->id)->pluck('product_id');
            $items = Product::with('categories')
                ->whereIn('id', $productIds)
                ->latest()
                ->paginate(12, ['*'], 'p')
                ->withQueryString();
        }

        // ビュー側でタブ判定に使う
        return view('mypage.index', [
            'user'       => $user,
            'activePage' => $page,
            'items'      => $items,
        ]);
    }
}
