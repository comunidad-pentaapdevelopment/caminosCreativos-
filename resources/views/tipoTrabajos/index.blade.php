@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Tipo De Trabajos <a href="tipotrabajo/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('tipoTrabajos.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
			<table class="table table-striped table-bordered table-condenser table-hover">
			<thead>
				<th>Descripcion</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
			@foreach($tipotrabajos as $tipotrabajo)
			<tr>
				<td>{{$tipotrabajo->Descripcion}}</td>
				<td>
					<button onclick="window.location.href='{{URL::action('TipoTrabajoController@edit',$tipotrabajo->id)}}'" class="btn btn-info">Editar</button>
				</td>
				<td>
					<button data-target="#modal-delete-{{$tipotrabajo->id}}" data-toggle="modal" class="btn btn-danger">Eliminar</button>					
				</td> 
			</tr>
			@include('tipoTrabajos.modal')
			@endforeach
			</table>
			</div>
			{{$tipotrabajos->render()}}
		</div>

	</div>
@endsection