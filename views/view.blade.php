<!DOCTYPE html>
<html>

<head>
    <title>Ver Empleado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilopro.css">
</head>

<body>
    <div class="container">
        <!-- Modal "Ver Empleado" -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="delEmpleadoLabel"><img src="/img/viewEmp.png"> Ver Empleado</h5>
                        <a href="/" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></a><br>

                    </div>
                    <form name="frm_view_empleado" action="{{url('')}}" method="post">
                        <div class="modal-body">
                            
                            @csrf
                            <input type="hidden" name="id" value="@php echo $id; @endphp">
                            <div class="row">
                                <div class="col">
                                    <label name="lbl_name">Nombre</label>
                                    <input type="text" class="form-control" name="txt_name" value="@php echo $nombre; @endphp" disabled><br>
                                </div>
                                <div class="col">
                                    <label name="lbl_apellido">Apellido</label>
                                    <input type="text" class="form-control" name="txt_apellido" value="@php echo $apellido; @endphp" disabled><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label name="lbl_correo">Correo</label>
                                    <input type="email" class="form-control" name="txt_correo" value="@php echo $correo; @endphp" disabled><br>
                                </div>
                                <div class="col">
                                    <label name="lbl_telefono">Telefono</label>
                                    <input type="number" class="form-control" name="txt_telefono" value="@php echo $telefono; @endphp" disabled><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label name="lbl_departamento">Departamento</label>
                                    <input type="text" class="form-control" name="txt_telefono" value="@php echo $nombreDpto; @endphp" disabled><br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="/" class="btn btn-secondary">Regresar</a><br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>