<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Rutas Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo"> Rutas de Envío </h1>
        <form name = "costos" method = "post" action = " ">
            <div>
                ID_Ruta
                <input type = "int" name= "id_ruta">
            </div>
            <br>
                 ID_Codigo Postal
                <input type = "int" name= "id_cod_postal2">
            </div>
            <br>
            
            <div>
                Zona de Envio  
                <input type = "text" name= "zona">
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
	$id_ruta = $_POST['id_ruta'];
	$id_CodigoPostal = $_POST['id_cod_postal2'];
	$zonaEnvio = $_POST['zona'];
	$sql = "insert into ruta values ('$id_ruta', '$id_CodigoPostal', '$zonaEnvio');";
	
	
	echo"$id_ruta";
	echo"<br>";
	echo"$id_CodigoPostal";
	echo"<br>";
	echo"$zonaEnvio";
	echo"<br>";
	
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_ruta'];
	$sql = "delete from ruta where id_ruta=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_ruta']); 
            //$nombre = trim($_POST['nom_cliente']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_ruta, id_cod_postal2, zona FROM ruta WHERE ruta.id_ruta = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Ruta: " . $fila['id_ruta'] . '<br>';
                        echo "ID_Codigo Postal: " . $fila['id_cod_postal2'] . '<br>';
                        echo "Zona: " . $fila['zona'] . '<br>';
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
        $id_modificar = $_POST['id_ruta'];
        
        $id_CodigoPostal = $_POST['id_cod_postal2'];
        $zonaEnvio = $_POST['zona'];
        
        $sql = "update ruta set id_cod_postal2='$id_CodigoPostal',zona='$zonaEnvio' where id_ruta='$id_modificar';";
        mysqli_query($conexion,$sql);
        }

	?>

</body>
</html>