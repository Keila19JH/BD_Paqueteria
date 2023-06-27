<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Clientes Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo">Status Clientes</h1>

        <form name = "status" method = "post" action = " ">
            <div>
                ID_Status Cliente
                <input type = "int" name= "id_status">
            </div>
            <br>
            
            <div>
                Status del Cliente
                <input type = "int" name= "status">
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
	$id_Status = $_POST['id_status'];
	$desc_Status = $_POST['status'];
	$sql = "insert into status values ('$id_Status', '$desc_Status');";
	
	
	echo"$id_Status";
	echo"<br>";
	echo"$desc_Status";
	echo"<br>";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_status'];
	$sql = "DELETE FROM status WHERE id_status = $id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_status']); 
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
            $query2 = "SELECT id_status, status FROM status WHERE status.id_status = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Status_Cliente: " . $fila['id_status'] . '<br>';
                        echo "Status del Cliente: " . $fila['status'] . '<br>';
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
        $id_Status = $_POST['id_status'];
        $desc_Status = $_POST['status'];
        $sql = "UPDATE status SET status = '$desc_Status' WHERE id_status = '$id_Status';";
        mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>