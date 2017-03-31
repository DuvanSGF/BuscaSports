<?php

namespace webDeportes\Http\Controllers;

use Illuminate\Http\Request;
use webDeportes\Reserva;
use Illuminate\Support\Facades\Redirect;
use webDeportes\Http\Requests\ReservaFormRequest;
use DB;
use Carbon\Carbon;

class ReservaController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

    	if($request){

    		$query=trim($request->get('searchText'));
    		$reservas=DB::table('reserva as r')
            ->join('users as u', 'r.id_usuario_reserva','=','u.id')
            ->join('deportes as d','r.id_deporte_reserva','=','d.id_deporte')
            ->join('cancha as c','r.id_cancha_reserva','=','c.id_cancha')
            ->select('r.id_reserva','r.estado','u.name','d.nombre_deporte','c.direccion_cancha','r.dia_reserva','r.equipo1_reserva','r.equipo2_reserva','r.descripcion_reserva')
            ->where('r.id_reserva','LIKE','%'.$query.'%')
    		->orderBy('r.id_reserva','asc')
    		->paginate(5);

    		return view('equipos.reserva.index',["reservas"=>$reservas,"searchText"=>$query]);
    	}
    }

    public function create(){


        $deportes=DB::table('deportes')
        ->get();

   		$users=DB::table('users')
   		->select('id','name')
   		->where('estado','=','Activo')
   		->get();

   		$canchas=DB::table('cancha')
   		->select('id_cancha','direccion_cancha')
   		->where('estado','=','Activo')
   		->get();

    	return view('equipos.reserva.create',["users"=>$users,"deportes"=>$deportes,"canchas"=>$canchas]);
    }

    public function store(ReservaFormRequest $request){

    	$reserva=new Reserva;

    	$reserva->estado='Activo';
        $reserva->id_usuario_reserva=$request->get('name');
        $reserva->id_deporte_reserva=$request->get('nombre_deporte');
        $reserva->id_cancha_reserva=$request->get('direccion_cancha');
        $reserva->dia_reserva=$request->get('dia_reserva');
        $reserva->equipo1_reserva=$request->get('equipo1_reserva');
        $reserva->equipo2_reserva=$request->get('equipo2_reserva');
        $reserva->descripcion_reserva=$request->get('descripcion_reserva');

    	$reserva->save();

    	return Redirect::to('equipos/reserva');
    }

    public function show($id){

    	return view("equipos.reserva.show",["reserva"=>Reserva::findOrFail($id)]);
    }
    public function edit($id){

        $deportes=DB::table('deportes')
        ->get();

        $users=DB::table('users')
        ->select('id','name')
        ->where('estado','=','Activo')
        ->get();

        $canchas=DB::table('cancha')
        ->select('id_cancha','direccion_cancha')
        ->where('estado','=','Activo')
        ->get();

    	return view("equipos.reserva.edit",["reserva"=>Reserva::findOrFail($id),"users"=>$users,"deportes"=>$deportes,"canchas"=>$canchas]);
    }
    public function update(ReservaFormRequest $request,$id){

    	$reserva=Reserva::findOrFail($id);/*Php unit*/

        $reserva->estado='Activo';
        $reserva->id_usuario_reserva=$request->get('name');
        $reserva->id_deporte_reserva=$request->get('nombre_deporte');
        $reserva->id_cancha_reserva=$request->get('direccion_cancha');
        $reserva->dia_reserva=$request->get('dia_reserva');
        $reserva->equipo1_reserva=$request->get('equipo1_reserva');
        $reserva->equipo2_reserva=$request->get('equipo2_reserva');
        $reserva->descripcion_reserva=$request->get('descripcion_reserva');

        $reserva->update();

        return Redirect::to('equipos/reserva');
    }
    public function destroy($id)
    {
        $reserva=Reserva::findOrFail($id);
        $reserva->estado='Inactivo';
        $reserva->update();
        return Redirect::to('equipos/reserva');
    }
}
