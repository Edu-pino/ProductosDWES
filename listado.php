<?php session_start();

function mostrarProductos(){

	try {
		$conn = new pdo('mysql:host=127.0.0.1;dbname=dwes','eduardo','eduardo');
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "Connected successfully";
	} catch(PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}


	if (isset($_POST["familiaSeleccionada"])){
		$familiaSeleccionada= $_POST["familiaSeleccionada"];

		$sql= "SELECT nombre_corto,PVP FROM PRODUCTOS WHERE familia= :familia";
		$stmt= $conn ->prepare($sql);


	}
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Plantilla para Ejercicios Tema 3</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div id="encabezado">
	<h1>Tarea: Listado de Productos de una Familia:</h1>
	<form id="form_seleccion" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<div class="form-group" id="div-familias">
		<label for="familia">Familia:</label>
		<select class="form-select form-select-sm" aria-label="Small select example" id="familias-options" name="familiaSeleccionada">
			<option value="Cámaras digitales">Cámaras digitales</option>
			<option value="Consolas">Consolas</option>
			<option value="Libros electrónicos">Libros electrónicos</option>
			<option value="Impresoras">Impresoras</option>
			<option value="Memorias flash">Memorias flash</option>
			<option value="Reproductores MP3">Reproductores MP3</option>
			<option value="Equipos multifunción">Equipos multifunción</option>
			<option value="Netbooks">Netbooks</option>
			<option value="Ordenadores">Ordenadores</option>
			<option value="Ordenadores portátiles">Ordenadores portátiles</option>
			<option value="Routers">Routers</option>
			<option value="Sistemas de alimentación ininterrumpida">Sistemas de alimentación ininterrumpida</option>
			<option value="Software">Software</option>
			<option value="Televisores">Televisores</option>
			<option value="Videocámaras">Videocámaras</option>
		</select>
		<button type="submit" class="btn btn-primary btn-sm" id="mostrarProductos">Mostrar productos</button>
	</div>
	</form>
</div>

<div id="contenido">
	<h2>Productos de la familia:</h2>
</div>

<div id="pie">
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</html>
