@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Tipo De Trabajo</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
			<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
			</div>
			@endif
		</div>
	</div>

			{!! Form::open(array('url'=>'tipotrabajo','method'=>'POST','autocomplete'=>'off')) !!}
			{!!Form::token()!!}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
			<label for="Descripcion">Descripcion</label>
			<input type="text" name="Descripcion" required value="{{old('Descripcion')}}" class="form-control" placeholder="Descripcion...">
			</div>
				</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>

			</div>

			{!!Form::close()!!}
		
@endsection