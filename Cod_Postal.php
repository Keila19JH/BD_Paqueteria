<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Codigos Postales Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <a href="index.php" class="btn btn-outline-danger">Regresar</a>
</div>

    <center>
        <h1 class="titulo">Códigos Postales</h1>

        <form name = "cod_postal" method = "post" action = " ">
            <div>
                ID_Codigo Postal
                <input type = "int" name= "id_cod_postal">
            </div>
            <br>
            
            <div>
                Codigo Postal 
                <input type = "int" name= "cod_postal">
            </div>
            <br>
            
            <div class="mt-3">
            <div class="d-inline-block me-2">
                <button type="submit" class="btn btn-info" name="guardar">Guardar</button>
            </div>
            <div class="d-inline-block me-2">
                <button type="submit" class="btn btn-info" name="eliminar">Eliminar</button>
            </div>
            <div class="d-inline-block me-2">
                <button type="submit" class="btn btn-info" name="consultar">Consultar</button>
            </div>
            <div class="d-inline-block">
                <button type="submit" class="btn btn-info" name="modificar">Modificar</button>
            </div>
        </div>
    </form>
</div>

	</center>

        <br>
        
        <?php
		
	$usuario="root";
	$bd="paquetes"; //Nombre de la base de datos
	$conectado="localhost"; //Conectar al servidor
	$password="";

	
	$conexion=mysqli_connect("$conectado", "$usuario", "$password", "$bd");
	if(!$conexion)
	{
	echo"<br>";
	printf("No hay conexion");
	echo"<br>";
	}



	if((isset($_POST['guardar']))==true)
	{
	$id_codigoPostal = $_POST['id_cod_postal'];
	$codigoPostal = $_POST['cod_postal'];
	$sql = "insert into cod_postal values ('$id_codigoPostal', '$codigoPostal');";
	
	
	echo"$id_codigoPostal";
	echo"<br>";
	echo"$codigoPostal";
	echo"<br>";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_cod_postal'];
	$sql = "delete from cod_postal where id_cod_postal=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_cod_postal']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_cod_postal, cod_postal FROM cod_postal WHERE cod_postal.id_cod_postal = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Codigo Postal: " . $fila['id_cod_postal'] . '<br>';
                        echo "Codigo Postal: " . $fila['cod_postal'] . '<br>';
                        echo '<br>';
                    }
                } else {
                    echo "No se encontraron resultados.";
                }
            } else{
                echo "Error en la consulta: " . mysqli_error($cnx);
            }
            
            mysqli_stmt_close($stmt);
            mysqli_close($cnx);
        }

	
	if((isset($_POST['modificar']))==true)
	{
	$id_modificar = $_POST['id_cod_postal'];
	$codigoPostal = $_POST['cod_postal'];
	
	$sql = "update cod_postal set cod_postal='$codigoPostal' where id_cod_postal='$id_modificar';";
	mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>