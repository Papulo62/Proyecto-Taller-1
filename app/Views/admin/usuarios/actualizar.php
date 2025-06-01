<section class="d-flex pb-5 gap-3 flex-column align-items-center mt-3">
    <div class="d-flex justify-content-start px-5" style="width: 100%;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
            </ol>
        </nav>
    </div>
    <h1 class="display-3 fw-bold mt-2 mt-lg-4">Editar cuenta</h1>

    <form method="post" action="<?= base_url('admin/usuarios/actualizar/' . $usuario['id']) ?>" class="container-input">
        <?= csrf_field() ?>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre"
            value="<?= esc($usuario['nombre']) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('nombre') ? $validaciones->getError('nombre') : '' ?>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido"
            value="<?= esc($usuario['apellido']) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('apellido') ? $validaciones->getError('apellido') : '' ?>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección"
            value="<?= esc($usuario['direccion']) ?>">
        <?= isset($validaciones) && $validaciones->hasError('direccion') ? $validaciones->getError('direccion') : '' ?>

        <label for="email">Correo electrónico:</label>
        <input type="text" id="email" name="email" placeholder="Ingrese su correo electrónico"
            value="<?= esc($usuario['email']) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('email') ? $validaciones->getError('email') : '' ?>

        <label for="contraseña">Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su nueva contraseña" required>
        <?= isset($validaciones) && $validaciones->hasError('contraseña') ? $validaciones->getError('contraseña') : '' ?>

        <label for="c-contraseña">Confirmar contraseña:</label>
        <input type="password" id="c-contraseña" name="c-contraseña" placeholder="Confirmar contraseña" required>
        <?= isset($validaciones) && $validaciones->hasError('c-contraseña') ? $validaciones->getError('c-contraseña') : '' ?>

        <button type="submit">Actualizar cuenta</button>
        <a class="text-center fs-5 fw-bold" href="<?= base_url('/login') ?>">Volver a mi perfil</a>
    </form>
</section>