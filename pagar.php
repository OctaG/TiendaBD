<?php
  include('login.php');
  $CarritoActual = $_SESSION['carrito_actual'];
  $no_cliente = $_SESSION['user_num'];

  $update_query = mysqli_query($enlace, "UPDATE CARRITO
  SET `Comprado` = 1 WHERE carrito.No_carrito = $CarritoActual");

  $insert_query = mysqli_query($enlace, "INSERT INTO CARRITO (`No_cliente`, `Total`, `Fecha_hora`, `Comprado`)
  VALUES ($no_cliente, 0.0, '2019-05-05 14:02:20', 0);");

  $query = mysqli_query($enlace, "select No_carrito from CARRITO inner join CLIENTE on (CARRITO.No_cliente = CLIENTE.No_cliente) order by no_carrito desc limit 1");
  while($row = mysqli_fetch_assoc($query)){
    $_SESSION['carrito_actual'] = $row['No_carrito'];
  }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Articulo</title>
      <?php
        echo "<meta http-equiv = 'refresh' content = '1; url = index.php'/>";
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
         <h3>Gracias por la compra</h3>
       </div>
     </div>
   </body>
</html>
