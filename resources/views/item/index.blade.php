<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品一覧画面</title>
</head>
<body>
<h2>商品一覧</h2>
<table border="1">
<tr>
<th>商品名</th>
<th>価格</th>
<th>在庫</th>
</tr>
@foreach ($items as $item)
	<tr align="center">
	<td><a href="{{ route('item.detail', ['item_id' => $item->id]) }}">{{ $item->name }}</a></td>
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
</body>
</html>
