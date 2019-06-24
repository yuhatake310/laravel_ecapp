@extends('layouts.app_admin')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">商品追加</div>

				<div class="panel-body">
				{{ Form::open() }}
					<div class="form-group">
						{{ Form::label('title', '商品名') }}
						{{ Form::text('name', null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', '商品説明') }}
						{{ Form::textarea('description', null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', '価格') }}
						{{ Form::number('price', null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::label('title', '在庫数') }}
						{{ Form::number('stock_quantity', null, ['class' => 'form-control']) }}
					</div>
					<div class="form-group">
						{{ Form::submit('追加', ['class' => 'btn btn-primary form-control']) }}
					</div>
				{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
