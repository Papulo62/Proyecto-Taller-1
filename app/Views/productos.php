<section class="d-flex px-5 flex-column" style="margin-top: 200px;">
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
    <?php for ($i = 1; $i <= 20; $i++): ?>
      <div class="d-flex flex-column" style="width: 100%;">
        <img width="100%" style="border: 1px solid gray;"
          src="<?php echo base_url('img/Botines KING MATCH TT para niños.png') ?>" alt="">
        <h6 class="mt-2">Zapatillas de running MagMax NITRO™ para hombre</h6>
        <h6>$150.999</h6>
      </div>
    <?php endfor; ?>
  </div>
  <div class="mt-5" style="font-size: 0.8rem;">
    <h5>Calzado</h5>
    <p>Para running, training o simplemente caminar por la ciudad, las zapatillas de hombre se han convertido en el
      calzado ideal para trazar el propio camino. Quienes buscan diseño, tendencia y audacia, saben que en PUMA van a
      encontrar esos modelos que representen su estilo de vida. Hay una amplia variedad de zapatillas de hombre y todas
      ofrecen lo último en tecnología. Encontrarás la tecnología Running System, que aporta amortiguación o ProFoam, la
      cual es la solución de mediasuela liviana de alto rebote; esta proporciona una amortiguación instantánea y una
      buena respuesta al andar. Las zapatillas para hombre, además, han adoptado las últimas tendencias de moda, donde
      la cultura urbana se ha apoderado de las calles. Desde las combinaciones de color más audaces hasta detalles
      minuciosos, las zapatillas de hombre deportivas dan un paso más allá de lo convencional. Visitá nuestro sitio y
      llevate ese par perfecto para vos. ¡Empezá a armar tu ruta!</p>
  </div>
</section>