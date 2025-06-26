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
  <h1 class="fw-bold text-center display-4 mb-4">Usuarios</h1>
  <table class="table my-3">
    <thead class="table-dark">
      <tr>
        <th class="py-3" scope="col">Nombre</th>
        <th class="py-3" scope="col">Apellido</th>
        <th class="py-3" scope="col">Direccion</th>
        <th class="py-3" scope="col">Correo</th>
        <th class="py-3" scope="col">Rol</th>
        <th class="py-3" scope="col">Accion</th>
      </tr>
    </thead>

    <?php foreach ($usuarios as $usuario): ?>
      <tr class="container-fluid">
        <td class="align-middle"><?php echo $usuario['nombre']; ?></td>
        <td class="align-middle"><?php echo $usuario['apellido']; ?></td>
        <td class="align-middle"><?php echo $usuario['direccion']; ?></td>
        <td class="align-middle"><?php echo $usuario['email']; ?></td>
        <td class="align-middle"><?php echo $usuario['nombre_rol']; ?></td>
        <td class="align-middle">
          <a href="<?php echo base_url('admin/usuarios/cambiar_rol/' . $usuario['id']) ?>" class="btn btn-primary">
            <i class="fa-solid fa-rotate"></i>
          </a>
        </td>
      </tr>

    <?php endforeach; ?>
  </table>
</section>