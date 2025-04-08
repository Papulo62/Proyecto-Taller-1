<div class="categorias">
  <ul class="list-unstyled d-flex justify-content-between align-items-center my-0">
    <li>Running</li>
    <li>Futbol</li>
    <li>Basquet</li>
    <li>Voley</li>
  </ul>
</div>
<div>
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img width="100%"
          src="<?php echo base_url("img/25SS_Ecom_BR_Brand-Campaign-Running_Week-1_Homepage_Full-Bleed-Hero_Large-Desk_2000x694px.jpg") ?>"
          alt="">
      </div>
      <div class="carousel-item">
        <img width="100%"
          src="<?php echo base_url("img/25SS_Ecom_BR_Brand-Campaign-Running_Week-2_Homepage_Full-Bleed-Hero_Large-Desk_2000x694px (1).jpg") ?>"
          alt="">
      </div>
      <div class="carousel-item">
        <img width="100%"
          src="<?php echo base_url("img/25SS_Ecom_BR_Brand-Campaign-Running_Week-2_Homepage_Full-Bleed-Hero_Large-Desk_2000x694px (1).jpg") ?>"
          alt="">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<h2 class="text-center mt-5 mb-5 display-6 fw-bold">Zapatillas para cada ocasión,
  comodidad y
  diseño a tu alcance >>>
</h2>

<section class="d-flex gap-4 mt-4 px-5 flex-md-row flex-column">
  <?php for ($i = 1; $i <= 2; $i++): ?>
    <div class="d-flex flex-column align-items-center gap-3">
      <div class="container-img" data-aos="fade-up" data-aos-duration="1000">
        <img class="img-running" width="100%"
          src="<?php echo base_url('img/25SS_Ecom_BR_Brand-Campaign-Running_CLP_Full-Bleed-Hero_Desk-Tab-Mob_1536x1536px_6.jpg') ?>"
          alt="hombre-corriendo">
      </div>
      <h3 class="fw-bold fs-2">RUNNING HOMBRE</h3>
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
    <?php $delay = ($i - 1) * 100; ?>
    <div class="container-img" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?= $delay ?>"
      style=" max-width: 700px;">
      <img width="100%" src="<?php echo base_url('img/46569c17876de027e784948b8c8ba425.png') ?>" alt="">
      <button class="btn-img" type="button">Para hombres</button>
    </div>
  <?php endfor; ?>
</section>

<div class="mt-5">
  <img width="100%" data-aos="fade-up" data-aos-duration="1000" src="<?php echo base_url('img/imagen-runnig.webp') ?>"
    alt="imagen-running">
</div>