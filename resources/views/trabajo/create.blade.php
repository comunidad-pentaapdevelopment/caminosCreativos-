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
						<label for="tipotrabajos">Tipo Trabajos</label>
							<select name="tipotrabajoId" class="form-control selectpicker" data-live-search="true">
								@foreach($tipotrabajos as $tipTrab)
								<option value="{{$tipTrab->id}}">{{$tipTrab->Descripcion}}</option>
								@endforeach	
							</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="DescripcionLarga">Descripcion Larga</label>
						<input type="text" name="DescripcionLarga" required value="{{old('DescripcionLarga')}}" class="form-control" placeholder="Descripcion Larga...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="DescripcionCorta">Descripcion Corta</label>
						<input type="text" name="DescripcionCorta" required value="{{old('DescripcionCorta')}}" class="form-control" placeholder="Descripcion Corta...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Imagen">Imagen</label>
						<input type="file" name="Imagen"  class="form-control">
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
						<input type="text" name="Cliente" required value="{{old('Cliente')}}" class="form-control" placeholder="Cliente...">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Fecha">Fecha</label>
						<input type="date" name="Fecha" required value="{{old('Fecha')}}" class="form-control" >
					</div>
				</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Guardar</button>
						<button type="reset" class="btn btn-danger">Cancelar</button>
					</div>
				</div>

			</div>

			{!!Form::close()!!}
		
@endsection