<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Clientes Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div class="container mt-3">
    <a href="index.php" class="btn btn-outline-danger">Regresar</a>
</div>

    <center>
        <h1 class="titulo">Clientes</h1>
        <form name = "clientes" method = "post" action = " ">
            <div>
                ID_Cliente:
                <input type = "int" name= "id_cliente">
            </div>
            <br>
            <div>
                Nombre del cliente: 
                <input type = "text" name= "nom_cliente">
            </div>
            <br>
            <div>
                Apellido Paterno:
                <input type = "text" name= "a_paterno">
            </div>
            <br>
            <div>
                Apellido Materno: 
                <input type = "text" name= "a_materno">
            </div>
            <br>
            <div>
                 ID_Direccion : 
                <input type = "int" name= "id_direccion1">
            </div>
            <br>
            
            <div>
                Teléfono celular: 
                <input type = "text" name= "telef_cel">
            </div>
            <br>
            <div>
                Correo electrónico: 
                <input type = "int" name= "correo_elec">
            <br>
            <br>
            <div class="container mt-3">
    <form name="clientes" method="post" action="">
        <!-- Resto del formulario -->
        
        <div class="container mt-3">
    <form name="clientes" method="post" action="">
        <!-- Resto del formulario -->
        
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
	$id_cliente = $_POST['id_cliente'];
	$nom_cliente = $_POST['nom_cliente'];
	$a_paterno = $_POST['a_paterno'];
	$a_materno = $_POST['a_materno'];
	$id_direccion1 = $_POST['id_direccion1'];
	$telef_cel = $_POST['telef_cel'];	
	$correo_elec = $_POST['correo_elec'];
	$sql = "insert into clientes values ('$id_cliente', '$nom_cliente', '$a_paterno', '$a_materno', '$id_direccion1', '$telef_cel', '$correo_elec');";
	
	
	echo"$id_cliente";
	echo"<br>";
	echo"$nom_cliente";
	echo"<br>";
	echo"$a_paterno";
	echo"<br>";
	echo"$a_materno";
	echo"<br>";
	echo"$id_direccion1";
	echo"<br>";
	echo"$telef_cel";
	echo"<br>";
	echo"$correo_elec";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_cliente'];
	$sql = "delete from clientes where id_cliente=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_cliente']); 
            //$nombre = trim($_POST['nom_cliente']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Cliente: " . $fila['id_cliente'] . '<br>';
                        echo "Nombre Cliente: " . $fila['nom_cliente'] . '<br>';
                        echo "Apellido Paterno: " . $fila['a_paterno'] . '<br>';
                        echo "Apellido Materno: " . $fila['a_materno'] . '<br>';
                        echo "Direccion: " . $fila['id_direccion1'] . '<br>';
                        echo "Celular Móvil: " . $fila['telef_cel'] . '<br>';
                        echo "Correo: " . $fila['correo_elec'] . '<br>';
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
	$id_modificar = $_POST['id_cliente'];
	
	$nom_cliente = $_POST['nom_cliente'];
	$a_paterno = $_POST['a_paterno'];
	$a_materno = $_POST['a_materno'];
	$id_direccion1 = $_POST['id_direccion1'];
	$telef_cel = $_POST['telef_cel'];	
	$correo_elec = $_POST['correo_elec'];
	
	$sql = "update clientes set nom_cliente='$nom_cliente',a_paterno='$a_paterno',a_materno='$a_materno',id_direccion1='$id_direccion1',telef_cel='$telef_cel',correo_elec='$correo_elec' where id_cliente='$id_modificar';";
	mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>