<section class="d-flex pb-5 gap-3 flex-column align-items-center">
  <div class="d-flex justify-content-start px-5" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Inicio sesion</li>
      </ol>
    </nav>
  </div>
  <h1 class="display-3 fw-bold mt-2 mt-lg-4">Iniciar sesión</h1>
  <div class="login-input">
    <label for="email">Correo electronico:</label>
    <input type="text" id="email" name="email" placeholder="Ingresá tu correo electronico">
    <label for="password">Contraseña:</label>
    <input type="text" id="password" name="password" placeholder="Contraseña">
    <button type="button">Iniciar sesión</button>
  </div>
  <div class="login-cuenta">
    <p>¿No tenés una cuenta?</p>
    <a href="<?php echo base_url('/registro') ?>">REGISTRARSE</a>
  </div>
</section>