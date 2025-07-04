<section class="d-flex mt-4 px-4 gap-5 flex-column mb-3">
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
  <div class="d-flex justify-content-start px-3" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Carrito</li>
      </ol>
    </nav>
  </div>
  <div class="d-flex gap-5 flex-column flex-lg-row">
    <div class="carrito-item">
      <h1 class="fw-bold mb-5">TU CARRITO</h1>
      <div class="d-flex flex-column gap-3">
        <?php $total = 0; ?>
        <?php foreach ($productos as $producto): ?>
          <div class="d-flex justify-content-between p-2 p-md-4" style="border: 1px solid gray;">
            <img width="30%" src="<?php echo base_url('uploads/') . $producto['imagen'] ?>" alt="" class="carrito-img">
            <div class="d-flex flex-column">
              <p class="fw-bold"><?php echo $producto['nombre'] ?></p>
              <p class="fw-bold">Talle: <?php echo $producto['talle'] ?></p>
              <p class="fw-bold">Cantidad: <?php echo $producto['cantidad'] ?></p>
            </div>
            <div>
              <p class="fw-bold text-end text-md-start"><?php echo formatear_precio($producto['precio']); ?></p>
              <a href="<?php echo base_url('carrito/eliminar/') . $producto['producto_id'] ?>"
                class="btn-base d-flex align-items-center" type="button"
                style="background-color: white; color: black; border: 1px solid black;">
                Eliminar
              </a>
            </div>
          </div>
          <?php $total += $producto['total']; ?>
        <?php endforeach; ?>
      </div>
    </div>
    <?php if (session()->get('productos_carrito')): ?>
      <div class="carrito-resumen">
        <h2 class="fw-bold my-0 mb-5">RESUMEN DEL PEDIDO</h2>
        <p class="fw-bold my-0">Cantidad de productos: <?php echo count($productos); ?></p>
        <p class="fw-bold my-0">Total: $<?php echo formatear_precio($total); ?></p>
        <a href="<?php echo base_url('compra') ?>">
          <button class="btn-base" type="button">Ir a pagar</button>
        </a>
        <a class="btn-base d-flex align-items-center" href="<?php echo base_url('carrito/vaciarCarrito') ?>">
          Vaciar Carrito</a>
      </div>
    <?php endif; ?>
    <?php if (!session()->get('productos_carrito')): ?>
      <div class="carrito-resumen">
        <h2 class="fw-bold">Tu carrito se encuentra vacio.</h2>
        <a href="<?php echo base_url('productos') ?>">Ir al catalogo de productos</a>
      </div>
    <?php endif; ?>
  </div>
</section>