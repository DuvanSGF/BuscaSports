@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Cancha</h3>
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


			{!!Form::open(array('url'=>'lugar/cancha','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}


                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Tipo de Cancha</label>
                              <select name="tipo_cancha" class="form-control">
                                    @foreach ($tipo_canchas as $tc)


                                    <option value="{{$tc->id_tipocancha}}">{{$tc->tipo_cancha}}</option>

                                    @endforeach
                              </select>
                        </div>
                  </div>

                  <div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label>Barrio</label>
                              <select name="nombre_barrio" class="form-control">
                                    @foreach ($barrios as $bar)


                                    <option value="{{$bar->id_barrio}}">{{$bar->nombre_barrio}}</option>

                                    @endforeach
                              </select>
                        </div>
                  </div>


            <div class="row">
            	
            	<div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
            		
            		 <div class="form-group">
            			<label for="iluminacion_cancha">Iluminacion</label>
            			<input type="text" name="iluminacion_cancha" required value="{{old('iluminacion_cancha')}}" class="form-control" placeholder="Iluminacion">
            		</div>

            	</div>

            	<div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
            		
            		<div class="form-group">
            			<label for="direccion_cancha">Dirección</label>
            			<input type="text" name="direccion_cancha" required value="{{old('direccion_cancha')}}" class="form-control" placeholder="Dirección de la cancha">
            		</div>

            	</div>

            	<div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
            		
				<div class="form-group">
            			<label for="capacidad_cancha">Capacidad</label>
            			<input type="number" name="capacidad_cancha" required value="{{old('capacidad_cancha')}}" class="form-control" placeholder="Capacidad de la cancha">
            		</div>
            	</div>		

            	<div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
            		
				<div class="form-group">
            			<label for="privacidad_cancha">Privacidad</label>
            			<input type="text" name="privacidad_cancha" value="{{old('privacidad_cancha')}}" class="form-control" placeholder="Privacidad de la cancha">
            		</div>
            	</div>	

            	<div class="col-lg-6 col-cm-6 col-md-6 col-xs-12">
				<div class="form-group">
            			<label for="imagen_cancha">Imagen</label>
            			<input type="file" name="imagen_cancha" class="form-control">
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