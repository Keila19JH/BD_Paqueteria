<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Envios Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo"> Envio de paquetes </h1>
        <form name = "envios" method = "post" action = " ">
            <div>
                ID_Envio:
                <input type = "int" name= "id_envio">
            </div>
            <br>
            <div>
                ID_Paquete:
                <input type = "text" name= "id_paquete1">
            </div>
            <br>
            <div>
                ID_Ruta:
                <input type = "text" name= "id_ruta1">
            </div>
            <br>
            <div>
                ID_Costo:
                <input type = "text" name= "id_costo1">
            </div>
            <br>
            <div>
                ID_Transporte:
                <input type = "int" name= "id_trans1">
            </div>
            <br>
            <div>

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
	$id_envio = $_POST['id_envio'];
	$id_paquete1 = $_POST['id_paquete1'];
	$id_ruta1 = $_POST['id_ruta1'];
	$id_costo1 = $_POST['id_costo1'];
	$id_trans1 = $_POST['id_trans1'];

	$sql = "insert into envios values ('$id_envio', '$id_paquete1', '$id_ruta1', '$id_costo1', '$id_trans1');";
	
	
	echo"$id_envio";
	echo"<br>";
	echo"$id_paquete1";
	echo"<br>";
	echo"$id_ruta1";
	echo"<br>";
	echo"$id_costo1";
	echo"<br>";
	echo"$id_trans1";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_envio'];
	$sql = "delete from envios where id_envio=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_envio']); 
            //$nombre = trim($_POST['nom_cliente']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_envio, id_paquete1, id_ruta1, id_costo1, id_trans1 FROM envios WHERE envios.id_envio = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID_Envio: " . $fila['id_envio'] . '<br>';
                        echo "ID_Paquete: " . $fila['id_paquete1'] . '<br>';
                        echo "ID_Ruta: " . $fila['id_ruta1'] . '<br>';
                        echo "ID_Costo: " . $fila['id_costo1'] . '<br>';
                        echo "ID_Transporte: " . $fila['id_trans1'] . '<br>';
    
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
	$id_modificar = $_POST['id_envio'];

    $id_paquete1 = $_POST['id_paquete1'];
	$id_ruta1 = $_POST['id_ruta1'];
	$id_costo1 = $_POST['id_costo1'];
	$id_trans1 = $_POST['id_trans1'];

	$sql = "update envios set id_paquete1='$id_paquete1',id_ruta1='$id_ruta1',id_costo1='$id_costo1',id_trans1='$id_trans1' where id_envio='$id_modificar';";
	mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>