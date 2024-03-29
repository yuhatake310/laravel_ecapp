@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品詳細</div>

				<div class="panel-body">
					@if (!empty(session('error_message')))
						<div class="alert alert-danger">
							{{ session('error_message') }}
						</div>
					@endif
					<p>商品名：{{ $item->item_name }}</p>
					<p>説明：{{ $item->description }}</p>
					<p>価格：{{ $item->price }}</p>
					<p>在庫：
					@if ($item->stock_quantity === 0)
						在庫無し
					@else
						在庫あり
					@endif
					</p>
					<p>カート追加：
					@guest
						ログインしてください
					@else
						@if ($item->stock_quantity === 0)
							在庫無し
						@else
							<a href="{{ route('cart.add', ['item_id' => $item->id]) }}" class="btn btn-primary float-right">カート追加</a>
						@endif
					@endguest
					</p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
