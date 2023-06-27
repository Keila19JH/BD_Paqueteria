<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Direcciones Formulario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>

<div><a href="index.php">Regresar</a></div>
    <center>
        <h1 class="titulo"> Direcciones </h1>
        <form name = "direccion" method = "post" action = " ">
            <div>
                ID_Direccion:
                <input type = "int" name= "id_direccion">
            </div>
            <br>
            <div>
                Calle: 
                <input type = "text" name= "calle">
            </div>
            <br>
            <div>
                Lote
                <input type = "text" name= "lote">
            </div>
            <br>
            <div>
                Manzana
                <input type = "text" name= "manzana">
            </div>
            <br>
            <div>
                 ID_Municipio : 
                <input type = "int" name= "id_municipio1">
            </div>
            <br>
            <div>
                 ID_Codigo Postal : 
                <input type = "int" name= "id_cod_postal1">
            </div>
            <br>
            <div>
                 ID_Estado : 
                <input type = "int" name= "id_estado1">
            </div>
            <br>
            <div>
                 ID_Colonia : 
                <input type = "int" name= "id_colonia1">
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
	$id_direccion = $_POST['id_direccion'];
	$calle = $_POST['calle'];
	$lote = $_POST['lote'];
	$manzana = $_POST['manzana'];
	$id_municipio1 = $_POST['id_municipio1'];
	$id_cod_postal1 = $_POST['id_cod_postal1'];	
	$id_estado1 = $_POST['id_estado1'];
    $id_colonia1 = $_POST['id_colonia1'];
	$sql = "insert into direccion values ('$id_direccion', '$calle', '$lote', '$manzana', '$id_municipio1', '$id_cod_postal1', '$id_estado1', '$id_colonia1');";
	
	
	echo"$id_direccion";
	echo"<br>";
	echo"$calle";
	echo"<br>";
	echo"$lote";
	echo"<br>";
	echo"$manzana";
	echo"<br>";
	echo"$id_municipio1";
	echo"<br>";
	echo"$id_cod_postal1";
	echo"<br>";
	echo"$id_estado1";
    echo"<br>";
	echo"$id_colonia1";
	
	mysqli_query($conexion,$sql);

	}

	if((isset($_POST['eliminar']))==true)
	{
	$id_eliminar = $_POST['id_direccion'];
	$sql = "delete from direccion where id_direccion=$id_eliminar;";
	mysqli_query($conexion,$sql);
	}

	
	    if(isset($_POST['consultar'])){
            $id_mod = trim($_POST['id_direccion']); 
            //$nombre = trim($_POST['nom_cliente']); 
        
            $cnx=mysqli_connect("localhost","root","","paquetes"); 
        
            // Utiliza consultas preparadas para evitar la inyección de SQL
            //$query2 = "SELECT id_cliente, nom_cliente,a_paterno,a_materno,id_direccion1,telef_cel,correo_elec FROM clientes WHERE clientes.id_cliente = ? OR clientes.nom_cliente = ?";
            $query2 = "SELECT id_direccion, calle, lote, manzana, id_municipio1, id_cod_postal1, id_estado1, id_colonia1 FROM direccion WHERE direccion.id_direccion = ?";
            $stmt = mysqli_prepare($cnx, $query2);
            mysqli_stmt_bind_param($stmt, 's', $id_mod);
            mysqli_stmt_execute($stmt);
        
            $resultado = mysqli_stmt_get_result($stmt);
            if($resultado){
                if(mysqli_num_rows($resultado) > 0){
                    // Imprime los atributos
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "ID Dirección: " . $fila['id_direccion'] . '<br>';
                        echo "Calle: " . $fila['calle'] . '<br>';
                        echo "Lote: " . $fila['lote'] . '<br>';
                        echo "Manzana: " . $fila['manzana'] . '<br>';
                        echo "ID_Municipio: " . $fila['id_municipio1'] . '<br>';
                        echo "ID_Codigo Postal: " . $fila['id_cod_postal1'] . '<br>';
                        echo "ID_Estado: " . $fila['id_estado1'] . '<br>';
                        echo "ID_Colonia: " . $fila['id_colonia1'] . '<br>';
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
	$id_modificar = $_POST['id_direccion'];

    $calle = $_POST['calle'];
	$lote = $_POST['lote'];
	$manzana = $_POST['manzana'];
	$id_municipio1 = $_POST['id_municipio1'];
	$id_cod_postal1 = $_POST['id_cod_postal1'];	
	$id_estado1 = $_POST['id_estado1'];
    $id_colonia1 = $_POST['id_colonia1'];


	$sql = "update direccion set calle='$calle',lote='$lote',manzana='$manzana',id_municipio1='$id_municipio1', id_cod_postal1='$id_cod_postal1',id_estado1='$id_estado1',id_colonia1='$id_colonia1' where id_direccion='$id_modificar';";
	mysqli_query($conexion,$sql);
	}

	?>

</body>
</html>