<!DOCTYPE html>
<html>
<head>
<title>Inicio Formulario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="container">
    <h1 class="title" >¡Bienvenido a DHL!</h1>
    <h3 class="title" >¿Qué opcion deseas elegir?</h3>
    <table class="table  " ,border="0", style="background-color: transparent;">
    <tbody>
        <tr>
        <td>
        <div class="card text-center">
        <img class="card-img-top" src="images/status.jpg" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title">Status Clientes</h5>
            <p class="card-text">Revisa si el paquete ya fue entregado o sigue pendiente.</p>
            <a href="Status_Clientes.php" class="btn btn-primary">Entrar</a>
        </div>
        </div>
    </td>
    <td>
            <div class="card text-center">
            <img class="card-img-top" src="images/CP.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Códigos Postales</h5>
                <p class="card-text">Guarda, Elimina, Consulta o Modifica nuevas colonias. nuevos códigos postales.</p>
                <a href="Cod_Postal.php" class="btn btn-primary">Entrar</a>
            </div>
            </div>
        </td>
        <td>
            <div class="card text-center">
            <img class="card-img-top" src="images/colonia.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Colonias</h5>
                <p class="card-text">Guarda, Elimina, Consulta o Modifica nuevas colonias.</p>
                <a href="Colonias.php" class="btn btn-primary">Entrar</a>
            </div>
            </div>
        </td>
        </tr>
        <tr>
        <td>
            <div class="card text-center">
                <img class="card-img-top" src="images/estados.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Estados</h5>
                <p class="card-text">Guarda, Elimina, Consulta o Modifica nuevos Estados.</p>
                <a href="Estados.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </td>
        <td>
            <div class="card text-center">
                <img class="card-img-top" src="images/municipio.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Municipios</h5>
                <p class="card-text">Guarda, Elimina, Consulta o Modifica nuevos Municipios.</p>
                <a href="Municipios.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </td>
        <td>
            <div class="card text-center">
                <img class="card-img-top" src="images/trasporte.jpeg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Transportes Paquetes</h5>
                <p class="card-text">Lleva un control de los transportes que se encargan de trasladar la mercancía.</p>
                <a href="Transportes.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </td>
        </tr>
        <tr>
        <td>
            <div class="card text-center">
                <img class="card-img-top" src="images/tamano.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Tamaño del paquete </h5>
                <p class="card-text">Asigna el peso que posea el paquete.</p>
                <a href="Tamaños.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </td>
        <td>
            <div class="card text-center">
                <img class="card-img-top" src="images/costos.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Costos</h5>
                <p class="card-text">Asigna el precio que tendrá el paquete.</p>
                <a href="Costos.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </td>
        <td>
            <div class="card text-center">
                <img class="card-img-top" src="images/rutas.jpg" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">Rutas</h5>
                <p class="card-text">Registra a que Zona del País se dirige el paquete.</p>
                <a href="Rutas.php" class="btn btn-primary">Entrar</a>
                </div>
            </div>
        </td>
        </tr>
        <tr>
            <td>
            <div class="card text-center">
                    <img class="card-img-top" src="images/direccion.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Direcciones</h5>
                    <p class="card-text"> Guarda, Elimina, Consulta o Modifica las direcciones a donde se dirigen los paquetes. </p>
                    <a href="Direcciones.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </td>
            <td>
            <div class="card text-center">
                    <img class="card-img-top" src="images/clientes.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="card-text">Guarda, Elimina, Consulta o Modifica datos persoales de tus clientes.</p>
                    <a href="Clientes.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </td>
            <td>
            <div class="card text-center">
                    <img class="card-img-top" src="images/paquete.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Paquetes</h5>
                    <p class="card-text">Guarda, Elimina, Consulta o Modifica los datos de diferentes paquetes.</p>
                    <a href="Paquetes.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
            <div class="card text-center">
                    <img class="card-img-top" src="images/envios.jpg" alt="Card image cap">
                    <div class="card-body">
                    <h5 class="card-title">Envíos</h5>
                    <p class="card-text">Guarda, Elimina, Consulta o Modifica los datos de diferentes envioss.</p>
                    <a href="Envios.php" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </td>
        </tr>

    </tbody>
    </table>
</div>
</body>
</html>
