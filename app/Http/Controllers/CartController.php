<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
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
		$cart = Cart::where('user_id', Auth::id())->where('item_id', $item_id)->first();
		if (empty($cart)) {
			$cart = new Cart;
			$add_data = [
				'user_id' => Auth::id(),
				'item_id' => $item_id,
				'item_quantity' => 1,
			];
			$cart->fill($add_data)->save();
		} else {
			$cart->increment('item_quantity');
		}
		return redirect()->route('cart', ['user_id' => Auth::id()]);
	}
}
