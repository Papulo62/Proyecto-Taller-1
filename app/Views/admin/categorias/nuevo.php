<section class="container-xl mt-5 d-flex flex-column gap-3">
  <div class="d-flex justify-content-start px-5" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/categorias') ?>">Categorias</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Categoria</li>
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

  <h1 class="fw-bold display-4 text-center"><?php echo $titulo ?></h1>
  <form method="post" action="<?php echo base_url('admin/categorias/nuevo') ?>">
    <div class="container-input">
      <label for="nombre">Nombre Categoria:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre de la Categoria" required>
    </div>
    <button class="btn-base mt-3" type="submit">Agregar</button>
  </form>
</section>