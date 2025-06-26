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
    <div class="d-flex justify-content-start px-5" style="width: 100%;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/ventas') ?>">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalle de venta</li>
            </ol>
        </nav>
    </div>
    <h1 class="fw-bold text-center display-4 mb-4">Detalle de venta</h1>
    <table class="table my-3">
        <thead class="table-dark">
            <tr>
                <th class="py-3" scope="col">Producto</th>
                <th class="py-3" scope="col">Talle</th>
                <th class="py-3" scope="col">Precio</th>
                <th class="py-3" scope="col">Cantidad</th>
                <th class="py-3" scope="col">Subtotal</th>
            </tr>
        </thead>
        <?php foreach ($detalles as $detalle): ?>
            <tr class="container-fluid">
                <td class="align-middle"><?php echo $detalle['producto_nombre']; ?></td>
                <td class="align-middle"><?php echo $detalle['talle']; ?></td>
                <td class="align-middle">$<?php echo formatear_precio($detalle['precio']); ?></td>
                <td class="align-middle"><?php echo $detalle['cantidad']; ?></td>
                <td class="align-middle">$<?php echo formatear_precio($detalle['subtototal']); ?></td>
            </tr>

        <?php endforeach; ?>
    </table>
    <h2 class="fw-bold">Total: $<?php echo formatear_precio($total_pedido); ?></h2>
</section>