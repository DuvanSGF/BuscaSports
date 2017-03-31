<?php

namespace webDeportes\Http\Controllers;

use Illuminate\Http\Request;
use webDeportes\Barrio;
use Illuminate\Support\Facades\Redirect;
use webDeportes\Http\Requests\BarrioFormRequest;
use DB;

class BarrioController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){

    	if($request){

    		$query=trim($request->get('searchText'));
    		$barrios=DB::table('barrio')->where('nombre_barrio','LIKE','%'.$query.'%')
    		->orderBy('id_barrio','asc')
    		->paginate(5);

    		return view('lugar.barrio.index',["barrios"=>$barrios,"searchText"=>$query]);
    	}
    }

    public function create(){
        $comunas=DB::table('comuna')->get();
    	return view('lugar.barrio.create',["comunas"=>$comunas]);
    }

    public function store(BarrioFormRequest $request){

    	$barrio=new Barrio;

    	$barrio->nombre_barrio=$request->get('nombre_barrio');
    	$barrio->id_comuna=$request->get('id_comuna');
    	$barrio->save();

    	return Redirect::to('lugar/barrio');
    }
    public function show($id){

    	return view("lugar.barrio.show",["barrio"=>Barrio::findOrFail($id)]);
    }
    public function edit($id){

        $barrios=DB::table('barrio')->get();
        $comunas=DB::table('comuna')->get();
    	return view("lugar.barrio.edit",["barrio"=>Barrio::findOrFail($id),"barrios"=>$barrios,"comunas"=>$comunas]);
    }
    public function update(BarrioFormRequest $request,$id){

    	$barrio=Barrio::findOrFail($id);
    	$barrio->nombre_barrio=$request->get('nombre_barrio');
    	$barrio->id_comuna=$request->get('id_comuna');
    	$barrio->update();

    	return Redirect::to('lugar/barrio');
    }
    public function destroy($id)
    {
        $barrio = DB::table('barrio')->where('id_barrio', '=', $id)->delete();
        return Redirect::to('lugar/barrio');
    }

}
