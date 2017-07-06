@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Trabajo</h3>
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

			{!! Form::open(array('url'=>'trabajo','method'=>'POST','autocomplete'=>'off','files'=>'true')) !!}
			{!!Form::token()!!}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
			<label for="tipotrabajos">Tipo Trabajo</label>
			<select name="tipotrabajoId" class="form-control">
			@foreach($tipotrabajos as $tipTrab)
			@if($tipTrab->id==$trabajo->tipotrabajoId)
			<option value="{{$tipTrab->id}}" selected>{{$tipTrab->Descripcion}}</option>
			@else

			<option value="{{$tipTrab->id}}" selected>{{$tipTrab->Descripcion}}</option>
			@endif
			@endforeach	
			</select>
			</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
										<div class="form-group">
			<label for="Imagen">Imagen</label>
			<input type="file" name="Imagen"class="form-control">
			</div>
				</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button type="reset" class="btn btn-danger">Cancelar</button>
			</div>

			</div>

			{!!Form::close()!!}
		
@endsection