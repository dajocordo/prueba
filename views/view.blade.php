<!DOCTYPE html>
<html>

<head>
	<title>View</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container" style="padding-top: 1.5em; padding-bottom: 1em; text-align: center">

		<div class="row">
            <h2>View</h2><br>
			<form name="frm_new" action="{{url('/update')}}" method="post">
				@csrf
				<div class="row">
					<div class="col">
                        <label name="lbl_name">Nombre</label>
						<input type="text" class="form-control" name="txt_name" value="@php echo $name; @endphp" disabled><br>
					</div>
					<div class="col">
                    <label name="lbl_name">Apellido</label>
						<input type="text" class="form-control" name="txt_apellido" value="@php echo $apellido; @endphp" disabled><br>
					</div>
				</div>
				<div class="row">
					<!-- <div class="col">
						<input type="text" class="form-control" name="txt_name"><br>
					</div> -->
					<div class="col">
                        <a href="/" class="btn btn-primary form-control">regresar</a><br><br>
					</div>
				</div>
			</form>
		</div>
	</div>
</body>

</html>