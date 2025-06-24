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
<section class="d-flex flex-column flex-lg-row gap-0 gap-lg-0 p-3" style="gap: 100px !important;">
  <div class="d-flex flex-column">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('/productos') ?>">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page">Zapatilla hombre</li>
      </ol>
    </nav>
    <h2 class="fw-bold d-block d-lg-none display-6 mt-4"><?php echo $producto['nombre'] ?></h2>
    <h2 class="fw-bold d-block d-lg-none display-6">$<?php echo $producto['precio'] ?></h2>
    <div class="d-flex justify-content-center">
      <img width="100%" style="max-width: 700px;" src="<?php echo base_url('uploads/') . $producto['imagen'] ?>"
        alt="zapatilla-running">
    </div>
    <div class="accordion d-none d-lg-block" style="max-width: 600px;" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="false" aria-controls="collapseOne">
            Descripción
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p><?php echo $producto['descripcion'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column flex-grow-1 gap-2 mt-0 mt-lg-5">
    <form method="post" action="<?php echo base_url('carrito/agregar') ?>">
      <h2 class="fw-bold d-none d-lg-block display-6"><?php echo $producto['nombre'] ?></h2>
      <h2 class="fw-bold d-none d-lg-block display-6">$<?php echo formatear_precio($producto['precio']); ?></h2>
      <p class="fw-bold fs-4">Selecciona tu talle: </p>
      <div class="producto-talle">
        <?php foreach ($talles as $talle): ?>
          <button class="btn-talle" data-id="<?= $talle['id'] ?>" data-stock="<?= $talle['stock'] ?>"
            type="button"><?php echo $talle['talle'] ?></button>
        <?php endforeach; ?>
      </div>

      <input type="hidden" name="talle_id" id="talle_id">
      <input type="hidden" name="talle_stock" id="talle_stock">

      <p class="fw-bold fs-4">Stock disponible: <span id="stock-display">Selecciona un talle</span></p>
      <div class="d-flex flex-column gap-4">
        <div class="d-flex gap-3">
          <h3 class="fw-bold">Cantidad:</h3>
          <div class="d-flex">
            <button class="btn-ad btn-suma" type="button">+</button>
            <input class="container-suma" name="cantidad" type="text">
            <button class="btn-ad btn-resta" type="button">-</button>
          </div>
        </div>
      </div>
      <button class="btn-base btn-cart mt-3" type="summit">Agregar al carrito</button>
  </div>
  </form>
  </div>
  <div class="accordion d-block d-lg-none mt-5" id="accordionExample">
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
          aria-expanded="true" aria-controls="collapseOne">
          Descripción
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p><?php echo $producto['descripcion'] ?></p>
        </div>
      </div>
    </div>
  </div>
</section>