<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Imports\CongifuracionesImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracion $configuracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuracion $configuracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }
    public function revisar(){
        $configuraciones = Configuracion::where('grua',"23-24")->get();
        foreach ($configuraciones as $key => $value) {
            $id = $value->id;
            $configuracion = Configuracion::find($id);

            $configuracion->grua = 'Grúas 23 y 24';

            $configuracion->save();
        }
    }
    public function configuracionSearch(Request $request){
        $longitud = $request->longitud_de_pluma;
        $radio = $request->radio;
        $peso = $request->peso;
        $configuraciones = Configuracion::all();
        $listado = array();
        foreach ($configuraciones as $key => $value) {
            if ($value->longitud_de_pluma >= $longitud && $value->radio >= $radio && $value->peso >= $peso) {
                $grua = $value->grua;
                $configuracion = $value->configuracion;
                if (in_array($grua, $listado)) {
                    
                }else{
                    $listado = array_merge($listado, array($configuracion => $grua));
                }
            }
        }
        $listado = json_encode($listado, JSON_UNESCAPED_UNICODE);
        return $listado;
    }
    public function configuracionSearchTalha(){
        //        $longitud = $request->longitud_de_pluma;
//        $radio = $request->radio;
//        $peso = $request->peso;
        $longitud = 5;
        $radio = 5;
        $peso = 5;
        $configuraciones = Configuracion::all();
        $listado = array();
        $data = array();
        foreach ($configuraciones as $key => $value) {
            if ($value->longitud_de_pluma >= $longitud && $value->radio >= $radio && $value->peso >= $peso) {
                $grua = $value->grua;
                $configuracion = $value->configuracion;

                if (in_array($grua, $listado)) {

                }else{
                    echo('longitud_de_pluma '.$value->longitud_de_pluma).'<br>';
                    echo('radio '.$value->radio).'<br>';
                    echo('peso '.$value->peso).'<br>';
                    $data = array($configuracion => $grua);
                    var_dump($data);
                    echo'*********************************<br>';

                    $listado = array_merge($listado, array($configuracion => $grua));
                }
            }
        }
        echo '<pre>';
        print_r ($listado);
        echo '<pre>';
        $listado = json_encode($listado, JSON_UNESCAPED_UNICODE);
//        return $listado;
    }

    public function importForm(Request $request){
        return view('import');
    }
 
    public function import(Request $request)
    {
        $import = new CongifuracionesImport();
        Excel::import($import, request()->file('alumnos'));
        return view('import', ['numRows'=>$import->getRowCount()]);
    }
}
