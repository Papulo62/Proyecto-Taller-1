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
  <title>Document</title>
</head>

<body>
  <header class="fixed-top">
    <p class="fw-bold text-center  bg-white my-0 py-3 d-none d-md-block">
      Envio gratis a partir de $119.99 | 3,6,9,12 cuotas sin interes con
      monto minimo
    </p>
    <nav class="navbar bg-dark navbar-expand-md py-4 px-4 fs-5">
      <div class="container-fluid">
        <button class="navbar-toggler" style="border: none" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="fas fa-bars text-white"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
          aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body align-items-center">
            <ul class="navbar-nav gap-4 flex-grow-1">
              <li class="nav-item">
                <div class="dropdown">
                  <a class="navbar-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Mujeres
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Calzado</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a class="navbar-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Hombres
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Calzado</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <div class="dropdown">
                  <a class="navbar-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Niños
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="#">Back to school</a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="d-flex gap-4 align-items-center justify-content-sm-end">
          <button type="button" class="btn-buscar d-xxl-inline-block" role="search" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasTop">
            <i class="fa-solid fa-magnifying-glass"></i>
            <span class="d-none d-xl-inline">Buscar</span>
          </button>
          <a href="#">
            <i class="fa-regular fa-heart"></i></a>
          <a href="#">
            <i class="fa-solid fa-cart-shopping"></i>
          </a>
          <a href="<?php echo base_url('/login') ?>">
            <i class="fa-regular fa-user"></i>
          </a>
        </div>
      </div>
    </nav>
  </header>
  <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
    <div class="offcanvas-header"></div>
    <div class="offcanvas-body">
      <div class="d-flex gap-4 justify-content-center align-items-center">
        <input type="text" class="p-3 w-75 fw-normal fs-4" style="height: 60px" placeholder="BUSCAR EN PUMA.COM" />
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
    </div>
  </div>