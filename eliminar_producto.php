<?php

  include('login.php');
  header('Location: cart.php');
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");
  $id = $_GET['id'];
  $CarritoActual = $_SESSION['carrito_actual'];

  $resultado_query = mysqli_query($enlace, "SELECT Cantidad from CARRITO inner join PRODUCTOENCARRITO on (carrito.No_carrito = CARRITO_No_carrito)
  WHERE CARRITO_No_carrito = $CarritoActual and PRODUCTO_id_producto=$id");

  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $cantidadComprada = $row['Cantidad'];
    }

  $resultado_query = mysqli_query($enlace, "SELECT Cantidad_disponible from PRODUCTO
  WHERE id_producto = $id");

  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $cantidadDisponible = $row['Cantidad_disponible'];
    }

  mysqli_query($enlace, "UPDATE PRODUCTO
  SET `Cantidad_disponible` = $cant_disponible + $cantidadComprada WHERE PRODUCTO.id_producto = $id");

  mysqli_query($enlace, "DELETE FROM PRODUCTOENCARRITO
  WHERE PRODUCTOENCARRITO.PRODUCTO_id_producto = $id and PRODUCTOENCARRITO.CARRITO_No_carrito = $CarritoActual");

  $resultado_query = mysqli_query($enlace, "select SUM(subtotal) as CantidadTotal
  from CARRITO inner join productoencarrito
  on (carrito.No_carrito = CARRITO_No_carrito)
  where carrito.No_carrito = '$CarritoActual'
  group by CARRITO_No_carrito");

  while($row = mysqli_fetch_assoc($resultado_query))
    {
      $total = $row['CantidadTotal'];
    }

  mysqli_query($enlace, "UPDATE CARRITO
  SET `Total` = $total WHERE carrito.No_carrito = $CarritoActual");
?>
