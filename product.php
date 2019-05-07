<?php
  include('login.php');
  //Conectarse a la base de datos
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  //Mandar un query para obtener los últimos artículos
  $id_producto = $_GET['id'];
  $resultado_query =  mysqli_query($enlace, "select * from Producto where id_producto = '$id_producto'");

  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $nombre = $row['Nombre'];
      $precio = $row['Precio'];
      $imagen = $row['Imagen'];
      $descripcion = $row['Descripcion'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $nombre ?></title>
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

  <!-- Esta sección es el header del producto -->
  <?php include_once 'templates/jumbotron.php'; ?>


  <div class="row col-sm-offset-2">
    <div class="col-md-5">
      <img src="img/<?php echo $imagen ?>.jpeg" alt="<?php echo $nombre ?>" width="400" height="400" class="img-rounded"/>
    </div>
    <div class="col-md-5">
      <h2><?php echo $nombre ?></h2>
      <h4><?php echo $descripcion ?></h4>
      <br>
      <h3>$<?php echo $precio ?></h3>
      <br>
      <form action="comprar_producto.php" method="post">
        <div class="form-group">
          <input type="hidden" name="id" value=<?php echo $id_producto ?>>
          <label for="cantidadControlSelect">Cantidad</label>
            <select class="form-control" name="cantidad">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
            </select>
        </div>
        <button type='submit' class='btn'>Agregar a mi carrito</button>
      </form>
      <br>
    </div>
  </div>

</body>
</html>
