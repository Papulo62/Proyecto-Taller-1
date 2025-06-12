<section class="container-xl mt-5 d-flex flex-column align-items-center gap-3">
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
  <form class="d-flex flex-column gap-4" method="post"
    action="<?php echo base_url('admin/productos/actualizar/' . $producto['id']) ?>" enctype="multipart/form-data">
    <div class="container-input">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre del producto"
        value="<?php echo $producto['nombre'] ?>" required>
      <?php if (isset($validaciones) && $validaciones->hasError('nombre'))
        echo $validaciones->getError('nombre'); ?>
    </div>
    <div class="container-input">
      <label for="descripcion">Descripcion:</label>
      <textarea name="descripcion" id="descripcion" rows="5" placeholder="Descripcion"
        required><?php echo $producto['descripcion'] ?></textarea>
      <?php if (isset($validaciones) && $validaciones->hasError('descripcion'))
        echo $validaciones->getError('descripcion'); ?>
    </div>
    <div class="container-input">
      <label for="precio">Precio:</label>
      <input type="text" id="precio" name="precio" placeholder="Ingrese el precio del producto"
        value="<?php echo $producto['precio'] ?>" required>
      <?php if (isset($validaciones) && $validaciones->hasError('precio'))
        echo $validaciones->getError('precio'); ?>
    </div>
    <div class="form-group d-flex flex-column gap-2">
      <label for="categoria">Categoria:</label>
      <select name="categoria" id="categoria">
        <option value="value1">Tarjeta de credito</option>
      </select>
    </div>
    <div class="form-group cont-talle d-flex flex-column gap-3">
      <?php foreach ($talles as $index => $talle): ?>
        <div class="d-flex gap-3">
          <input type="text" name="talle_id[]" value="<?php echo $talle['id'] ?>" hidden>
          <div class="d-flex flex-column gap-2">
            <label for="talle">Talle:</label>
            <input type="text" id="talle" name="talle[]" placeholder="Ingrese el talle"
              value="<?php echo $talle['talle'] ?>">
            <?php if (isset($validaciones) && $validaciones->hasError('talle.' . $index))
              echo $validaciones->getError('talle.' . $index); ?>

          </div>
          <div class="d-flex flex-column gap-2">
            <label for="stock">Cantidad:</label>
            <input type="text" id="stock" name="stock[]" placeholder="Ingrese la cantidad"
              value="<?php echo $talle['stock'] ?>">
            <?php if (isset($validaciones) && $validaciones->hasError('stock.' . $index))
              echo $validaciones->getError('stock.' . $index); ?>
          </div>
          <div class="d-flex align-items-end">
            <button class="btn btn-danger btn-borrar-talle" type="button" data-placement="top" title="Eliminar Talle"><i
                class="fas fa-trash"></i></button>
          </div>
        </div>
      <?php endforeach; ?>
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
      <img id="img" width="350px" src="<?php echo base_url('uploads/' . $producto['imagen']) ?>" alt="">
      <input type="file" name="imagen" class="d-none" id="imagen">
      <label for="imagen" class="label-input-file"><i class="fas fa-upload"></i> Seleccionar Imagen</label>
      <?php if (isset($validaciones) && $validaciones->hasError('imagen'))
        echo $validaciones->getError('imagen') ?>
      </div>
      <button class="btn-base" type="submit">Agregar</button>
    </form>
  </section>