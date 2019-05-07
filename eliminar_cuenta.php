<?php
  include('login.php');
  //header('Location: index.php');
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");
  $user_id = $_SESSION['user_num'];

  $delete_query = mysqli_query($enlace, "DELETE FROM PRODUCTOENCARRITO
  WHERE No_cliente = $user_id");

  $delete_query = mysqli_query($enlace, "DELETE FROM CLIENTE
  WHERE No_cliente = $user_id");

  if($delete_query){
	   echo "New record";
  }
  else{
	   echo "Error: ".$delete_query."<br>".mysqli_error($enlace);
   }
  //session_destroy();
  //unset($_SESSION['username']);
?>
