<section class="d-flex pb-5 gap-3 flex-column align-items-center mt-3">
  <div class="d-flex justify-content-start px-5" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Registrarse</li>
      </ol>
    </nav>
  </div>
  <h1 class="display-3 fw-bold mt-2 mt-lg-4">Crear cuenta</h1>
  <form method="post" action="<?php echo base_url('registrar') ?>" class="container-input">
    <label for="name">Nombre:</label>
    <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre:"
      value="<?php echo set_value('nombre') ?>">
    <?php if (isset($validaciones) && $validaciones->hasError('nombre'))
      echo $validaciones->getError('nombre') ?>
      <label for="username">Apellido:</label>
      <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido:"
        value="<?php echo set_value('apellido') ?>" required>
    <?php if (isset($validaciones) && $validaciones->hasError('apellido'))
      echo $validaciones->getError('apellido') ?>
      <label for="direccion">Direccion:</label>
      <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección:"
        value="<?php echo set_value('direccion') ?>">
    <?php if (isset($validaciones))
      echo $validaciones->getError('direccion') ?>
      <label for="email">Correo electronico:</label>
      <input type="text" id="email" name="email" placeholder="Ingrese su correo electronico"
        value="<?php echo set_value('email') ?>" required>
    <?php if (isset($validaciones) && $validaciones->hasError('email'))
      echo $validaciones->getError('email') ?>
      <label for="contraseña">Contraseña:</label>
      <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su contraseña" required>
    <?php if (isset($validaciones) && $validaciones->hasError('contraseña')) {
      echo $validaciones->getError('contraseña');
    }
    ?>
    <label for="c-contraseña">Confirmar Contraseña:</label>
    <input type="password" id="c-contraseña" name="c-contraseña" placeholder="Confirmar contraseña" required>
    <?php if (isset($validaciones) && $validaciones->hasError('c-contraseña')) {
      echo $validaciones->getError('c-contraseña');
    }
    ?>
    <button type="submit">Crear cuenta</button>
    <a class="text-center fs-5 fw-bold" href="<?php echo base_url('/login') ?>">¿Ya tenés una cuenta?</a>
  </form>
</section>