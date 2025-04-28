<section class="d-flex flex-column gap-3 align-items-center mt-4">
  <div class="d-flex justify-content-start px-3" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consultas</li>
      </ol>
    </nav>
  </div>
  <h1 class="text-center fw-bold display-4 mt-4">Consultas</h1>
  <div class="container-input">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" placeholder="Ingresá tu nombre:">
    <label for="username">Apellido:</label>
    <input type="text" id="username" name="username" placeholder="Ingresá tu apellido:">
    <label for="email">Correo electronico:</label>
    <input type="text" id="email" name="email" placeholder="Ingresá tu correo electronico">
    <label for="consulta">Consulta</label>
    <textarea name="consulta" id="consulta" placeholder="Consulta"></textarea>
    <div>
      <button type="button">Enviar</button>
    </div>
  </div>
</section>