<section class="container-xl d-flex flex-column">
  <h1 class="fw-bold mt-5 mb-5">Detalles de la cuenta</h1>
  <div class="d-flex flex-column">
    <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between align-items-center">
                <h2 class="fw-bold mb-0">Mi Perfil</h2>
                <a href="<?= base_url('perfil/editar') ?>" class="btn btn-primary">Editar</a>
              </div>
            </div>
            <div class="card-body">
              <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                  <?= session()->getFlashdata('success') ?>
                </div>
              <?php endif; ?>

              <div class="row">
                <div class="col-md-6">
                  <p><strong>Nombre:</strong> <?= esc($usuario['nombre']) ?></p>
                </div>
                <div class="col-md-6">
                  <p><strong>Apellido:</strong> <?= esc($usuario['apellido']) ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p><strong>Dirección:</strong> <?= esc($usuario['direccion']) ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p><strong>Correo:</strong> <?= esc($usuario['email']) ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column mt-4 pt-4 border-top">
      <h2 class="fw-bold text-danger">Cerrar Cuenta</h2>
      <p class="text-muted">Una vez que elimines tu cuenta, no hay vuelta atrás.</p>

      <button type="button" class="btn btn-danger btn-md align-self-start" data-bs-toggle="modal"
        data-bs-target="#eliminaModal"
        data-bs-url="<?= base_url('perfil/eliminar-cuenta/' . session()->get('user_id')); ?>">
        Eliminar Cuenta
      </button>
    </div>
  </div>
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