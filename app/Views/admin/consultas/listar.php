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
                <th class="py-3" scope="col">Acción</th>
            </tr>
        </thead>

        <?php foreach ($consultas as $consulta): ?>
            <tr class="container-fluid">
                <td class="align-middle"><?php echo $consulta['nombre']; ?></td>
                <td class="align-middle"><?php echo $consulta['apellido']; ?></td>
                <td class="align-middle"><?php echo $consulta['email']; ?></td>
                <td class="align-middle"><?php echo $consulta['consulta']; ?></td>
                <td class="align-middle">
                    <button class="btn btn-outline-success marcar-leido" data-id="<?= $consulta['id'] ?>">
                        <i class="bi bi-circle"></i> Marcar como leído
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const botonesLeido = document.querySelectorAll('.marcar-leido');
        botonesLeido.forEach(function (boton) {
            boton.addEventListener('click', function () {
                const icon = this.querySelector('i');
                const buttonText = this.textContent.trim();
                if (buttonText === "Marcar como leído") {
                    icon.classList.remove("bi-circle");
                    icon.classList.add("bi-check-circle");
                    this.innerHTML = '<i class="bi bi-check-circle"></i> Leído';
                }
            });
        });
    });
</script>