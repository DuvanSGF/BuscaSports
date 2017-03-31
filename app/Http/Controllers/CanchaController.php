<?php

namespace webDeportes\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use webDeportes\Cancha;
use Illuminate\Support\Facades\Redirect;
use webDeportes\Http\Requests\CanchaFormRequest;
use DB;

class CanchaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

    	if($request){

    		$query=trim($request->get('searchText'));
    		$canchas=DB::table('cancha as c')
            ->join('tipo_cancha as tc', 'c.id_tipocancha','=','tc.id_tipocancha')
            ->join('barrio as b','c.id_barrio','=','b.id_barrio')
            ->select('c.id_cancha','c.estado','tc.tipo_cancha','b.nombre_barrio','c.iluminacion_cancha','c.direccion_cancha','c.capacidad_cancha','c.privacidad_cancha','c.imagen_cancha')
            ->where('estado','=','Activo')
            ->where('b.nombre_barrio','LIKE','%'.$query.'%')
    		->orderBy('c.id_cancha','asc')
    		->paginate(5);

    		return view('lugar.cancha.index',["canchas"=>$canchas,"searchText"=>$query]);
    	}
    }

    public function create(){

        $barrios=DB::table('barrio')->get();
        $tipo_canchas=DB::table('tipo_cancha')->get();

    	return view('lugar.cancha.create',["barrios"=>$barrios,"tipo_canchas"=>$tipo_canchas]);
    }

    public function store(CanchaFormRequest $request){

    	$cancha=new Cancha;

    	$cancha->estado='Activo';
        $cancha->id_tipocancha=$request->get('tipo_cancha');
        $cancha->id_barrio=$request->get('nombre_barrio');
        $cancha->iluminacion_cancha=$request->get('iluminacion_cancha');
        $cancha->direccion_cancha=$request->get('direccion_cancha');
        $cancha->capacidad_cancha=$request->get('capacidad_cancha');
        $cancha->privacidad_cancha=$request->get('privacidad_cancha');

        if(Input::hasFile('imagen_cancha')){

            $file=Input::file('imagen_cancha');
            $file->move(public_path().'/imagenes/canchas/',$file->getClientOriginalName());

            $cancha->imagen_cancha=$file->getClientOriginalName();
        }

    	$cancha->save();

    	return Redirect::to('lugar/cancha');
    }
    public function show($id){

    	return view("lugar.cancha.show",["cancha"=>Cancha::findOrFail($id)]);
    }
    public function edit($id){

        $barrios=DB::table('barrio')->get();
        $tipo_canchas=DB::table('tipo_cancha')->get();

    	return view("lugar.cancha.edit",["cancha"=>Cancha::findOrFail($id),"barrios"=>$barrios,"tipo_canchas"=>$tipo_canchas]);
    }
    public function update(CanchaFormRequest $request,$id){

    	$cancha=Cancha::findOrFail($id);

        $cancha->id_tipocancha=$request->get('tipo_cancha');
        $cancha->id_barrio=$request->get('nombre_barrio');
        $cancha->iluminacion_cancha=$request->get('iluminacion_cancha');
        $cancha->direccion_cancha=$request->get('direccion_cancha');
        $cancha->capacidad_cancha=$request->get('capacidad_cancha');
        $cancha->privacidad_cancha=$request->get('privacidad_cancha');

        if(Input::hasFile('imagen_cancha')){

            $file=Input::file('imagen_cancha');
            $file->move(public_path().'/imagenes/canchas/',$file->getClientOriginalName());

            $cancha->imagen_cancha=$file->getClientOriginalName();
        }

        $cancha->update();

        return Redirect::to('lugar/cancha');
    }
    public function destroy($id)
    {
        $cancha=Cancha::findOrFail($id);
        $cancha->estado='Inactivo';
        $cancha->update();
        return Redirect::to('lugar/cancha');
    }

}
