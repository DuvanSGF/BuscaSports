@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Reserva: {{ $reserva->id_reserva}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			</div>
		</div>

			{!!Form::model($reserva,['method'=>'PATCH','route'=>['reserva.update',$reserva->id_reserva]])!!}
            {{Form::token()}}
            
            	
                 <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Usuario</label>
                              <select name="name" class="form-control">
                                    @foreach ($users as $use)

                                    <option value="{{$use->id}}">{{$use->name}}</option>

                                    @endforeach
                              </select>
                        </div>
                  </div>
                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Deporte</label>
                              <select name="nombre_deporte" class="form-control">
                                    @foreach ($deportes as $dep)

                                    <option value="{{$dep->id_deporte}}">{{$dep->nombre_deporte}}</option>

                                    @endforeach
                              </select>
                        </div>
                  </div>

                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Dirección Cancha</label>
                              <select name="direccion_cancha" class="form-control">
                                    @foreach ($canchas as $can)


                                    <option value="{{$can->id_cancha}}">{{$can->direccion_cancha}}</option>

                                    @endforeach
                              </select>
                        </div>
                  </div>


            <div class="row">
                  
                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        
                         <div class="form-group">
                              <label for="dia_reserva">Fecha/Hora</label>
                              <input type="datetime-local" name="dia_reserva" required value="{{$reserva->dia_reserva}}" class="form-control" placeholder="Dia de la reserva">
                        </div>

                  </div>

                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        
                        <div class="form-group">
                              <label for="equipo1_reserva">Equipo 1 Reservado</label>
                              <input type="text" name="equipo1_reserva" required value="{{$reserva->equipo1_reserva}}" class="form-control" placeholder="Confirmación del equipo 1">
                        </div>

                  </div>

                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        
                        <div class="form-group">
                              <label for="equipo2_reserva">Equipo 2 Reservado</label>
                              <input type="text" name="equipo2_reserva" required value="{{$reserva->equipo2_reserva}}" class="form-control" placeholder="Confirmación del equipo 2">
                        </div>
                  </div>            

                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        
                        <div class="form-group">
                              <label for="descripcion_reserva">Descripción</label>
                              <input type="text" name="descripcion_reserva" value="{{$reserva->descripcion_reserva}}" class="form-control" placeholder="Descripción de la reserva">
                        </div>
                  </div>      

                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">

                        <div class="form-group">
                              <button class="btn btn-primary" type="submit">Guardar</button>
                              <button class="btn btn-danger" type="reset">Cancelar</button>
                        </div>
                  </div>      

            </div>

			{!!Form::close()!!}		
@endsection