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
<section class="container-xl mt-5">
  <h1 class="fw-bold text-center display-4 mb-4"><?php echo $titulo ?></h1>
  <div class="d-flex justify-content-end mb-5">
    <a href="<?php echo base_url('admin/productos/agregar') ?>">
      <button class="btn-base" type="button">Agregar producto</button>
    </a>
  </div>
  <table class="table my-3">
    <thead class="table-dark">
      <tr>
        <th class="py-3" scope="col">Producto</th>
        <th class="py-3" scope="col">Descripcion</th>
        <th class="py-3" scope="col">Precio</th>
        <th class="py-3" scope="col">Accion</th>
      </tr>
    </thead>

    <?php foreach ($productos as $producto): ?>
      <tr class="container-fluid">
        <td class="align-middle"><?php echo $producto['nombre']; ?></td>
        <td class="align-middle"><?php echo $producto['descripcion']; ?></td>
        <td class="align-middle"><?php echo $producto['precio']; ?></td>
        <td class="align-middle">
          <a href="<?php echo base_url('admin/productos/editar/' . $producto['id']) ?>" class="btn btn-primary">
            Editar
          </a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</section>