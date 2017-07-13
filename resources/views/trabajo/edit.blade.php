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

			{!! Form::model($trabajos,['method'=>'PATCH','route'=>['trabajo.update',$trabajos->id],'files'=>'true'])!!}
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
						<input id="subirImagen" class="field" type="file" name="Imagen" class="form-control" >
							<br>
							@if(($trabajos->Imagen)!="")
							<img id="mostrarImagen" src="{{asset('img/portfolio/'.$trabajos->Imagen)}}"  width="25%" class="img-thumbnail">
							@endif
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="Audio">Audio</label>
						<input id="subirAudio" class="field" type="file" name="Audio" class="form-control" >
							<br>
							@if(($trabajos->Audio)!="")
							<audio id="mostrarAudio" controls controlsList="nodownload"  preload="preload">
 								 <source src="{{asset('/audios/'.$trabajos->Audio)}}" type="audio/mpeg">
							</audio>
							@endif
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
		
			<script type="text/javascript">
				//IMAGEN
				var elementoInputImagen = document.getElementById('subirImagen');
				var elementoMostrarImagen = document.getElementById('mostrarImagen');
				
				
				function cambioImagenSeleccionada(){
					var reader = new FileReader();
					var file = elementoInputImagen.files[0];
					reader.onloadend = function (){
						elementoMostrarImagen.src = reader.result;
					}
					if(file){
						reader.readAsDataURL(file);
					}else{
						elementoMostrarImagen.src = "";
					}		
				}

				elementoInputImagen.addEventListener('change',cambioImagenSeleccionada);

				// AUDIO
				var elementoInputAudio = document.getElementById('subirAudio');
				var elementoMostrarAudio = document.getElementById('mostrarAudio');
				
				
				function cambioAudioSeleccionado(){
					var reader = new FileReader();
					var file = elementoInputAudio.files[0];
					reader.onloadend = function (){
						elementoMostrarAudio.src = reader.result;
					}
					if(file){
						reader.readAsDataURL(file);
					}else{
						elementoMostrarAudio.src = "";
					}
				}

				elementoInputAudio.addEventListener('change',cambioAudioSeleccionado);

			</script>
@endsection