<section class="d-flex pb-5 gap-3 flex-column align-items-center mt-3">
  <div class="d-flex justify-content-start px-5" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inicio sesion</li>
      </ol>
    </nav>
  </div>
  <form method="post" action="<?php echo base_url('login') ?>">
    <h1 class="display-3 fw-bold mt-2 mt-lg-4">Iniciar sesión</h1>
    <div class="container-input">
      <label for="email">Correo electronico:</label>
      <input type="text" id="email" name="email" placeholder="Ingresá tu correo electronico">
      <?php if (isset($validaciones) && $validaciones->hasError('email'))
        echo $validaciones->getError('email') ?>
        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Contraseña">
      <?php if (isset($validaciones) && $validaciones->hasError('contraseña'))
        echo $validaciones->getError('contraseña') ?>
        <button type="submit">Iniciar sesión</button>
      </div>
      <div class="login-cuenta">
        <p>¿No tenés una cuenta?</p>
        <a href="<?php echo base_url('/registro') ?>">REGISTRARSE</a>
    </div>
  </form>
</section>