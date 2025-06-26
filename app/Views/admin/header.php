<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= base_url('assets/custom.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
    rel="stylesheet">
  <title><?php echo $titulo; ?></title>
</head>

<header>

</header>
<nav class="navbar navbar-expand-md py-4 px-4 fs-5"
  style="background-color: black !important; position: sticky; top: 0; z-index: 1000;">
  <button class="navbar-toggler" style="border: none" type="button" data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
    <span class="fas fa-bars text-white"></span>
  </button>
  <a href="<?php echo base_url('admin/'); ?>">
    <img width="50px" class="bg-black" src="<?php echo base_url('assets/img/logo.png') ?>" alt="">
  </a>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
      <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body align-items-center">
      <li class="nav-item position-relative">
        <a class="navbar-link" href="<?php echo base_url('admin/productos') ?>">
          Productos
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-link" href="<?php echo base_url('admin/consultas') ?>">
          Consultas
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-link" href="<?php echo base_url('admin/usuarios') ?>">
          Usuarios
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-link" href="<?php echo base_url('admin/categorias') ?>">
          Categorias
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-link" href="<?php echo base_url('admin/marcas') ?>">
          Marcas
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-link" href="<?php echo base_url('admin/ventas') ?>">
          Ventas
        </a>
      </li>
      <li class="nav-item">
        <a class="navbar-link" href="<?php echo base_url('/') ?>">
          Ir al cliente
        </a>
      </li>
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa-regular fa-user"></i>
          <span><?php echo session()->get('user_name'); ?></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li><a class="dropdown-item" href="<?php echo base_url('usuario_perfil') ?>">Mi perfil</a></li>
          <li><a class="dropdown-item" href="<?php echo base_url('/logout') ?>">Cerrar sesion</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<body class="d-flex flex-column min-vh-100">