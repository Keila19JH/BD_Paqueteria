<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tamaños Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo">Tamaño Paquetes</h1>

        <form name = "tamaños" method = "post" action = " ">
            <div>
                ID_Tamaño Paquetes
                <input type = "int" name= "id_tam_paquete">
            </div>
            <br>
            
            <div>
                Tamaño Paquetes
                <input type = "int" name= "tamaño">
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
	$id_tamPaquete = $_POST['id_tam_paquete'];
	$tamañoPaquete = $_POST['tamaño'];
	$sql = "insert into tamaños values ('$id_tamPaquete', '$tamañoPaquete');";
	
	
	echo"$id_tamPaquete";
	echo"<br>";
	echo"$tamañoPaquete";
	echo"<br>";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_tam_paquete'];
	$sql = "DELETE FROM tamaños WHERE id_tam_paquete = $id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
    if(isset($_POST['consultar'])){
        $id_mod = trim($_POST['id_tam_paquete']); 
        //$nombre = trim($_POST['nom_cliente']); 
    
        $cnx=mysqli_connect("localhost","root","","paquetes"); 
    
        // Utiliza consultas preparadas para evitar la inyección de SQL
        //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
        $query2 = "SELECT id_tam_paquete, tamaño FROM tamaños WHERE tamaños.id_tam_paquete = ?";
        $stmt = mysqli_prepare($cnx, $query2);
        mysqli_stmt_bind_param($stmt, 's', $id_mod);
        mysqli_stmt_execute($stmt);
    
        $resultado = mysqli_stmt_get_result($stmt);
        if($resultado){
            if(mysqli_num_rows($resultado) > 0){
                // Imprime los atributos
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "ID_TAMAÑO: " . $fila['id_tam_paquete'] . '<br>';
                    echo "Tamaño paquete: " . $fila['tamaño'] . '<br>';
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

	
	if (isset($_POST['modificar'])) {
        $id_modificar = $_POST['id_tam_paquete'];
        $tamañoPaquete = $_POST['tamaño'];
        $sql = "UPDATE tamaños SET tamaño = '$tamañoPaquete' WHERE id_tam_paquete = '$id_modificar';";
        mysqli_query($conexion, $sql);
    }
    
    

	?>

</body>
</html>