<?php
  include('login.php');
?>

<!-- Esta sección es la barra de navegación -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/Tienda/index.php"><i class="material-icons md-48">home</i></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="category.php?categoria=Hombre">HOMBRE</a></li>
        <li><a href="category.php?categoria=Mujer">MUJER</a></li>
        <li><a href="category.php?categoria=Niño">NIÑOS</a></li>
        <?php if(isset($_SESSION['username'])): ?>
          <li><a href="account.php">MI CUENTA</a></li>
          <li><a href="cart.php">CARRITO</a></li>
          <li><a href="log_out.php">SALIR</a></li>
        <?php else: ?>
          <li><a href="login.html">ENTRAR</a></li>
        <?php  endif ?>
      </ul>
    </div>
  </div>
</nav>
