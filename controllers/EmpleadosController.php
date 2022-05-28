<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentosTable = DB::table("departamentos")->get();
        $empleadosTable = DB::table("empleados")->get();
        return view("home")->with("empleadosTable", $empleadosTable)->with("departamentosTable", $departamentosTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function new()
    {
        return view("new");
    }

    public function create_error()
    {
        return view("home");
    }

    public function search()
    {   
        if (isset($_POST['btn_buscar'])) {
            if (!empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono']) && !empty($_POST['buscar_correo']) && !empty($_POST['buscar_departamento'])) {
                $name = $_POST['buscar_name'];
                $apellido = $_POST['buscar_apellido'];
                $telefono = $_POST['buscar_telefono'];
                $correo = $_POST['buscar_correo'];
                $departamento = $_POST['buscar_departamento'];
                $busqueda = DB::table('empleados')->where('NomEmp', $name)->where('ApellEmp', $apellido)->where('Telefono', $telefono)->where('Correo', $correo)->where('idDepartamento', $departamento)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (empty($_POST['buscar_name']) && empty($_POST['buscar_apellido']) && empty($_POST['buscar_telefono']) && empty($_POST['buscar_correo']) && !empty($_POST['buscar_departamento'])) {
                $departamento = $_POST['buscar_departamento'];
                $busqueda = DB::table('empleados')->where('idDepartamento', $departamento)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (!empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono']) && !empty($_POST['buscar_correo'])) {
                $name = $_POST['buscar_name'];
                $apellido = $_POST['buscar_apellido'];
                $telefono = $_POST['buscar_telefono'];
                $correo = $_POST['buscar_correo'];
                $busqueda = DB::table('empleados')->where('NomEmp', $name)->where('ApellEmp', $apellido)->where('Telefono', $telefono)->where('Correo', $correo)->get();
                return view('home')->with('busqueda', $busqueda);
                

            } else if (!empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono'])) {
                $name = $_POST['buscar_name'];
                $apellido = $_POST['buscar_apellido'];
                $telefono = $_POST['buscar_telefono'];
                $busqueda = DB::table('empleados')->where('NomEmp', $name)->where('ApellEmp', $apellido)->where('Telefono', $telefono)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (!empty($_POST['buscar_name']) && empty($_POST['buscar_apellido'])) {
                 $name = $_POST['buscar_name'];
                $busqueda = DB::table('empleados')->where('NomEmp', $name)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono'])) {
                $apellido = $_POST['buscar_apellido'];
                $busqueda = DB::table('empleados')->where('ApellEmp', $apellido)->get();
                return view('home')->with('busqueda', $busqueda);

            } else if (empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido'])) {
                $apellido = $_POST['buscar_apellido'];
                $busqueda = DB::table('empleados')->where('ApellEmp', $apellido)->get();
                return view('home')->with('busqueda', $busqueda);
            
            } else if (empty($_POST['buscar_name']) && empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono']) && empty($_POST['buscar_correo']) && empty($_POST['buscar_departamento'])) {
                $telefono = $_POST['buscar_telefono'];
                $busqueda = DB::table('empleados')->where('Telefono', $telefono)->get();
                return view('home')->with('busqueda', $busqueda);
            } else if (empty($_POST['buscar_name']) && !empty($_POST['buscar_apellido']) && !empty($_POST['buscar_telefono']) && empty($_POST['buscar_correo']) && empty($_POST['buscar_departamento'])) {
                $telefono = $_POST['buscar_telefono'];
                $apellido = $_POST['buscar_apellido'];
                $busqueda = DB::table('empleados')->where('Telefono', $telefono)->where('ApellEmp', $apellido)->get();
                return view('home')->with('busqueda', $busqueda);
            }

            
        
        } else {
            $usuarios = DB::table('users')->get();
            return view('home')->with('usuarios', $usuarios);
        }
    }

    public function create()
    {
        if (isset($_POST['btn_create_empleado'])) {
            $name = $_POST['txt_name'];
            $apellido = $_POST['txt_apellido'];
            $correo = $_POST['txt_correo'];
            $telefono = $_POST['txt_telefono'];
            $departamento = $_POST['opt_departamento'];
            $creado = date("Y-m-d H:i:s");
            $actual = date("Y-m-d H:i:s");

            DB::table('empleados')->insert(['NomEmp' => $name, 'ApellEmp' => $apellido, 'Correo' => $correo, 'Telefono' => $telefono, 'idDepartamento' => $departamento, 'created_at' => $creado, 'updated_at' => $actual]);

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
        $empleadoView = DB::table("empleados")->where("idEmpleado", $id)->get();
        foreach ($empleadoView as $info) {
            $id = $info->idEmpleado;
            $nombre = $info->NomEmp;
            $apellido = $info->ApellEmp;
            $correo = $info->Correo;
            $telefono = $info->Telefono;
            $dpto = $info->idDepartamento;
            $departamento = DB::table("departamentos")->where("idDepartamento", $dpto)->get();

            foreach ($departamento as $infoDpto) {
                $idDpto = $infoDpto->idDepartamento;
                $nombreDpto = $infoDpto->NomDepartamento;
                return view("view")->with("id", $id)->with("nombre", $nombre)->with("apellido", $apellido)->with("correo", $correo)->with("telefono", $telefono)->with("idDpto", $idDpto)->with("nombreDpto", $nombreDpto);
            }
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
        $empleadoEdit = DB::table("empleados")->where("idEmpleado", $id)->get();
        foreach ($empleadoEdit as $info) {
            $id = $info->idEmpleado;
            $nombre = $info->NomEmp;
            $apellido = $info->ApellEmp;
            $correo = $info->Correo;
            $telefono = $info->Telefono;
            $dpto = $info->idDepartamento;
            $departamento = DB::table("departamentos")->where("idDepartamento", $dpto)->get();
            $departamentoTable = DB::table("departamentos")->where('idDepartamento', '<>', $dpto)->get();

            foreach ($departamento as $infoDpto) {
                $idDpto = $infoDpto->idDepartamento;
                $nombreDpto = $infoDpto->NomDepartamento;
                return view("edit")->with("id", $id)->with("nombre", $nombre)->with("apellido", $apellido)->with("correo", $correo)->with("telefono", $telefono)->with("idDpto", $idDpto)->with("nombreDpto", $nombreDpto)->with("departamentoTable", $departamentoTable);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $id)
    {
        if (isset($_POST['btn_update_empleado'])) {
            $id = $_REQUEST['id'];
            $name = $_POST['upt_name'];
            $apellido = $_POST['upt_apellido'];
            $correo = $_POST['upt_correo'];
            $telefono = $_POST['upt_telefono'];
            $departamento = $_POST['upt_departamento'];
            $actual = date("Y-m-d H:i:s");

            DB::table('empleados')->where("idEmpleado", $id)->update(['NomEmp' => $name, 'ApellEmp' => $apellido, 'Correo' => $correo, 'Telefono' => $telefono, 'idDepartamento' => $departamento, 'updated_at' => $actual]);

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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $empleadoDel = DB::table("empleados")->where("idEmpleado", $id)->get();
        foreach ($empleadoDel as $info) {
            $id = $info->idEmpleado;
            $nombre = $info->NomEmp;
            $apellido = $info->ApellEmp;
            $correo = $info->Correo;
            $telefono = $info->Telefono;
            $dpto = $info->idDepartamento;
            $departamento = DB::table("departamentos")->where("idDepartamento", $dpto)->get();

            foreach ($departamento as $infoDpto) {
                $idDpto = $infoDpto->idDepartamento;
                $nombreDpto = $infoDpto->NomDepartamento;
                return view("delete")->with("id", $id)->with("nombre", $nombre)->with("apellido", $apellido)->with("correo", $correo)->with("telefono", $telefono)->with("nombreDpto", $nombreDpto);
            }
        }
        
    }

/*
    public function destroy($id)
    {
        //
    }
*/
    public function destroy()
    {
        $empleadosTable = DB::table("empleados")->get();

        if (isset($_POST['btn_del_empleado'])) {
            $id = $_POST['id'];
            $wasDeleted = DB::table('empleados')->where('idEmpleado', $id)->delete();
            if (isset($wasDeleted)) {
                $empleadosTable = DB::table("empleados")->get();
                return view('home')->with("empleadosTable", $empleadosTable);
            } else {
                return view('home')->with("empleadosTable", $empleadosTable);
            }
            
/*
            echo '<script language="javascript">';
            echo 'alert("Datos ingresados correctamente")';
            echo '</script>';
            return redirect("/");
  */      
        } else {
            echo '<script language="javascript">';
            echo 'alert("Hubo un error, favor intentarlo de nuevo")';
            echo '</script>';
            return redirect("/new");
        }
    }
}
