<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/custom.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <title><?php echo $titulo; ?></title>
</head>

<body>
  <header>
    <p class="fw-bold text-center  bg-white my-0 py-2 d-none d-md-block">
      Envio gratis a partir de $119.99 | 3,6,9,12 cuotas sin interes con
      monto minimo
    </p>
  </header>
  </div>
  <nav class="navbar navbar-expand-md py-4 px-4 fs-5"
    style="background-color: black !important; position: sticky; top: 0; z-index: 1000;">
    <button class="navbar-toggler" style="border: none" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
      <span class="fas fa-bars text-white"></span>
    </button>
    <a href="<?php echo base_url(); ?>">
      <img width="50px" class="bg-black" src="<?php echo base_url('assets/img/logo.png') ?>" alt="">
    </a>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body align-items-center">
        <ul class="navbar-nav flex-grow-1">
          <li class="nav-item position-relative">
            <a class="navbar-link" href="#">
              Mujeres
            </a>
            <div class="popover position-absolute">
              <ul class="list-unstyled d-flex flex-column gap-3">
                <li>Running</li>
                <li>Futbol</li>
                <li>Basquet</li>
                <li>Voley</li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="navbar-link" href="#">
              Hombres
            </a>
            <div class="popover position-absolute">
              <ul class="list-unstyled d-flex flex-column gap-3">
                <li>Running</li>
                <li>Futbol</li>
                <li>Basquet</li>
                <li>Voley</li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="navbar-link" href="#">
              Niños
            </a>
            <div class="popover position-absolute">
              <ul class="list-unstyled d-flex flex-column gap-3">
                <li>Running</li>
                <li>Futbol</li>
                <li>Basquet</li>
                <li>Voley</li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('/productos') ?>" class="navbar-link">Productos</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url('/sobre_nosotros') ?>" class="navbar-link">Sobre Nosotros</a>
          </li>
      </div>
    </div>
    <div class="d-flex gap-4 align-items-center justify-content-sm-end">
      <button type="button" class="btn-buscar d-xxl-inline-block" role="search" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasTop">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span class="d-none d-xl-inline">Buscar</span>
      </button>
      <a href="<?php echo base_url('/favoritos') ?>">
        <i class="fa-regular fa-heart"></i></a>
      <a href="<?php echo base_url('/carrito') ?>">
        <i class="fa-solid fa-cart-shopping"></i>
      </a>
      <?php if (!session()->get('user_id')): ?>
        <a href="<?php echo base_url('/login') ?>">
          <i class="fa-regular fa-user"></i>
        </a>
      <?php endif; ?>
      <?php if (session()->get('user_id')): ?>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-regular fa-user"></i>
            <span><?php echo session()->get('user_name'); ?></span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Cerrar sesion</a></li>
          </ul>
        </div>
      <?php endif; ?>
    </div>
  </nav>
  <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header"></div>
    <div class="offcanvas-body">
      <div class="d-flex gap-4 justify-content-center align-items-center">
        <input type="text" class="p-3 w-75 fw-normal fs-4" style="height: 60px" placeholder="BUSCAR EN PUMA.COM" />
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    </div>
  </div>