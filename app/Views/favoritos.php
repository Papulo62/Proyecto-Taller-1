<section class="d-flex flex-column p-4 gap-4">
  <div class="d-flex justify-content-start px-3" style="width: 100%;">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Favoritos</li>
      </ol>
    </nav>
  </div>
  <h1 class="fw-bold text-center display-4 mb-5">Favoritos</h1>
  <div class="container-favoritos">
    <?php for ($i = 0; $i <= 6; $i++): ?>
      <div class="d-flex gap-5 p-3" style="border: 1px solid gray">
        <div class="d-flex align-items-center" style="width: 25%;">
          <img width="100%" src="<?php echo base_url('assets/img/Botines KING MATCH TT para niños.png') ?>" alt="">
        </div>
        <div class="d-flex flex-column flex-md-row justify-content-between flex-grow-1">
          <div class="d-flex flex-column">
            <p>Zapatilla running maxmax</p>
            <p>Talle 39</pcla>
          </div>
          <div class="d-flex flex-column gap-3">
            <p class="text-start text-md-end">$160.999</p>
            <button class="btn-base" type="button">Agregar al carrito</button>
            <button class="btn-base" type="button" style="background-color: white; color: black; border: 1px solid black">
              Eliminar
            </button>
          </div>
        </div>
      </div>
    <?php endfor; ?>
  </div>
</section>