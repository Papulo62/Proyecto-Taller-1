<section class="container-xl d-flex flex-column gap-4 p-4">
  <div class="d-flex justify-content-start" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Información de contacto</li>
      </ol>
    </nav>
  </div>
  <h1 class="text-center fw-bold display-4 mt-4 mb-5">Información de contacto</h1>
  <h2 class="fw-bold">Titular de la empresa: Gustavo Florentino Pérez</h2>
  <h2 class="fw-bold">Razón social: Sprint Store S.A.S.</h2>
  <h2 class="fw-bold">Domilicio legal: Juan Ramón Vidal 1676</h2>
  <h2 class="fw-bold">Telefonos: 3782-474653, 3782-411030</h2>
  <div class="d-flex flex-column mt-3 gap-3 align-items-center">
    <h2 class="fw-bold mt-4 mb-4 display-6">Comunicate con nosotros</h2>
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
  </div>
</section>