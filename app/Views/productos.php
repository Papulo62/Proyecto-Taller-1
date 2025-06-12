<section class="d-flex px-3 px-lg-5 flex-column mt-3">
  <div class="d-flex justify-content-start mb-4" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Productos</li>
      </ol>
    </nav>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-5">
    <h1 class="fw-bold display-6 d-none d-md-block">ZAPATILLAS PARA HOMBRE</h1>
    <div class="dropdown">
      <button class="btn-filtro dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        ORDENAR POR
      </button>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#">Action</a></li>
        <li><a class="dropdown-item" href="#">Another action</a></li>
        <li><a class="dropdown-item" href="#">Something else here</a></li>
      </ul>
    </div>
  </div>
  <div class="container-producto">
    <?php foreach ($productos as $producto): ?>
      <a style="text-decoration: none;" href="<?php echo base_url('detalle_producto/') . $producto['id'] ?>">
        <div class="d-flex flex-column" style="width: 100%; border: 1px solid gray">
          <div class="d-flex justify-content-between align-items-center p-2">
            <h6 class="my-0"><?php echo $producto['nombre'] ?></h6>
            <h6 class="my-0">$<?php echo $producto['precio'] ?></h6>
          </div>
          <div class="imagen-producto">
            <img width="100%" style="border-bottom: 1px solid gray; border-top: 1px solid gray;"
              src="<?php echo base_url('uploads/') . $producto['imagen'] ?>" alt="">
          </div>
          <div class="p-2">
            <h6 class="my-0"><?php echo $producto['descripcion'] ?></h6>
          </div>
        </div>
      </a>
    <?php endforeach; ?>
  </div>
</section>