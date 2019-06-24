@extends('layouts.app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品詳細</div>

				<div class="panel-body">
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
					<a href="{{ route('admin.item.edit') }}?id={{ $item->id }}">商品編集</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
