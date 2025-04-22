<section class="mt-4 container-xl d-flex flex-column align-items-center">
  <div>
    <h1 class="text-center fw-bold display-4 mb-5">PAGAR</h1>
    <h2 class="fw-bold">Contacto</h2>
    <p>antoniocoronel368@gmail.com</p>
    <h2 class="fw-bold">Direccion de Entrega</h2>
    <div class="login-input">
      <label for="#">Nombre y Apellido</label>
      <input type="text" />
      <div class="d-flex flex-column gap-3">
        <div class="d-flex flex-column">
          <label for="#">Direccion</label>
          <input type="text" />
        </div>
        <div class="d-flex flex-column">
          <label for="#">Altura</label>
          <input type="text" />
        </div>
        <div class="d-flex gap-3 flex-row flex-column flex-md-row">
          <div class="d-flex flex-column">
            <label for="#">Localidad</label>
            <input type="text" />
          </div>
          <div class="d-flex flex-column">
            <label for="#">Codigo postal</label>
            <input type="text" />
          </div>
        </div>
        <label for="#">Provincia</label>
        <input type="text" />
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
      <button class="btn-genero" type="button">Finalizar compra</button>
    </div>
  </div>
</section>