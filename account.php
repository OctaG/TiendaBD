<?php
  include('login.php');
  $user_num = $_SESSION['user_num'];

  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  $resultado_query =  mysqli_query($enlace, "select * from cliente where No_cliente = $user_num");

  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $nombre= $row['Nombre'];
      $apellido = $row['Apellido'];
      $telefono = $row['Telefono'];
      $no_tarjeta = $row['No_tarjeta'];
      $fecha_vencimiento = $row['Fecha_vencimiento'];
      $calle = $row['Calle'];
      $colonia = $row['Calle'];
      $codigo_postal = $row['Calle'];
      $municipio = $row['Municipio'];
      $estado = $row['Estado'];
      $mail = $row['Mail'];
      $usuario = $row['Usuario'];

      $datos_personales =
      '
        '. $nombre . ' '. $apellido . '
        <br>
        <br>
        Usuario: '. $usuario . '
        <br>
        <br>
        Mail: '. $mail . '
        <br>
        <br>
        Teléfono: '. $telefono. '
        <br>
        <br>
      ';

      $datos_tajeta =
      '
        Número: '. $no_tarjeta. '
        <br>
        <br>
        Fecha de vencimiento: '. $fecha_vencimiento . '
        <br>
        <br>
      ';

      $datos_domicilio =
      '
        Calle: '. $calle. '
        <br>
        <br>
        Colonia: '. $colonia . '
        <br>
        <br>
        Municipio: '. $municipio . '
        <br>
        <br>
        Estado: '. $estado . '
        <br>
        <br>
        Código postal: '. $codigo_postal . '
      ';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bootstrap Theme Company</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <body>
    <!-- Esta sección es la barra de navegación -->
    <?php include_once 'templates/navbar.php'; ?>

    <!-- Esta sección es el header -->
    <?php include_once 'templates/jumbotron.php'; ?>


    <div class="row col-sm-offset-1">
      <h2><strong>Información de mi cuenta</strong></h2>
      <div class="col-sm-4">
        <h3>Datos Personales</h3>
        <br>
        <h5><?php echo $datos_personales; ?></h5>
      </div>

      <div class="col-sm-4">
        <h3>Datos de mi tarjeta</h3>
        <br>
        <h5><?php echo $datos_domicilio; ?></h5>
      </div>

      <div class="col-sm-4">
        <h3>Mi dirección</h3>
        <br>
        <h5><?php echo $datos_tajeta; ?></h5>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="row col-sm-offset-1">
      <div class="col">
        <?php
          echo "<a href='eliminar_cuenta.php'><button type='submit' class='btn'>Eliminar mi cuenta</button></a>";
        ?>
      </div>
    </div>

  </body>
</html>
