<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model {
	protected $fillable = [
		'item_name', 'description', 'price', 'stock_quantity',
	];

	public function cart() {
		return $this->hasOne('App\Cart');
	}
}
