@extends ('layouts/admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Barrio: {{$barrio->nombre_barrio}}</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($barrio,['method'=>'PATCH','route'=>['barrio.update',$barrio->id_barrio]])!!}


			{{Form::token()}}

			<div class="form-group">
				<label for="nombre_barrio">Nombre</label>
				<input type="text" name="nombre_barrio" class="form-control" value="{{$barrio->nombre_barrio}}" placeholder="Nombre del barrio">
			</div>

			<div class="form-group">
				<label>Comuna</label>
				<select name="id_comuna" class="form-control">
            				@foreach ($comunas as $co)

            				<option value="{{$co->id_comuna}}">{{$co->descripcion_comuna}}</option>

            				@endforeach
            	</select>
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
			</div>

			{!!Form::close()!!}
		</div>
	</div>
@endsection