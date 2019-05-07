<?php
include('login.php');
//Conectarse a la base de datos
$enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

//Mandar un query para obtener los últimos artículos
$lastProducts = "";
$resultado_query =  mysqli_query($enlace, "select * from Producto order by id_producto desc limit 6");
while($row = mysqli_fetch_assoc($resultado_query))
  {
    $id_producto = $row['id_producto'];
    $nombre = $row['Nombre'];
    $precio = $row['Precio'];
    $imagen = $row['Imagen'];
    $lastProducts .=
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

$productosHombre = "";
$resultado_query =  mysqli_query($enlace, "select * from Producto where departamento = 'Hombre' order by id_producto asc limit 3");
while($row = mysqli_fetch_assoc($resultado_query))
  {
      $id_producto = $row['id_producto'];
      $nombre = $row['Nombre'];
      $precio = $row['Precio'];
      $imagen = $row['Imagen'];
      $productosHombre .=
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
  <title></title>
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
  <h2 class="text-center">Artículos agregados recientemente</h2>
  </br>
  <div class="row"><?php echo $lastProducts;?></div>

  <h2 class="text-center">Hombres</h2>
  </br>
  <div class="row"><?php echo $productosHombre;?></div>


</body>
</html>
