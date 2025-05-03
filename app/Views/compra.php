<section class="mt-5 container-xl d-flex flex-column flex-md-row gap-5">
  <div class="d-flex flex-column gap-3">
    <h2 class="fw-bold my-0">Contacto</h2>
    <p class="my-0">antoniocoronel368@gmail.com</p>
    <h2 class="fw-bold">Direccion de Entrega</h2>
    <div class="login-input compra-input">
      <div class="d-flex flex-column flex-md-row gap-4">
        <div class="d-flex flex-column gap-2">
          <label for="#">Nombre</label>
          <input type="text" />
        </div>
        <div class="d-flex flex-column gap-2">
          <label for="#">Apellido</label>
          <input type="text" />
        </div>
      </div>
      <div class="d-flex flex-column gap-4">
        <div class="d-flex flex-column flex-md-row gap-4">
          <div class="d-flex flex-column gap-2">
            <label for="#">Direccion</label>
            <input type="text" />
          </div>
          <div class="d-flex flex-column gap-2">
            <label for="#">Altura</label>
            <input type="text" />
          </div>
        </div>
        <div class="d-flex flex-column flex-md-row gap-4">
          <div class="d-flex flex-column gap-2">
            <label for="#">Localidad</label>
            <input type="text" />
          </div>
          <div class="d-flex flex-column gap-2">
            <label for="#">Codigo postal</label>
            <input type="text" />
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex flex-column gap-5 mt-4">
      <div class="d-flex flex-column gap-3">
        <h2 class="fw-bold">Método de Pago</h2>
        <select name="select">
          <option value="value1">Tarjeta de credito</option>
          <option value="value2" selected>Tarjeta de debito</option>
          <option value="value3">Mercado Pago</option>
        </select>
      </div>
      <div class="d-flex flex-column gap-3">
        <h2 class="fw-bold">Pagar</h2>
        <button class="btn-base" type="button">Finalizar compra</button>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column gap-3" style="width: 40%;">
    <h2 class="fw-bold text-center">RESUMEN DE TU PEDIDO (4)</h2>
    <div class="d-flex flex-column gap-3">
      <?php for ($i = 0; $i <= 3; $i++): ?>
        <div class="d-flex gap-3 p-2 p-md-3">
          <div style="width: 30%;">
            <img width="100%" src="<?php echo base_url('assets/img/Botines KING MATCH TT para niños.png') ?>" alt=""
              class="carrito-img">
          </div>
          <div class="d-flex flex-column gap-2">
            <p class="my-0">Zapatillas Superstar II Core Black</p>
            <p class="my-0">Taller 42(UK)</p>
            <p class="my-0">Cantidad: 1</p>
            <p class="text-end my-0">$ 189.99</p>
          </div>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</section>