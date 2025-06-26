<section class="d-flex pb-5 gap-3 flex-column align-items-center mt-3">
    <div class="d-flex justify-content-start px-5" style="width: 100%;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('/') ?>">Inicio</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('perfil') ?>">Mi perfil</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar perfil</li>
            </ol>
        </nav>
    </div>
    <h1 class="display-3 fw-bold mt-2 mt-lg-4">Editar cuenta</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success w-75">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger w-75">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('perfil/actualizar') ?>" class="container-input">
        <?= csrf_field() ?>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre"
            value="<?= old('nombre', esc($usuario['nombre'])) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('nombre') ? '<span class="text-danger">' . $validaciones->getError('nombre') . '</span>' : '' ?>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido"
            value="<?= old('apellido', esc($usuario['apellido'])) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('apellido') ? '<span class="text-danger">' . $validaciones->getError('apellido') . '</span>' : '' ?>

        <label for="direccion">Dirección:</label>
        <input type="text" id="direccion" name="direccion" placeholder="Ingrese su dirección"
            value="<?= old('direccion', esc($usuario['direccion'])) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('direccion') ? '<span class="text-danger">' . $validaciones->getError('direccion') . '</span>' : '' ?>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" placeholder="Ingrese su correo electrónico"
            value="<?= old('email', esc($usuario['email'])) ?>" required>
        <?= isset($validaciones) && $validaciones->hasError('email') ? '<span class="text-danger">' . $validaciones->getError('email') . '</span>' : '' ?>

        <hr class="my-4">
        <h5 class="text-center mb-3">Cambiar Contraseña (Opcional)</h5>
        <p class="text-muted text-center mb-4">Deja estos campos vacíos si no deseas cambiar tu contraseña</p>

        <label for="contraseña">Nueva Contraseña:</label>
        <input type="password" id="contraseña" name="contraseña" placeholder="Ingrese su nueva contraseña">
        <?= isset($validaciones) && $validaciones->hasError('contraseña') ? '<span class="text-danger">' . $validaciones->getError('contraseña') . '</span>' : '' ?>

        <label for="c-contraseña">Confirmar Nueva Contraseña:</label>
        <input type="password" id="c-contraseña" name="c-contraseña" placeholder="Confirmar nueva contraseña">
        <?= isset($validaciones) && $validaciones->hasError('c-contraseña') ? '<span class="text-danger">' . $validaciones->getError('c-contraseña') . '</span>' : '' ?>

        <button type="submit">Actualizar cuenta</button>
        <a class="text-center fs-5 fw-bold" href="<?= base_url('usuario_perfil') ?>">Volver a mi perfil</a>
    </form>
</section>