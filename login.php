<?php
  session_start();
  $user = $_POST['user'];
  $password = $_POST['password'];

  //Conectarse a la base de datos
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  $resultado_query = mysqli_query($enlace, "select * from CLIENTE;");
  $sesion_encontrada = 0;


  while($row_asociativo = mysqli_fetch_assoc($resultado_query))
  {
      $userexistente = $row_asociativo['Usuario'];
      $contraexistente = $row_asociativo['Contrasena'];
      $no_cliente = $row_asociativo['No_cliente'];
      $tipo=$row_asociativo['TipoUsuario'];

      if(($userexistente == $user) and ($contraexistente == $password)){
        if($tipo=='Admin'){
          header("location: AdminDashBoard.php");
          $sesion_encontrada = 1;
        }
        else{
          $sesion_encontrada = 1;
          $_SESSION['username'] = $user;
          $_SESSION['user_num'] = $no_cliente;
          $insert_query1 = mysqli_query($enlace, "INSERT INTO CARRITO (`No_cliente`, `Total`, `Fecha_hora`, `Comprado`)
          VALUES ($no_cliente, 0.0, '2019-05-05 14:02:20', 0);");
          $query = mysqli_query($enlace, "select No_carrito from CARRITO inner join CLIENTE on (CARRITO.No_cliente = CLIENTE.No_cliente) order by no_carrito desc limit 1");
          while($row = mysqli_fetch_assoc($query)){
            $_SESSION['carrito_actual'] = $row['No_carrito'];
          }
          header("location: index.php");
        }

      }
  }
  if($sesion_encontrada == 0){
    if(isset($_POST['entrar'])){
      header("location: login.html");
    }
  }
?>
