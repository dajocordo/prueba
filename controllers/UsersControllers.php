<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UsersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::table('users')->get();
        return view('home')->with('usuarios', $usuarios);
    }


    public function search()
    {   
        if (isset($_POST['btn_buscar'])) {
            if (!empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono'])) {
                $name = $_POST['buscar_name'];
                $apellido = $_POST['buscar_apellido'];
                $telefono = $_POST['buscar_telefono'];
                $busqueda = DB::table('users')->where('name', $name)->where('apellido', $apellido)->where('telefono', $telefono)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (!empty($_POST['buscar_name']) && empty($_POST['buscar_apellido'])) {
                 $name = $_POST['buscar_name'];
                $busqueda = DB::table('users')->where('name', $name)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono'])) {
                $apellido = $_POST['buscar_apellido'];
                $busqueda = DB::table('users')->where('apellido', $apellido)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido'])) {
                $apellido = $_POST['buscar_apellido'];
                $busqueda = DB::table('users')->where('apellido', $apellido)->get();
                return view('home')->with('busqueda', $busqueda);
            }

            
        
        } else {
            $usuarios = DB::table('users')->get();
            return view('home')->with('usuarios', $usuarios);
        }
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     */

    public function neww(){
        return view('new');
    }

    public function create()
    {
        if (isset($_POST['btn_enviar'])) {
            $name = $_POST['txt_name'];
            $apellido = $_POST['txt_apellido'];
            $telefono = $_POST['txt_telefono'];
            $creado = date("Y-m-d H:i:s");
            $actual = date("Y-m-d H:i:s");

            DB::table('users')->insert(['name' => $name, 'apellido' => $apellido, 'telefono' => $telefono, 'created_at' => $creado, 'updated_at' => $actual]);
            // DB::INSERT("INSERT INTO users (name, apellido, created_at, updated_at) VALUES(?,?,?,?)",[$name,$apellido,$Creado,$Actual]);

            echo '<script language="javascript">';
            echo 'alert("Datos ingresados correctamente")';
            echo '</script>';
            return redirect("/");
        
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
        $view_ux = DB::table('users')->where('id', $id)->get();
        foreach($view_ux as $view) {
            $name = $view->name;
            $apellido = $view->apellido;
            return view('view')->with('name', $name)->with('apellido', $apellido);
        }
        
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
        $wasDeleted = DB::table('users')->where('id', $id)->delete();
        return view('home')->with('wasDeleted',$wasDeleted);
    }
}
