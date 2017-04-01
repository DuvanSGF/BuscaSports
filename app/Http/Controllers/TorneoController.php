<?php

namespace webDeportes\Http\Controllers;

use Illuminate\Http\Request;
use webDeportes\Torneo;
use Illuminate\Support\Facades\Redirect;
use webDeportes\Http\Requests\TorneoFormRequest;
use DB;

class TorneoController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

    	if($request){

    		$query=trim($request->get('searchText'));
    		$torneos=DB::table('torneo as t')
            ->join('users as u', 't.id_organizador_usuario','=','u.id')
            ->join('cancha as c','t.id_cancha_torneo','=','c.id_cancha')
            ->join('deportes as d','t.id_deporte_torneo','=','d.id_deporte')
            ->select('t.id_torneo','u.name','c.direccion_cancha','d.nombre_deporte','t.estado','t.descripcion_torneo')
            ->where('t.id_torneo','LIKE','%'.$query.'%')
            ->where('t.estado','=','Activo')
    		->orderBy('t.id_torneo','asc')
    		->paginate(5);

    		return view('equipos.torneo.index',["torneos"=>$torneos,"searchText"=>$query]);
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

    	return view('equipos.torneo.create',["users"=>$users,"deportes"=>$deportes,"canchas"=>$canchas]);
    }

    public function store(TorneoFormRequest $request){

    	$torneo=new Torneo;

    	$torneo->estado='Activo';
        $torneo->id_organizador_usuario=$request->get('name');
        $torneo->id_cancha_torneo=$request->get('nombre_deporte');
        $torneo->id_deporte_torneo=$request->get('direccion_cancha');
        $torneo->descripcion_torneo=$request->get('descripcion_torneo');

    	$torneo->save();

    	return Redirect::to('equipos/torneo');
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
        $torneo=Torneo::findOrFail($id);
        $torneo->estado='Inactivo';
        $torneo->update();
        return Redirect::to('equipos/torneo');
    }
}
