@extends ('layouts/admin')
@section ('contenido')

<div class="row">
	
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Canchas <a href="cancha/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('lugar.cancha.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Estado</th>
					<th>Tipo Cancha</th>
					<th>Barrio</th>
					<th>Iluminacion</th>
					<th>Capacidad</th>
					<th>Privacidad</th>
					<th>Imagen</th>
					<th>Opciones</th>
				</thead>
				@foreach($canchas as $can)
				<tr>
					<td>{{$can->id_cancha}}</td>
					<td>{{$can->estado}}</td>
					<td>{{$can->tipo_cancha}}</td>
					<td>{{$can->nombre_barrio}}: {{$can->direccion_cancha}}</td>
					<td>{{$can->iluminacion_cancha}}</td>
					<td>{{$can->capacidad_cancha}}</td>
					<td>{{$can->privacidad_cancha}}</td>
					<td>
						<img src="{{asset('imagenes/canchas/'.$can->imagen_cancha)}}" alt="{{ $can->direccion_cancha}}" height="100px" width="100px" class="img-thumbail">
					</td>
					<td>
						<a href="{{URL::action('CanchaController@edit',$can->id_cancha)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$can->id_cancha}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('lugar.cancha.modal')
				@endforeach
			</table>
		</div>
		{{$canchas->render()}}
	</div>
</div>

@endsection