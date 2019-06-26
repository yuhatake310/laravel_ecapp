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

	public function add(Request $request) {
		$request->validate([
			'item_name' => 'required|unique:items|max:255',
			'description' => 'required|max:255',
			'price' => 'required|integer',
			'stock_quantity' => 'required|integer',
		]);

		$item = new Item;
		$item->fill($request->all())->save();

		return redirect()->route('admin.item.index');
	}

	public function showEditForm(Request $request) {
		$item = Item::find($request->id);
		return view('admin.item.edit', compact('item'));
	}

	public function edit(Request $request) {
		$request->validate([
			'item_name' => 'required|max:255',
			'description' => 'required|max:255',
			'stock_quantity' => 'required|integer',
		]);

		$item = Item::find($request->id);
		$edit_data = [
			'item_name' => $request->item_name,
			'description' => $request->description,
			'stock_quantity' => $request->stock_quantity,
		];
		$item->fill($edit_data)->save();

		return redirect()->route('admin.item.index');
	}
}
