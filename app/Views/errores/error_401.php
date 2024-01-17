<!-- Heredar todo el contendido especifico de mi plantilla base -->
<?= $this->extend("base/panel_base") ?>

<!-- CSS especificos para cada vista -->
<?= $this->section("css") ?>

<?= $this->endSection(); ?>

<!-- CONTENIDO especifico de cada vista-->
<?= $this->section("contenido") ?>
<div class="error-page">
    <h1 class="headline text-warning"> 401</h1>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning text-center"></i> ¡Oops! Acceso denegado</h3>
        <p class="text-justify">
            No cuentas con los permisos apropiados para acceder a este módulo.
            Para ello, te sugerimos que regreses al Dasboard y/o contactes al administrador.
        </p>
        <a class="btn btn-warning" href="<?= route_to('dashboard')?>"> Dashboard</a>

    </div>
    <!-- /.error-content -->

</div>
<!-- /.error-page -->
<?= $this->endSection(); ?>

<!-- JS especificos para cada vista -->
<?= $this->section("js") ?>

<?= $this->endSection(); ?>