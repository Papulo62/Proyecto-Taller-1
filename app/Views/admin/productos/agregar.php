<section class="container-xl mt-5 d-flex flex-column align-items-center gap-3">
  <div class="d-flex justify-content-start px-5" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/productos') ?>">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Agregar Producto</li>
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
  <form class="d-flex flex-column gap-4" method="post" action="<?php echo base_url('admin/productos/insertar') ?>"
    enctype="multipart/form-data">
    <div class="container-input">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto" required>
      <?php if (isset($validaciones) && $validaciones->hasError('nombre'))
        echo $validaciones->getError('nombre'); ?>
    </div>
    <div class="container-input">
      <label for="descripcion">Descripcion:</label>
      <textarea name="descripcion" id="descripcion" rows="5" placeholder="Descripcion" required></textarea>
      <?php if (isset($validaciones) && $validaciones->hasError('descripcion'))
        echo $validaciones->getError('descripcion'); ?>
    </div>
    <div class="container-input">
      <label for="precio">Precio:</label>
      <input type="text" id="precio" name="precio" placeholder="Ingrese el precio del producto" required>
      <?php if (isset($validaciones) && $validaciones->hasError('precio'))
        echo $validaciones->getError('precio'); ?>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="categoria">Categoria:</label>
      <select name="categoria" id="categoria">
        <?php foreach ($categorias as $categoria): ?>
          <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($validaciones) && $validaciones->hasError('categoria'))
        echo $validaciones->getError('categoria'); ?>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="marca">Marca:</label>
      <select name="marca" id="marca">
        <?php foreach ($marcas as $marca): ?>
          <option value="<?= $marca['id'] ?>"><?= $marca['nombre'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="marca">Género:</label>
      <select name="genero" id="genero" required>
        <option value="">Seleccionar género</option>
        <?php foreach ($generos as $genero): ?>
          <option value="<?= $genero ?>"><?= $genero ?></option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($validaciones) && $validaciones->hasError('genero'))
        echo $validaciones->getError('genero'); ?>
    </div>

    <div class="form-group cont-talle d-flex flex-column gap-3">
      <button class="btn-base btn-agregar-talle mt-2" type="button">Agregar talle</button>
    </div>
    <template>
      <div class="d-flex gap-3">
        <div class="d-flex flex-column gap-2">
          <input type="text" name="talle_id[]" hidden>
          <label for="talle">Talle:</label>
          <input type="text" id="talle" name="talle[]" placeholder="Ingrese el talle">
        </div>
        <div class="d-flex flex-column gap-2">
          <label for="stock">Cantidad:</label>
          <input type="text" id="stock" name="stock[]" placeholder="Ingrese la cantidad">
        </div>
        <div class="d-flex align-items-end">
          <button class="btn btn-danger btn-borrar-talle" type="button"><i class="fas fa-trash" data-placement="top"
              title="Eliminar Talle"></i></button>
        </div>
      </div>
    </template>

    <div class="form-group d-flex flex-column gap-2">
      <img id="img" width="350px" src="<?php echo base_url('uploads/') ?>" alt="">
      <input type="file" name="imagen" class="d-none" id="imagen">
      <label for="imagen" class="label-input-file"><i class="fas fa-upload"></i> Seleccionar Imagen</label>
      <?php if (isset($validaciones) && $validaciones->hasError('imagen'))
        echo $validaciones->getError('imagen') ?>
      </div>
      <button class="btn-base" type="submit">Agregar</button>
    </form>
  </section>