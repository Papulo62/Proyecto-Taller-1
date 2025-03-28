<section class="d-flex gap-5" style="margin-top: 50px;">
  <div style="width: 60%;">
    <img src="<?php echo base_url('img/395345_02_sv01.png') ?>" alt="zapatilla-running">
    <div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            Descripción
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <p>Un clásico de running del '87 que volvió renovado! • CAPELLADA: de descarne sintético y mesh. • SUELA: de
              EVA fresada y goma antideslizante. • Color: NEGRO • Garantía: 6 Meses</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="d-flex flex-column" style="margin-top: 200px; width: 40%;">
    <h4>ZAPATILLAS T.350 MESH</h4>
    <h4>$50.578</h4>
    <p>Selecciona tu talle: </p>
    <div class="producto-talle">
      <?php for ($i = 1; $i <= 13; $i++): ?>
        <h6>45</h6>
      <?php endfor; ?>
    </div>
    <div class="d-flex flex-column gap-3">
      <button class="btn-genero" type="button">Agregar al carrito</button>
      <button class="btn-genero" type="button">Comprar</button>
    </div>
  </div>
</section>