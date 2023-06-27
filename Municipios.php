<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Municipios Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo">Municipios</h1>

        <form name = "municipio" method = "post" action = " ">
            <div>
                ID_Municipio
                <input type = "int" name= "id_municipio">
            </div>
            <br>
            
            <div>
                Nombre del Municipio
                <input type = "int" name= "municipio">
            </div>
            <br>
            
            <br>
            <input type ="Submit" name = "guardar" value = "Guardar">
            <input type ="Submit" name = "eliminar" value = "Eliminar">
            <input type ="Submit" name = "consultar" value = "Consultar">
            <input type ="Submit" name = "modificar" value = "Modificar">
            <br><br><br><br><br><br><br><br><br>

        </form>

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
	$id_Municipio = $_POST['id_municipio'];
	$nombre_Municipio = $_POST['municipio'];
	$sql = "insert into municipio values ('$id_Municipio', '$nombre_Municipio');";
	
	
	echo"$id_Municipio";
	echo"<br>";
	echo"$nombre_Municipio";
	echo"<br>";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_municipio'];
	$sql = "DELETE FROM municipio WHERE id_municipio = $id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_municipio']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
            $query2 = "SELECT id_municipio, municipio FROM municipio WHERE municipio.id_municipio = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Municipio: " . $fila['id_municipio'] . '<br>';
                        echo "Nombre del Municipio: " . $fila['municipio'] . '<br>';
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
	$id_modificar = $_POST['id_municipio'];
	$nombre_Municipio = $_POST['municipio'];
	
	$sql = "update municipio set municipio='$nombre_Municipio' where id_municipio='$id_modificar';";
	mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>