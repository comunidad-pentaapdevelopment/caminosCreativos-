@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Publicidades <a href="publicidad/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('publicidad.search')
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
			<table class="table table-striped table-bordered table-condenser table-hover">
			<thead>
				<th>Descripcion</th>
				<th>Imagen</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</thead>
				@foreach($publicidades as $pub)
			<tr>
				<td>{{$pub->Descripcion}}</td>
				<td>
					<img src="{{asset('/img/portfolio/'.$pub->Imagen)}}"  height="100px" width="100px" class="img-thumbnail">

				</td>
				<td>
					<button onclick="window.location.href='{{URL::action('PublicidadController@edit',$pub->id)}}'" class="btn btn-info">Editar</button>
				</td>
				<td>
					{!!Form::open(['route'=>['publicidad.destroy',$pub->id],'method'=>'DELETE'])!!}
					{!!Form::submit('Eliminar',['class'=> 'btn btn-danger','onclick'=>'return confirm("Estas Seguro?")'])!!}
					{!!Form::close()!!}
				</td>
			
			</tr>
			@endforeach 
			</table>
			
			</div>
			{{$publicidades->render()}}
		</div>

	</div>
@endsection