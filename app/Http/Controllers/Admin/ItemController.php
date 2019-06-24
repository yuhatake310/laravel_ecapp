<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Item;
use App\Http\Controllers\Controller;

class ItemController extends Controller {
	public function __construct() {
		$this->middleware('auth:admin');
	}

	public function index() {
		$items = Item::get();
		return view('admin.item.index', compact('items'));
	}

	public function detail($item_id) {
		$item = Item::find($item_id);
		return view('admin.item.detail', compact('item'));
	}

	public function showAddForm() {
		return view('admin.item.add');
	}
}
