<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transportes Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo">Transportes para Envios</h1>

        <form name = "transporte" method = "post" action = " ">
            <div>
                ID_Transporte
                <input type = "int" name= "id_trans">
            </div>
            <br>
            
            <div>
                Tipo de Transporte
                <input type = "int" name= "transporte">
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
	$id_Transporte = $_POST['id_trans'];
	$tipo_Transporte = $_POST['transporte'];
	$sql = "insert into transporte values ('$id_Transporte', '$tipo_Transporte');";
	
	
	echo"$id_Transporte";
	echo"<br>";
	echo"$tipo_Transporte";
	echo"<br>";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_trans'];
	$sql = "DELETE FROM transporte WHERE id_trans = $id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_trans']); 
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
            $query2 = "SELECT id_trans, transporte FROM transporte WHERE transporte.id_trans = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID del Transporte: " . $fila['id_trans'] . '<br>';
                        echo "Tipo de Transporte: " . $fila['transporte'] . '<br>';
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
        $id_Transporte = $_POST['id_trans'];
        $tipo_Transporte = $_POST['transporte'];
        $sql = "UPDATE transporte SET transporte = '$tipo_Transporte' WHERE id_trans = '$id_Transporte';";
        mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>