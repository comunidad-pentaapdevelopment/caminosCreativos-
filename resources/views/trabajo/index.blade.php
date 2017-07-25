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
				<th>Editar</th>
				<th>Eliminar</th>
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
					<audio controls controlsList="nodownload" preload="preload">
 						 <source src="{{asset('/audios/'.$trab->Audio)}}" type="audio/mpeg">
						
					</audio>
				</td>
				<td>
					<button onclick="window.location.href='{{URL::action('TrabajoController@edit',$trab->id)}}'" class="btn btn-info">Editar</button>
				</td> 
				<td>
					{!!Form::open(['route'=>['trabajo.destroy',$trab->id],'method'=>'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=> 'btn btn-danger','onclick'=>'return confirm("Estas Seguro?")'])!!}
					{!!Form::close()!!}
				</td>
			</tr>

			@endforeach
			</table>
			</div>
			{{$trabajos->render()}}
		</div>

	</div>
@endsection