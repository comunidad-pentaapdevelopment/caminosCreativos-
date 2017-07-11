@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Publicidad: {{$publicidades->Descripcion}}</h3>
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

			{!! Form::model($publicidades,['method'=>'PATCH','route'=>['publicidad.update',$publicidades->id],'files'=>'true'])!!}
			{!!Form::token()!!}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
			<label for="Descripcion">Descripcion</label>
			<input type="text" name="Descripcion" required value="{{$publicidades->Descripcion}}" class="form-control" >
			</div>
				</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
			<label for="Imagen">Imagen</label>
			<input type="file" name="Imagen" required value="{{$publicidades->Imagen}}" class="form-control" >
		
			</div>
				</div>
				
				
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Guardar</button>
			<button href="{{url('publicidad')}}" class="btn btn-danger">Cancelar</button>
			</div>

			</div>
			{!!Form::close()!!}
		
@endsection