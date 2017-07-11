@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Trabajo: {{$trabajos->Descripcion}}</h3>
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

			{!! Form::model($trabajos,['method'=>'PATCH','route'=>['trabajo.update',$trabajos->id]])!!}
			{!!Form::token()!!}
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="tipotrabajos">Tipo Trabajos</label>
							<select name="tipotrabajoId" class="form-control selectpicker" data-live-search="true">
								@foreach($tipotrabajos as $tipTrab)
								@if($tipTrab->id==$trabajos->tipotrabajoId)
								<option value="{{$tipTrab->id}}" selected>{{$tipTrab->Descripcion}}</option>
								@else

								<option value="{{$tipTrab->id}}" >{{$tipTrab->Descripcion}}</option>
								@endif
								@endforeach	
							</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="DescripcionLarga">Descripcion Larga</label>
						<input type="text" name="DescripcionLarga" required value="{{$trabajos->DescripcionLarga}}" class="form-control" >
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="DescripcionCorta">Descripcion Corta</label>
						<input type="text" name="DescripcionCorta" required value="{{$trabajos->DescripcionCorta}}" class="form-control" >
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Imagen">Imagen</label>
						<input type="image" name="Imagen"  class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Audio">Audio</label>
						<input type="file" name="Audio"  class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Cliente">Cliente</label>
						<input type="text" name="Cliente" required value="{{$trabajos->Cliente}}" class="form-control" >
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Fecha">Fecha</label>
						<input type="date" name="Fecha" required value="{{$trabajos->Fecha}}" class="form-control" >
					</div>
				</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button href="{{url('trabajo')}}" class="btn btn-danger">Cancelar</button>
					</div>
				</div>

			</div>
			{!!Form::close()!!}
		
@endsection