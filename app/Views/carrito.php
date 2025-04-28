<section class="d-flex mt-4 px-4 gap-5 flex-column">
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
        <?php for ($i = 0; $i <= 3; $i++): ?>
          <div class="d-flex justify-content-between p-2 p-md-4" style="border: 1px solid gray;">
            <img width="30%" src="<?php echo base_url('assets/img/Botines KING MATCH TT para niños.png') ?>" alt=""
              class="carrito-img">
            <div class="d-flex flex-column">
              <p class="fw-bold">Zapatillas Superstar II Core Black</p>
              </p>
              <p class="fw-bold">Taller 42(UK)</p>
            </div>
            <div>
              <p class="fw-bold text-end text-md-start">$ 189.99</p>
              <button class="btn-base" type="button"
                style="background-color: white; color: black; border: 1px solid black;">
                Eliminar
              </button>
            </div>
          </div>
        <?php endfor; ?>
      </div>
    </div>
    <div class="carrito-resumen">
      <h2 class="fw-bold">RESUMEN DEL PEDIDO</h2>
      <div class="d-flex justify-content-between">
        <p class="fw-bold">1 Producto</p>
        <p class="fw-bold">$160.000</p>
      </div>
      <div class="d-flex justify-content-between">
        <p class="fw-bold">Total</p>
        <p class="fw-bold">$160.000</p>
      </div>
      <button class="btn-base" type="button">Ir a pagar</button>
    </div>
  </div>
</section>