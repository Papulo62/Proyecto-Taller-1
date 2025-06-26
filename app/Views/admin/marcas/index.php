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
  <h1 class="fw-bold text-center display-4 mb-4">Marcas</h1>
  <div class="d-flex justify-content-end mb-5">
    <a href="<?php echo base_url('admin/marcas/nuevo'); ?>"><button class="btn-base" type="button">Agregar
        Marca</button></a>
  </div>
  <table class="table my-3">
    <thead class="table-dark">
      <tr>
        <th class="py-3" scope="col">Nombre</th>
        <th class="py-3" scope="col">Id</th>
        <th class="py-3" scope="col">Opciones</th>
      </tr>
    </thead>

    <?php foreach ($marcas as $marca): ?>
      <tr class="container-fluid">
        <td class="align-middle"><?php echo $marca['nombre']; ?></td>
        <td class="align-middle"><?php echo $marca['id']; ?></td>
        <td>
          <a href="<?= base_url('admin/marcas/editar/' . $marca['id']); ?>"><button class="btn btn-dark">Editar</button></a>

          <button type="button" class="btn btn-danger btn-md" data-bs-toggle="modal" data-bs-target="#eliminaModal"
            data-bs-url="<?= base_url('admin/marcas/eliminar/' . $marca['id']); ?>">Eliminar</button>
        </td>
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