<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colonias Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo">Colonias</h1>

        <form name = "colonia" method = "post" action = " ">
            <div>
                ID_Colonia
                <input type = "int" name= "id_colonia">
            </div>
            <br>
            
            <div>
                Nombre de la Colonia
                <input type = "int" name= "colonia">
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
	$id_Colonia = $_POST['id_colonia'];
	$nombre_Colonia = $_POST['colonia'];
	$sql = "insert into colonia values ('$id_Colonia', '$nombre_Colonia');";
	
	
	echo"$id_Colonia";
	echo"<br>";
	echo"$nombre_Colonia";
	echo"<br>";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_colonia'];
	$sql = "DELETE FROM colonia WHERE id_colonia = $id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_colonia']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
            $query2 = "SELECT id_colonia, colonia FROM colonia WHERE colonia.id_colonia = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Colonia: " . $fila['id_colonia'] . '<br>';
                        echo "Nombre de la Colonia: " . $fila['colonia'] . '<br>';
                        echo '<br>';
                    }
                } 
                else {
                    echo "No se encontraron resultados.";
                }
            } 
                else{
                echo "Error en la consulta: " . mysqli_error($cnx);
                }
            
            mysqli_stmt_close($stmt);
            mysqli_close($cnx);
    }

	
	if((isset($_POST['modificar']))==true){
        $id_Colonia = $_POST['id_colonia'];
        $nombre_Colonia = $_POST['colonia'];
        $sql = "UPDATE colonia SET colonia = '$nombre_Colonia' WHERE id_colonia = '$id_Colonia';";
        mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>