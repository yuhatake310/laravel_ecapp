@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">カート</div>

				<div class="panel-body">
					@forelse ($carts as $cart)
						<table class="table table-bordered">
							<tr>
								<th>商品名</th>
								<th>価格</th>
								<th>アクション</th>
							</tr>
							<tr>
								<td>{{ $cart->item->item_name }}</td>
								<td>{{ $cart->item->price }}</td>
								<td><a href="{{ route('cart.delete', ['cart_id' => $cart->id]) }}">削除</a></td>
							</tr>
						</table>
					@empty
						カートが空です
					@endforelse
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
