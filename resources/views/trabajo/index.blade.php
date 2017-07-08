@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de  Trabajos <a href="trabajo/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('trabajo.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
			<table class="table table-striped table-bordered table-condenser table-hover">
			<thead>
				<th>Tipo Trabajo</th>
				<th>Descripcion Corta</th>
				<th>Cliente</th>
				<th>Fecha</th>
				<th>Imagen</th>
				<th>Audio</th>
				<th>Opciones</th>
			</thead>
			@foreach($trabajos as $trab)
			<tr>
				<td>{{$trab->TipoTrabajo}}</td>
				<td>{{$trab->DescripcionCorta}}</td>
				<td>{{$trab->Cliente}}</td>
				<td>{{$trab->Fecha}}</td>
				<td>
					<img src="{{asset('/img/portfolio/'.$trab->Imagen)}}" alt="{{$trab->DescripcionCorta}}" height="100px" width="100px" class="img-thumbnail">

				</td>
				<td>
					<audio controls>
 						 <source src="{{asset('/mp3/'.$trab->Audio)}}" type="audio/mpeg">
						Your browser does not support the audio element.
					</audio>
				</td>
				<td>
					<a href="{{URL::action('TrabajoController@edit',$trab->id)}}"><button class="btn btn-info">Editar</button></a>

					<a hhref="" data-target="#modal-delete-{{$trab->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button> 

				</td> 
			</tr>
			@include('trabajo.modal')
			@endforeach
			</table>
			</div>
			{{$trabajos->render()}}
		</div>

	</div>
@endsection