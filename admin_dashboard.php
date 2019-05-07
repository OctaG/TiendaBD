<?php
  include('login.php');
  //Conectarse a la base de datos
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  //Mandar un query para obtener los últimos artículos
  $allProducts = "";
  $resultado_query =  mysqli_query($enlace, "select * from Producto order by id_producto");
  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $id_producto = $row['id_producto'];
      $nombre = $row['Nombre'];
      $precio = $row['Precio'];
      $imagen = $row['Imagen'];
      $allProducts .=
      '<div class=text-center>
        <div class="col-sm-4">
          <img src="img/' . $imagen . '.jpeg" alt="' . $nombre . '" width="150" height="150" border="1" />
          </br>
          '. $nombre . '<br />
          <a href="">Modificar</a>
          </br>
          </br>
        </div>
       <div>
      ';
    }
    if(isset($_SESSION['username']) == False){
      header("location: index.php");
    }
?>

<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Cuestionario</title>
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
    <h2 class="text-center">Todos los artículos</h2>
    </br>
    <div class="row"><?php echo $allProducts;?></div>
  </body>
</html>
