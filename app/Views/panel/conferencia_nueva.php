<!-- Heredar todo el contenido especifico de la plantilla base-->
<?=$this->extend("base/panel_base")?>
<!--CSS especificos para cada vista -->
<?= $this->section("css")?>
 <!-- Daterange picker -->
 <link rel="stylesheet" href=<?= base_url(PLUGINS_DASHBOARD.'daterangepicker/daterangepicker.css')?>>

<?= $this->endSection();?>

<!-- Contenido especifico de cada vista -->
<?= $this->section("contenido") ?>
<div class="container-fluid">
                <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-dark">
                    <div class="card-header">
                        <h3 class="card-title">Formulario de nueva conferencia</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!-- multipart->PARA AGREGAR LA IMAGEN -->
                    <?= form_open_multipart('registrar_conferencia',['id'=>'form-conferencia','class'=>''])?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                    <img src="<?= base_url(RECURSOS_IMAGENES.'reconocimiento.png');?>" class="img-rounded" alt="" id="img-preview" width="50%" style="margin-bottom: 15px;">
                                    </center>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nombre conferencia</label>
                                        <?php
                                             $data = [
                                                'name'      => 'nombre_conferencia',
                                                'id'        => 'nombre_conferencia',
                                                'type'     => 'text',
                                                'class' => 'form-control',
                                                'maxlength' => '100',
                                                'placeholder'=>'Nombre de la conferencia',
                                                'requiered'=>true
                                            ];
                                            echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Descripción</label>
                                        <?php
                                             $data = [
                                                'name'      => 'descripcion',
                                                'id'        => 'descripcion',
                                                'type'     => 'text',
                                                'class' => 'form-control',
                                                'maxlength' => '100',
                                                'placeholder'=>'Descripción de la conferencia',
                                                'requiered'=>true
                                            ];
                                            echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Fecha conferencia</label>
                                        <?php
                                             $data = [
                                                'name'      => 'fecha_conferencia',
                                                'id'        => 'fecha_conferencia',
                                                'type'     => 'date',
                                                'class' => 'form-control',
                                                'maxlength' => '100',
                                                'requiered'=>true
                                            ];
                                            echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hora de la conferencia</label>
                                        <?php
                                             $data = [
                                                'name'      => 'hora_conferencia',
                                                'id'        => 'hora_conferencia',
                                                'type'     => 'time',
                                                'class' => 'form-control',
                                                'maxlength' => '100',
                                                'requiered'=>true
                                            ];
                                            echo form_input($data);
                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <label for="exampleInputEmail1">Plantilla del reconocimiento</label>
                                        <?php
                                            $data = array(
                                                'type' => 'file',
                                                'name' => 'foto_plantilla',
                                                'class' => 'form-control',
                                                'id' => 'foto_plantilla',
                                                'placeholder' => '',
                                            );
                                            echo form_input($data);
                                        ?>
                                </div>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                        <?= form_submit('Registrar', 'Registrar',['class'=>'btn btn-primary']);?>
                        <a href="<?=route_to('conferencias')?>" class="btn btn-danger">Cancelar</a>
                        </div>
                        <?=form_close();?>
                    </div>
                    <!-- /.card -->
                    </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
<?= $this->endSection();?>

<!-- JS especificos para cada vista -->
<?= $this->section("js")?>
<script src=<?= base_url(JQUERY_VALIDATION.'jquery.validate.min.js')?>></script>
<script src=<?= base_url(JQUERY_VALIDATION.'additional-methods.min.js')?>></script>
<script src=<?= base_url(ESPECIFICOS_JS.'conferencia_nueva.js')?>></script>
<script src=<?= base_url(ESPECIFICOS_JS.'funciones.js')?>></script>

<?= $this->endSection();?>

