<?php
  include('login.php');
  $user_name = $_SESSION['username'];
  $CarritoActual = $_SESSION['carrito_actual'];

  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  $resultado_query =  mysqli_query($enlace, "select producto.nombre, producto.precio, Cantidad, Subtotal, id_producto, Total
  from cliente inner join carrito on (carrito.No_cliente=cliente.No_cliente)
  inner join productoencarrito on (CARRITO_No_carrito=No_carrito)
  inner join producto on (PRODUCTO_id_producto=id_producto)
  where Usuario='$user_name' and No_carrito='$CarritoActual'");

  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $id_producto= $row['id_producto'];
      $nombre= $row['nombre'];
      $precio = $row['precio'];
      $cantidad = $row['Cantidad'];
      $sub_total = $row['Subtotal'];
      $total = $row['Total'];

      $lastProducts .=
      '<div class=text-center>
        <div class="col-sm-4">
          <a href="product.php?id=' . $id_producto . '"><img src="img/' . $nombre . '.jpeg" alt="' . $nombre . '" width="150" height="150" border="1" /></a>
          </br>
          '. $nombre . '
          <br>
          Precio: $ '. $precio . '
          <br>
          Cantidad: '. $cantidad . '
          <br>
          <br>
          Subtotal: $'. $sub_total . '
          <br>
          <br>
          <a href="eliminar_producto.php?id=' . $id_producto . '">Eliminar</a>
          <br>
          <br>
          <br>
        </div>
       <div>
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
    <div class="row">
      <?php echo $lastProducts; ?>
    <div>
    <div class="text-center">
      <h3>Total: $<?php echo $total; ?></h3>
      <form action="pagar.php" method="post">
        <button type='submit' class='btn'>Pagar ahora</button>
      </form>
    <div>
    <br>
    <br>
    <br>
  </body>
</html>
