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
    <form method="post" action="<?php echo base_url('insertar') ?>">
      <div class="container-input">
        <label for="name">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresá tu nombre:">
        <?php if (isset($validaciones) && $validaciones->hasError('nombre'))
          echo $validaciones->getError('nombre') ?>
          <label for="apellido">Apellido:</label>
          <input type="text" id="apellido" name="apellido" placeholder="Ingresá tu apellido:">
        <?php if (isset($validaciones) && $validaciones->hasError('apellido'))
          echo $validaciones->getError('apellido') ?>
          <label for="email">Correo electronico:</label>
          <input type="text" id="email" name="email" placeholder="Ingresá tu correo electronico">
        <?php if (isset($validaciones) && $validaciones->hasError('email'))
          echo $validaciones->getError('email') ?>
          <label for="consulta">Consulta</label>
          <textarea name="consulta" id="consulta" placeholder="Consulta"></textarea>
        <?php if (isset($validaciones) && $validaciones->hasError('consulta'))
          echo $validaciones->getError('consulta') ?>
          <div>
            <button type="summit">Enviar</button>
          </div>
        </div>
      </form>
  </section>