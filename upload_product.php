<div class="container-fluid">
  <h1><strong>Registro</strong></h1>
  <br>
  <h2>Nuevo Producto</h2>
  <br>
  <form action="sign_up.php" method="post">
    <div class="form-group">
      <label>Nombre</label>
      <input type="text" class="form-control" name="nombre" placeholder="Playera" required="true">
    </div>
    <br>
    <div class="form-group">
      <label>Precio</label>
      <input type="number" class="form-control" name="Precio" placeholder="En pesos" required="true">
    </div>
    <br>
    <div class="form-group">
      <label>Departamento</label>
      <input type="text" class="form-control" name="Depto" placeholder="Depto" required="true">
    </div>
    <br>
    <div class="form-group">
      <label>Cantidad Disponible</label>
      <input type="number" class="form-control" name="CantidadD" placeholder="5" required="true">
    </div>
    <br>
    <div class="form-group">
      <label>Descripcion</label>
      <input type="text" class="form-control" name="Descr" placeholder="Varios" required="true">
    </div>
    <div class="form-group">
      <label>Imagen</label>
      <input type="text" class="form-control" name="Imagen" placeholder="Informativa" required="true">
    </div>
    <br><br>
    <button class="btn" type="sumbit">Enviar</button>
   </form>
  </div>
