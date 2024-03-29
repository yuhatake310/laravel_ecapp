<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Item;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index($user_id) {
		$carts = Cart::where('user_id', $user_id)->get();
		return view('cart.index', compact('carts'));
	}

	public function delete($cart_id) {
		Cart::find($cart_id)->delete();
		return redirect()->route('cart', ['user_id' => Auth::id()]);
	}

	public function add($item_id) {
		$item = Item::find($item_id);
		if ($item->stock_quantity === 0) {
			return redirect()->route('item.detail', ['item_id' => $item->id])->with('error_message', '在庫がありません');
		} else {
			$cart = Cart::firstOrCreate([
				'user_id' => Auth::id(),
				'item_id' => $item_id
			], [
				'item_quantity' => 1
			]);
			if ($cart->item_quantity === $item->stock_quantity) {
				return redirect()
					->route('item.detail', ['item_id' => $item->id])
					->with('error_message', '在庫がないため、これ以上カートに追加することはできません');
			} elseif (!$cart->wasRecentlyCreated) {
				$cart->increment('item_quantity');
			}
			return redirect()->route('cart', ['user_id' => Auth::id()]);
		}
	}
}
