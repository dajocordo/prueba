<!DOCTYPE html>
<html>

<head>
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilopro.css">
</head>

<body>
    <div class="container">

        <div class="row" id="busquedaDeEmpleados">
            <h3 class="centro">Búsqueda de departamentos</h3>
            <form name="frm_new" action="{{url('/look')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <label name="lbl_name">Nombre</label>
                        <input type="text" class="form-control" name="buscar_name" maxlength="50">
                    </div>
                    <div class="col">
                        <label name="lbl_apellido">Apellido</label>
                        <input type="text" class="form-control" name="buscar_apellido" maxlength="50">
                    </div>
                    <div class="col">
                        <label name="lbl_telefono">Telefono</label>
                        <input type="text" class="form-control" name="buscar_telefono" maxlength="10">
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col">
						<input type="text" class="form-control" name="txt_name"><br>
					</div> -->
                    <div class="col">
                        <input type="submit" class="btn btn-success form-control" name="btn_buscar" value="Buscar">
                    </div>
                </div>
            </form>
        </div>
        <div class="row" id="DataTable">

            <h2 class="centro">Departamentos</h2><br>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoEmpleado">+</button>
            @php if (isset($departamentosTable) == true) { @endphp
            <table id="example" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ubicacion</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @php
                    foreach ($departamentosTable as $info) {
                    $id = $info->idEmpleado;
                    $name = $info->NomEmp;
                    $apellido = $info->ApellEmp;
                    @endphp
                    <tr>
                        <td>@php echo $id; @endphp</td>
                        <td>@php echo $name; @endphp</td>
                        <td>@php echo $apellido; @endphp</td>
                        <td><a style="margin-right:0.25em" class="btn btn-info"
                                href="/users/@php echo $id; @endphp/edit" title="Editar"><img src="img/edit.png"></a>
                            <a class="btn btn-warning" href="/view/@php echo $id; @endphp" target="_blank"
                                title="Ver"><img src="img/view.png"></a>
                            <a style="margin-left:0.25em" class="btn btn-danger" href="/del/@php echo $id; @endphp"
                                title="Eliminar"><img src="img/delete.png"></a>
                        </td>
                    </tr>
                    @php } @endphp
                </tbody>
            </table>
            @php } else if (isset($busqueda) == true) { @endphp
            <table id="example" class="table table-bordered table-hover" style="width:100%">
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @php
                    foreach ($busqueda as $info) {
                    $id = $info->id;
                    $name = $info->name;
                    $apellido = $info->apellido;
                    @endphp
                    <tr>
                        <td>@php echo $id; @endphp</td>
                        <td>@php echo $name; @endphp</td>
                        <td>@php echo $apellido; @endphp</td>
                        <td><a style="margin-right:0.25em" class="btn btn-info"
                                href="/users/@php echo $id; @endphp/edit" title="Editar"><img src="img/edit.png"></a>
                            <a class="btn btn-warning" href="/users/@php echo $id; @endphp" title="Ver"><img
                                    src="img/view.png"></a>
                            <a style="margin-left:0.25em" class="btn btn-danger" href="/@php echo $id; @endphp/delete"
                                title="Eliminar"><img src="img/delete.png"></a>
                        </td>
                    </tr>
                    @php } @endphp
                </tbody>
            </table>
            @php } else if (isset($wasDeleted) == true) { @endphp
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                El usuario ha sido eliminado
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @php } else {
            echo("no hay nada");
            }
            @endphp
        </div>
        <!-- Modal "Nuevo Empleado" -->
        <div class="modal fade" id="nuevoEmpleado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="nuevoEmpleadoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nuevoEmpleadoLabel">Nuevo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form name="frm_nuevo_empleado" aaction="{{url('/nuevoDepartamento')}}" method="post">
                        <div class="modal-body">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label name="lbl_name">Nombre</label>
                                    <input type="text" class="form-control" name="txt_name" required><br>
                                </div>
                                <div class="col">
                                    <label name="lbl_apellido">Apellido</label>
                                    <input type="text" class="form-control" name="txt_apellido" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Regresar</button>
                            <input type="submit" class="btn btn-primary" name="btn_crear_departamento" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
</body>

</html>