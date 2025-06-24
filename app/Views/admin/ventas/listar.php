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
    <h1 class="fw-bold text-center display-4 mb-4">Ventas</h1>
    <table class="table my-3 tabla">
        <thead class="table-dark">
            <tr>
                <th class="py-3" scope="col">Usuario</th>
                <th class="py-3" scope="col">Total</th>
                <th class="py-3" scope="col">Fecha</th>
                <th class="py-3" scope="col">Metodo de Pago</th>
                <th class="py-3" scope="col">Accion</th>
            </tr>
        </thead>

        <?php foreach ($pedidos as $pedido): ?>
            <tr class="container-fluid">
                <td class="align-middle"><?php echo $pedido['nombre_usuario']; ?></td>
                <td class="align-middle">$<?php echo formatear_precio($pedido['total']); ?></td>
                <td class="align-middle"><?php echo $pedido['created_at']; ?></td>
                <td class="align-middle"><?php echo $pedido['metodo_pago']; ?></td>
                <td class="align-middle">
                    <a href="<?= site_url('admin/ventas/detalle_pedido/' . $pedido['id']) ?>" class="btn btn-primary">
                        Ver detalle de pedido
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</section>