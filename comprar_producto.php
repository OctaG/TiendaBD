<?php
  include('login.php');
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");
  $id = $_POST['id'];
  $cantidad = $_POST['cantidad'];
  $seAgrego = '';
  $user_n = $_SESSION['user_num'];
  $CarritoActual = $_SESSION['carrito_actual'];


  $resultado_query_T = mysqli_query($enlace, "select Cantidad_disponible
  from PRODUCTO where id_producto = $id");
  while($row = mysqli_fetch_assoc($resultado_query_T))
    {
      $cant_disponible = $row['Cantidad_disponible'];
    }

  if(isset($_SESSION['username'])){
    if($cant_disponible>=$cantidad){
      $insert_query = mysqli_query($enlace, "INSERT INTO PRODUCTOENCARRITO (`PRODUCTO_id_producto`, `CARRITO_No_carrito`, `Cantidad`, `Subtotal`)
      VALUES ($id, $CarritoActual, $cantidad, '400');");

      $resultado_query_T = mysqli_query($enlace, "select SUM(subtotal) as CantidadTotal
      from CARRITO inner join productoencarrito
      on (carrito.No_carrito = CARRITO_No_carrito)
      where carrito.No_carrito = '$CarritoActual'
      group by CARRITO_No_carrito");

      while($row = mysqli_fetch_assoc($resultado_query_T))
        {
          $total = $row['CantidadTotal'];
        }

      mysqli_query($enlace, "UPDATE CARRITO
      SET `Total` = $total WHERE carrito.No_carrito = $CarritoActual");


    if($insert_query){
	     $seAgrego = "El producto se ha agregado con exito a tu carrito";
       mysqli_query($enlace, "UPDATE PRODUCTO
       SET `Cantidad_disponible` = $cant_disponible - $cantidad WHERE PRODUCTO.id_producto = $id");
    }
    else{
	     $seAgrego = "Este artículo ya existe en tu carrito";

     }
   }
   else{
     $seAgrego = "No hay productos suficientes, por favor elige menos";
   }
  }
  else{
    $seAgrego = "Inicia sesión para comprar";
  }

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Articulo</title>
      <?php
        echo "<meta http-equiv = 'refresh' content = '1; url = product.php?id=$id'/>";
      ?>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="css/style.css" type="text/css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <style>

        h3{
          color: white;
        }

        .bg-orange{
          background-color: #f4511e;
        }
        .container {
          height: 700px;
          position: relative;
        }

        .center {
          margin: 0;
          position: absolute;
          top: 50%;
          left: 50%;
          -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
        }
      </style>
   </head>
   <body class="bg-orange">
     <div class="container">
       <div class="center">
         <h3><?php echo $seAgrego;?></h3>
       </div>
     </div>
   </body>
</html>
