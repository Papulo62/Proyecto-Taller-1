<div class="margin-text">
  <img width="100%"
    src="<?php echo base_url("img/25SS_Ecom_BR_Brand-Campaign-Running_Week-1_Homepage_Full-Bleed-Hero_Large-Desk_2000x694px.jpg") ?>"
    alt="">
</div>

<h2 class="text-center mt-5 mb-5 display-6 fw-bold">Zapatillas para cada ocasión, comodidad y diseño a tu alcance >>>
</h2>

<section class="d-flex gap-4 mt-4 px-5 flex-md-row flex-column">
  <?php for ($i = 1; $i <= 2; $i++): ?>
    <div class="d-flex flex-column align-items-center gap-3">
      <img class="img-running" width="100%"
        src="<?php echo base_url('img/25SS_Ecom_BR_Brand-Campaign-Running_CLP_Full-Bleed-Hero_Desk-Tab-Mob_1536x1536px_6.jpg') ?>"
        alt="hombre-corriendo">
      <h3 class="fw-bold">RUNNING HOMBRE</h3>
      <button type="button" class="btn-genero">
        Hombres
      </button>
    </div>
  <?php endfor; ?>
</section>

<section class="d-flex gap-5 px-5 mt-5 carrousel">
  <?php for ($i = 1; $i <= 6; $i++): ?>
    <div style="max-width: 400px;">
      <img width="100%" src="<?php echo base_url('img/395345_02_sv01.png') ?>" alt="">
      <h5 class="fw-bold">Zapatillas de running MagMax NITRO™ para hombre</h5>
      <h5 class="fw-bold">$80.899</h5>
    </div>
  <?php endfor; ?>
</section>

<section class="d-flex gap-3 px-5 mt-5 flex-column flex-md-row">
  <?php for ($i = 1; $i <= 3; $i++): ?>
    <div class="container-img" style="max-width: 700px;">
      <img width="100%" src="<?php echo base_url('img/46569c17876de027e784948b8c8ba425.png') ?>" alt="">
      <button class="btn-genero btn-img" type="button">Para hombres</button>
    </div>
  <?php endfor; ?>
</section>