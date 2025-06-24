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
  <table class="table my-3 tabla">
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
        <td class="align-middle">$<?php echo formatear_precio($producto['precio']); ?></td>
        <td class="align-middle">
          <a href="<?php echo base_url('admin/productos/editar/' . $producto['id']) ?>" class="btn btn-primary">
            Editar
          </a>
          <button type="button" class="btn btn-danger btn-md " data-bs-toggle="modal" data-bs-target="#eliminaModal"
            data-bs-url="<?= base_url('admin/productos/eliminar/' . $producto['id']); ?>">Eliminar</button>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
  <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>¿Desea eliminar este registro?</p>
        </div>
        <div class="modal-footer">
          <form id="form-elimina" action="" method="post">
            <input type="hidden" name="_method" value="delete">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    const eliminaModal = document.getElementById('eliminaModal')
    if (eliminaModal) {
      eliminaModal.addEventListener('show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const url = button.getAttribute('data-bs-url')

        // Update the modal's content.
        const form = eliminaModal.querySelector('#form-elimina')
        form.setAttribute('action', url)
      })
    }
  </script>
</section>