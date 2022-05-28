<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentosTable = DB::table("departamentos")->get();
        return view("departamentos")->with("departamentosTable", $departamentosTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (isset($_POST['btn_crear_departamento'])) {
            $name = $_POST['txt_dpto_name'];
            $ubicacion = $_POST['txt_dpto_ubicacion'];
            $creado = date("Y-m-d H:i:s");
            $actual = date("Y-m-d H:i:s");

            DB::table('departamentos')->insert(['NomDepartamento' => $name, 'Ubicacion' => $ubicacion, 'created_at' => $creado, 'updated_at' => $actual]);
            
            echo '<script language="javascript">';
            echo 'alert("Datos ingresados correctamente")';
            echo '</script>';
            return redirect("/d");
        
        } else {
            echo '<script language="javascript">';
            echo 'alert("Hubo un error, favor intentarlo de nuevo")';
            echo '</script>';
            return redirect("/new");
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
