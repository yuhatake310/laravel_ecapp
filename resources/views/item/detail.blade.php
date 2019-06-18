<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>商品詳細画面</title>
</head>
<body>
<h2>商品詳細</h2>
<p>商品名：{{ $item->name }}</p>
<p>説明：{{ $item->description }}</p>
<p>価格：{{ $item->price }}</p>
<p>在庫：
@if ($item->stock_quantity === 0)
	在庫無し
@else
	在庫あり
@endif
</p>
</body>
</html>
