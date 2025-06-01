<section class="d-flex flex-column gap-3 align-items-center mt-4">
  <div class="d-flex justify-content-start px-3" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Consultas</li>
      </ol>
    </nav>
  </div>
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>¡Éxito!</strong> <?= session()->getFlashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>¡Error!</strong> <?= session()->getFlashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  <?php endif; ?>
  <h1 class="text-center fw-bold display-4 mt-4">Consultas</h1>
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