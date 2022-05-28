<!DOCTYPE html>
<html>

<head>
	<title>Nuevo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container" style="padding-top: 1.5em; padding-bottom: 1em; text-align: center">
		<h2>Nuevo</h2><br>
		<a href="new">regresar</a><br><br>

		<div class="row">
			<form name="frm_new" action="{{url('/nuevo')}}" method="post">
				@csrf
				<div class="row">
					<div class="col">
                        <label name="lbl_name">Nombre</label>
						<input type="text" class="form-control" name="txt_name"><br>
					</div>
					<div class="col">
                    <label name="lbl_name">Apellido</label>
						<input type="text" class="form-control" name="txt_apellido"><br>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<label name="lbl_name">Telefono</label>
						<input type="number" class="form-control" name="txt_telefono"><br>
					</div>
					<div class="col">
						<input type="submit" class="btn btn-primary form-control" name="btn_enviar"><br>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>