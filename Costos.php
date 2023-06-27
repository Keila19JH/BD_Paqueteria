<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Costos Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo">Costos Envios</h1>
        <form name = "costos" method = "post" action = " ">
            <div>
                ID_COSTO
                <input type = "int" name= "id_costo">
            </div>
            <br>
                 ID_Paquete
                <input type = "int" name= "id_paquete2">
            </div>
            <br>
            
            <div>
                Precio del paquete  
                <input type = "text" name= "precio">
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
	$id_costo = $_POST['id_costo'];
	$id_paquete = $_POST['id_paquete2'];
	$precio_paquete = $_POST['precio'];
	$sql = "insert into costos values ('$id_costo', '$id_paquete', '$precio_paquete');";
	
	
	echo"$id_costo";
	echo"<br>";
	echo"$id_paquete";
	echo"<br>";
	echo"$precio_paquete";
	echo"<br>";
	
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_costo'];
	$sql = "delete from costos where id_costo=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_costo']); 
            //$nombre = trim($_POST['nom_cliente']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_costo, id_paquete2, precio FROM costos WHERE costos.id_costo = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Costo: " . $fila['id_costo'] . '<br>';
                        echo "Paquete: " . $fila['id_paquete2'] . '<br>';
                        echo "Precio: " . $fila['precio'] . '<br>';
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
        $id_modificar = $_POST['id_costo'];
        
        $id_paquete = $_POST['id_paquete2'];
        $precio_paquete = $_POST['precio'];
        
        $sql = "update costos set id_paquete2='$id_paquete',precio='$precio_paquete' where id_costo='$id_modificar';";
        mysqli_query($conexion,$sql);
        }

	?>

</body>
</html>