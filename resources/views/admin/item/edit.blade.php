@extends('layouts.app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品編集</div>

				<div class="panel-body">
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{{ Form::open(['action' => 'Admin\ItemController@edit']) }}
					{{ Form::hidden('id', $item->id) }}
					<div class="form-group">
						{{ Form::label('title', '商品名') }}
						{{ Form::text('item_name', $item->item_name, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', '商品説明') }}
						{{ Form::textarea('description', $item->description, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', '在庫数') }}
						{{ Form::number('stock_quantity', $item->stock_quantity, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::submit('編集', ['class' => 'btn btn-primary form-control']) }}
					</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
