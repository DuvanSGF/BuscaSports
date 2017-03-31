@extends ('layouts/admin')
@section ('contenido')

<div class="row">
	
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Barrios <a href="barrio/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('lugar.barrio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Barrio</th>
					<th>Comuna</th>
					<th>Opciones</th>
				</thead>
				@foreach($barrios as $bar)
				<tr>
					<td>{{$bar->id_barrio}}</td>
					<td>{{$bar->nombre_barrio}}</td>
					<td>{{$bar->id_comuna}}</td>
					<td>
						<a href="{{URL::action('BarrioController@edit',$bar->id_barrio)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$bar->id_barrio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('lugar.barrio.modal')
				@endforeach
			</table>
		</div>
		{{$barrios->render()}}
	</div>
</div>

@endsection