<section class="mt-5 container-xl d-flex flex-column flex-md-row gap-5">
  <?php $validaciones = session('validaciones'); ?>
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
  <form method="post" action="<?php echo base_url('carrito/venta') ?>">
    <div class="d-flex flex-column gap-3">
      <h2 class="fw-bold">Direccion de Entrega</h2>
      <div class="login-input compra-input">
        <div class="d-flex flex-column gap-2">
          <label for="dni">DNI:</label>
          <input name="dni" id="dni" type="text" />
          <?php if (isset($validaciones) && $validaciones->hasError('dni'))
            echo $validaciones->getError('dni'); ?>
        </div>
        <div class="d-flex flex-column gap-4">
          <div class="d-flex flex-column flex-md-row gap-4">
            <div class="d-flex flex-column gap-2">
              <label for="direccion">Direccion</label>
              <input name="direccion" id="direccion" type="text" />
              <?php if (isset($validaciones) && $validaciones->hasError('direccion'))
                echo $validaciones->getError('direccion'); ?>
            </div>
            <div class="d-flex flex-column gap-2">
              <label for="altura">Altura</label>
              <input name="altura" id="altura" type="text" />
              <?php if (isset($validaciones) && $validaciones->hasError('altura'))
                echo $validaciones->getError('altura'); ?>
            </div>
          </div>
          <div class="d-flex flex-column flex-md-row gap-4">
            <div class="d-flex flex-column gap-2">
              <label for="localidad">Localidad</label>
              <input name="localidad" id="localidad" type="text" />
              <?php if (isset($validaciones) && $validaciones->hasError('localidad'))
                echo $validaciones->getError('localidad'); ?>
            </div>
            <div class="d-flex flex-column gap-2">
              <label for="codigo">Codigo postal</label>
              <input name="codigo" id="codigo" type="text" />
              <?php if (isset($validaciones) && $validaciones->hasError('codigo'))
                echo $validaciones->getError('codigo'); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="d-flex flex-column gap-5 mt-4">
        <div class="d-flex flex-column gap-3">
          <h2 class="fw-bold">Método de Pago</h2>
          <select name="metodo_pago">
            <option value="">Seleccionar metodo de pago</option>
            <?php foreach ($metodos as $metodo): ?>
              <option value="<?= $metodo ?>"><?= $metodo ?></option>
            <?php endforeach; ?>
          </select>
          <?php if (isset($validaciones) && $validaciones->hasError('metodo_pago'))
            echo $validaciones->getError('metodo_pago'); ?>
        </div>
        <div class="d-flex flex-column gap-3">
          <h2 class="fw-bold">Pagar</h2>
          <button class="btn-base" type="submit">Finalizar compra</button>
        </div>
      </div>
    </div>
  </form>
  <div class="d-flex flex-column gap-3" style="width: 40%;">
    <h2 class="fw-bold text-center">RESUMEN DE TU PEDIDO</h2>
    <div class="d-flex flex-column gap-3">
      <?php $total = 0 ?>
      <?php foreach ($productos as $producto): ?>
        <div class="d-flex gap-3 p-2 p-md-3">
          <div style="width: 30%;">
            <img width="100%" src="<?php echo base_url('uploads/') . $producto['imagen'] ?>" alt="" class="carrito-img">
          </div>
          <div class="d-flex flex-column gap-2">
            <p class="my-0"><?php echo $producto['nombre'] ?></p>
            <p class="my-0">Talle: <?php echo $producto['talle'] ?></p>
            <p class="my-0">Cantidad: <?php echo $producto['cantidad'] ?></p>
            <p class="text-end my-0">$ <?php echo formatear_precio($producto['precio']); ?></p>
          </div>
        </div>
        <?php $total += $producto['total'] ?>
      <?php endforeach; ?>
    </div>
    <h2 class="fw-bold">Total: $<?php echo formatear_precio($total); ?></h2>
  </div>
</section>