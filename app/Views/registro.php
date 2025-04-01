<section class="d-flex pb-5 gap-3 flex-column align-items-center">
  <h1 class="display-3 fw-bold mt-2 mt-lg-4">Crear cuenta</h1>
  <div class="login-input">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" placeholder="Ingresá tu nombre:">
    <label for="username">Apellido:</label>
    <input type="text" id="username" name="username" placeholder="Ingresá tu apellido:">
    <label for="email">Correo electronico:</label>
    <input type="text" id="email" name="email" placeholder="Ingresá tu correo electronico">
    <label for="password">Contraseña:</label>
    <input type="text" id="password" name="password" placeholder="Contraseña">
    <button type="button">Crear cuenta</button>
    <a class="text-center fs-5 fw-bold" href="<?php echo base_url('/login') ?>">¿Ya tenés una cuenta?</a>
  </div>
</section>