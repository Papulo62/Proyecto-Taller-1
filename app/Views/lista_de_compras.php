<section class="container-xl mt-5">
    <h1 class="fw-bold text-center display-4 mb-4">Mis compras</h1>

    <?php if (empty($pedidos)): ?>
        <div class="alert alert-warning text-center" role="alert">
            No tienes compras registradas.
        </div>
    <?php else: ?>
        <table class="table my-3 tabla">
            <thead class="table-dark">
                <tr>
                    <th class="py-3" scope="col">Total</th>
                    <th class="py-3" scope="col">Fecha</th>
                    <th class="py-3" scope="col">Método de Pago</th>
                    <th class="py-3" scope="col">Acción</th>
                </tr>
            </thead>

            <?php foreach ($pedidos as $pedido): ?>
                <tr class="container-fluid">
                    <td class="align-middle">$<?php echo formatear_precio($pedido['total']); ?></td>
                    <td class="align-middle"><?php echo $pedido['created_at']; ?></td>
                    <td class="align-middle"><?php echo $pedido['metodo_pago']; ?></td>
                    <td class="align-middle">
                        <a href="<?= site_url('perfil/lista-de-compras/mis-compras/' . $pedido['id']) ?>"
                            class="btn btn-primary">
                            Ver detalle de pedido
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

</section>