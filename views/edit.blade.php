<!DOCTYPE html>
<html>

<head>
    <title>Editar Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilopro.css">
</head>

<body>
    <div class="container">
        <!-- Modal "Editar Empleado" -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delEmpleadoLabel"><img src="/img/editEmp.png"> Editar Empleado</h5>
                        <a href="/" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a><br>

                    </div>
                    <form name="frm_delete_empleado" action="{{url('/update')}}" method="post">
                        <div class="modal-body">
                            
                            @csrf
                            <input type="hidden" name="id" value="@php echo $id; @endphp">
                            <div class="row">
                                <div class="col">
                                    <label name="lbl_name">Nombre</label>
                                    <input type="text" class="form-control" name="upt_name" value="@php echo $nombre; @endphp" required><br>
                                </div>
                                <div class="col">
                                    <label name="lbl_apellido">Apellido</label>
                                    <input type="text" class="form-control" name="upt_apellido" value="@php echo $apellido; @endphp" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label name="lbl_correo">Correo</label>
                                    <input type="email" class="form-control" name="upt_correo" value="@php echo $correo; @endphp" required><br>
                                </div>
                                <div class="col">
                                    <label name="lbl_telefono">Telefono</label>
                                    <input type="number" class="form-control" name="upt_telefono" value="@php echo $telefono; @endphp" required><br>
                                </div>
                            <div class="row">
                                <div class="col">
                                    @php if (isset($departamentoTable)) { @endphp
                                    <label name="lbl_departamento">Departamento</label>
                                    <select class="form-control" name="upt_departamento">
                                        <option name="@php echo $idDpto; @endphp" value="@php echo $idDpto; @endphp">@php echo $nombreDpto; @endphp</option>
                                        @php foreach ($departamentoTable as $infoDept) {
                                            $idDept = $infoDept->idDepartamento;
                                            $nombreDept = $infoDept->NomDepartamento;
                                        @endphp
                                        <option name="@php echo $idDept; @endphp" value="@php echo $idDept; @endphp">@php echo $nombreDept; @endphp</option>
                                        @php } @endphp
                                        
                                    </select>
                                    @php } else {} @endphp
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <a href="/" class="btn btn-secondary">Regresar</a><br>
                            <input type="submit" class="btn btn-success" name="btn_update_empleado" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>