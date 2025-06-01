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
    <h1 class="fw-bold text-center display-4 mb-4">Consultas</h1>
    <table class="table my-3">
        <thead class="table-dark">
            <tr>
                <th class="py-3" scope="col">Nombre</th>
                <th class="py-3" scope="col">Apellido</th>
                <th class="py-3" scope="col">Correo</th>
                <th class="py-3" scope="col">Consulta</th>
                <th class="py-3" scope="col">Accion</th>
            </tr>
        </thead>

        <?php foreach ($consultas as $consulta): ?>
            <tr class="container-fluid">
                <td class="align-middle"><?php echo $consulta['nombre']; ?></td>
                <td class="align-middle"><?php echo $consulta['apellido']; ?></td>
                <td class="align-middle"><?php echo $consulta['email']; ?></td>
                <td class="align-middle"><?php echo $consulta['consulta']; ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
</section>