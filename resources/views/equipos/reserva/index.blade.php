@extends ('layouts/admin')
@section ('contenido')

<div class="row">
	
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Reservas <a href="reserva/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('equipos.reserva.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Estado</th>
					<th>Usuario</th>
					<th>Deporte</th>
					<th>Dirección Cancha</th>
					<th>Reserva</th>
					<th>Equipo 1</th>
					<th>Equipo 2</th>
					<th>Descripción</th>
					<th>Opciones</th>
				</thead>
				@foreach($reservas as $res)
				<tr>
					<td>{{$res->id_reserva}}</td>
					<td>{{$res->estado}}</td>
					<td>{{$res->name}}</td>
					<td>{{$res->nombre_deporte}}</td>
					<td>{{$res->direccion_cancha}}</td>
					<td>{{$res->dia_reserva}}</td>
					<td>{{$res->equipo1_reserva}}</td>
					<td>{{$res->equipo2_reserva}}</td>
					<td>{{$res->descripcion_reserva}}</td>
					<td>
						<a href="{{URL::action('ReservaController@edit',$res->id_reserva)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$res->id_reserva}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('equipos.reserva.modal')
				@endforeach
			</table>
		</div>
		{{$reservas->render()}}
	</div>
</div>

@endsection