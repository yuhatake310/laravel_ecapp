@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">カート</div>

				<div class="panel-body">
					@if ($carts->isEmpty())
						カートは空です
					@else
						<table class="table table-bordered">
							<tr>
								<th>商品名</th>
								<th>価格</th>
								<th>個数</th>
								<th>アクション</th>
							</tr>
							@foreach ($carts as $cart)
							<tr>
								<td>{{ $cart->item->item_name }}</td>
								<td>{{ $cart->item->price }}</td>
								<td>{{ $cart->item_quantity }}</td>
								<td><a href="{{ route('cart.delete', ['cart_id' => $cart->id]) }}">削除</a></td>
							</tr>
							@endforeach
							</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
