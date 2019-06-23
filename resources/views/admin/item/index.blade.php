@extends('layouts.app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品一覧</div>

				<div class="panel-body">
					<table border="1">
					<tr>
					<th>商品名</th>
					<th>価格</th>
					<th>在庫</th>
					</tr>
					@foreach ($items as $item)
						<tr align="center">
						<td><a href="{{ route('admin.item.detail', ['item_id' => $item->id]) }}">{{ $item->name }}</a></td>
						<td>{{ $item->price }}</td>
						<td>
						@if ($item->stock_quantity === 0)
							在庫無し
						@else
							在庫あり
						@endif
						</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
