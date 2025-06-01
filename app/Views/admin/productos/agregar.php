<section class="container-xl mt-5 d-flex flex-column gap-3">
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
  <form method="post" action="<?php echo base_url('insertar') ?>">
    <div class="container-input">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" required>
    </div>
    <div class="container-input">
      <label for="descripcion">Descripcion:</label>
      <textarea name="descripcion" id="descipcion" placeholder="Descripcion" required></textarea>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="talle">Talle:</label>
      <select name="talle" id="talle">
        <option value="value1">Tarjeta de credito</option>
      </select>
    </div>
    <div class="container-input">
      <label for="precio">Precio:</label>
      <input type="text" id="precio" name="precio" placeholder="Ingrese el precio del producto" required>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="categoria">Categoria:</label>
      <select name="categoria" id="categoria">
        <option value="value1">Tarjeta de credito</option>
      </select>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="imagen">Imagen:</label>
      <input type="file" name="imagen" id="imagen">
    </div>
    <button type="submit">Agregar</button>
  </form>
</section>