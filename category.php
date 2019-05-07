<?php
  include('login.php');
  //Obtener la categoria adecuada desde el navbar
  $categoria = $_GET['categoria'];
  //Conectarse a la base de datos
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  //Mandar un query para obtener todos los artículos de esa categoria
  $productos = "";
  $resultado_query =  mysqli_query($enlace, "select * from Producto where departamento = '$categoria' order by id_producto desc");
  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $id_producto = $row['id_producto'];
      $nombre = $row['Nombre'];
      $precio = $row['Precio'];
      $imagen = $row['Imagen'];
      $productos .=
      '<div class=text-center>
        <div class="col-sm-4">
          <a href="product.php?id=' . $id_producto . '"><img src="img/' . $imagen . '.jpeg" alt="' . $nombre . '" width="150" height="150" border="1" /></a>
          </br>
          '. $nombre . '<br />
          $ '. $precio . '<br />
          <a href="product.php?id=' . $id_producto . '">Ver detalles</a>
          </br>
          </br>
        </div>
       <div>
      ';
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $categoria ?></title>
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

    <!-- Este muestra los últimos 6 productos de la BD -->

    <div class="row">
      <div class="col text-center">
        <h2><?php echo $categoria; ?></h2>
      </div>
      <br>
      <br>
      <?php echo $productos;?></div>
    </div>

  </body>
</html>
