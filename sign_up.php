<?php
  //Indicar si tienes errores, el ini_set tiene el 1 para mostrar y el 0 para no mostrar
  error_reporting(E_ALL); //DEBUG
  ini_set('display_errors',1); //DEBUG
  //Variables del insert
  $usuario = $_POST['usuario'];
  $contrasena = $_POST['contrasena'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $telefono = $_POST['telefono'];
  $mail = $_POST['mail'];
  $numero = $_POST['numero'];
  $calle = $_POST['calle'];
  $colonia = $_POST['colonia'];
  $cp = $_POST['cp'];
  $municipio = $_POST['municipio'];
  $estado = $_POST['estado'];
  $notarjeta = $_POST['notarjeta'];
  $fechavencimiento = $_POST['fechavencimiento'];
  $pin = $_POST['pin'];
  $errors=array();
  //base de datos con contraseña
  $enlace = mysqli_connect("127.0.0.1", "adminphp", "459068", "ProyectoFinal");

  //insert de datos del usuario
  $insert_query = mysqli_query($enlace, "INSERT INTO CLIENTE (`Nombre`, `Apellido`, `Contrasena`, `Telefono`, `No_tarjeta`, `Fecha_vencimiento`, `No_PIN`, `Numero_direccion`, `Calle`, `Colonia`, `Codigo_postal`, `Municipio`, `Estado`, `Mail`, `Usuario`)
  VALUES ('$nombre', '$apellido', '$contrasena', '$telefono', '$notarjeta', '$fechavencimiento',$pin, $numero, '$calle', '$colonia', $cp, '$municipio', '$estado', '$mail', '$usuario');");
  $result = "Tu cuenta se ha creado correctamente";

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Articulo</title>
      <?php
        echo "<meta http-equiv = 'refresh' content = '2; url = index.php'/>";
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
         <h3><?php echo $result ?></h3>
       </div>
     </div>
   </body>
</html>
