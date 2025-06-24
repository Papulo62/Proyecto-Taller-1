<section class="container-xl d-flex flex-column">
  <h1 class="fw-bold mt-5 mb-5">Detalles de la cuenta</h1>
  <div class="d-flex flex-column">
    <div class="d-flex justify-content-between">
      <h2 class="fw-bold">Mi perfil</h2>
      <button class="btn-base">Editar</button>
    </div>
    <p>Nombre: <?php echo $usuario['nombre'] ?></p>
    <p>Apellido: <?php echo $usuario['apellido'] ?></p>
    <p>Direccion: <?php echo $usuario['direccion'] ?></p>
    <p>Correo: <?php echo $usuario['email'] ?></p>
    <div class="d-flex flex-column">
      <div class="d-flex justify-content-between">
        <h2 class="fw-bold">Contraseña</h2>
        <button class="btn-base" type="button">Editar</button>
      </div>
      <p>Contraseña:</p>
    </div>
  </div>
</section>