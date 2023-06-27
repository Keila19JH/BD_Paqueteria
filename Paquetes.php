<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Paquetes Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo"> Paquetes </h1>
        <form name = "paquetes" method = "post" action = " ">
            <div>
                ID_Paquete:
                <input type = "int" name= "id_paquete">
            </div>
            <br>
            <div>
                ID_Tamaño del Paquete: 
                <input type = "text" name= "id_tam_paquete1">
            </div>
            <br>
            <div>
                Peso del Paquete:
                <input type = "text" name= "pes_paquete">
            </div>
            <br>
            <div>
                ID_Cliente:
                <input type = "text" name= "id_cliente1">
            </div>
            <br>
            <div>
                ID_Status: 
                <input type = "int" name= "id_status1">
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
	$id_paquete = $_POST['id_paquete'];
	$id_tam_paquete1 = $_POST['id_tam_paquete1'];
	$pes_paquete = $_POST['pes_paquete'];
	$id_cliente1 = $_POST['id_cliente1'];
	$id_status1 = $_POST['id_status1'];

	$sql = "insert into paquetes values ('$id_paquete', '$id_tam_paquete1', '$pes_paquete', '$id_cliente1', '$id_status1');";
	
	
	echo"$id_paquete";
	echo"<br>";
	echo"$id_tam_paquete1";
	echo"<br>";
	echo"$pes_paquete";
	echo"<br>";
	echo"$id_cliente1";
	echo"<br>";
	echo"$id_status1";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_paquete'];
	$sql = "delete from paquetes where id_paquete=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_paquete']); 
            //$nombre = trim($_POST['nom_cliente']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_paquete, id_tam_paquete1, pes_paquete, id_cliente1, id_status1 FROM paquetes WHERE paquetes.id_paquete = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID_Paquete: " . $fila['id_paquete'] . '<br>';
                        echo "ID_Tamaño del Paquete: " . $fila['id_tam_paquete1'] . '<br>';
                        echo "Peso del paquete: " . $fila['pes_paquete'] . '<br>';
                        echo "ID_Cliente: " . $fila['id_cliente1'] . '<br>';
                        echo "ID_Status Cliente: " . $fila['id_status1'] . '<br>';
    
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
	$id_modificar = $_POST['id_paquete'];

	$id_tam_paquete1 = $_POST['id_tam_paquete1'];
	$pes_paquete = $_POST['pes_paquete'];
	$id_cliente1 = $_POST['id_cliente1'];
	$id_status1 = $_POST['id_status1'];

	$sql = "update paquetes set id_tam_paquete1='$id_tam_paquete1',pes_paquete='$pes_paquete',id_cliente1='$id_cliente1',id_status1='$id_status1' where id_paquete='$id_modificar';";
	mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>