<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';
    
   if(isset($_GET['codigo'])){
        $workper            = $_GET['codigo'];
        $personJSON         = get_curl('200/persona/codigo/'. $workper);
        $testJSON           = get_curl('200/persona/test/'. $workper);
        $testcantJSON       = get_curl('200/persona/testcantidad/'. $workper);
        $competicionJSON    = get_curl('200/persona/competicion/'. $workper);
        $tipotestJSON       = get_curl('000/dominio/EXAMENMEDICOTIPO');
  
        if ($personJSON['code'] == 200){
            $persona_dato_01    = $personJSON['data'][0]['persona_nombre'];
            $persona_dato_02    = $personJSON['data'][0]['persona_apellido'];
            $persona_dato_03    = $personJSON['data'][0]['persona_fecha_nacimiento_2'];
            $persona_dato_04    = $personJSON['data'][0]['persona_genero'];
            $persona_dato_05    = $personJSON['data'][0]['tipo_documento_numero'];
            $persona_dato_06    = $personJSON['data'][0]['persona_funcion'];
            $persona_dato_07    = $testJSON['data'][0]['persona_tipo_nombre'];

        } else {
            $persona_dato_01    = '';
            $persona_dato_02    = '';
            $persona_dato_03    = '';
            $persona_dato_04    = '';
            $persona_dato_05    = '';
            $persona_dato_06    = '';
            $persona_dato_07    = '';
            $persona_dato_08    = '';
        }
        
    } else {
        $workper            = 0;
    }
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
<?php
    include '../include/header.php';
?>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
<?php
    include '../include/menu_externo.php';
?>
       
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <div class="d-flex align-items-center"></div>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="javascript:void(0)">HOME</a>
                                    </li>

                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="../externo/competicion.php">COMPETICIONES</a>
                                    </li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Perfil</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">   
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
                            <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="http://portalmedico.conmebol.com/imagen/jugador/img_<?php echo $workper; ?>.jpeg" class="rounded-circle" width="150" alt="<?php echo $persona_dato_01.' - '.$persona_dato_02; ?>" />
                                    <h4 class="card-title m-t-10"><?php echo $persona_dato_01; ?></h4>
                                    <h6 class="card-subtitle"><?php echo $persona_dato_02; ?></h6>
                                </center>
                            </div>

                            <div>
                                <hr> 
                            </div>
                            
                            <div class="card-body">
                                <h4><small class="text-muted p-t-30 db">Nombre  y  Apellido</small></h4>
                                <h5><?php echo $persona_dato_01.' '.$persona_dato_02; ?></h5>

                                <h4><small class="text-muted p-t-30 db"> Documento</small></h4>
                                <h5><?php echo $persona_dato_05; ?></h5>

                                <h4><small class="text-muted p-t-30 db">Fecha Nacimiento </small></h4>
                                <h5><?php echo $persona_dato_03; ?></h5>
                                
                                <h4><small class="text-muted p-t-30 db">Sexo</small></h4>
                                <h5><?php echo $persona_dato_04; ?></h5>

                                <h4><small class="text-muted p-t-30 db">Posición</small></h4>
                                <h5><?php echo $persona_dato_06; ?></h5>

                                <h4><small class="text-muted p-t-30 db">Persona Tipo</small></h4>
                                <h5><?php echo $persona_dato_07; ?></h5>
            
                                <br/>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
<?php           
    if ($testcantJSON['code'] === 200){
        foreach ($testcantJSON['data'] as $testcantKEY => $testcantVALUE){
            $csschart01 = '';
            $csschartpor= '100%';

            switch ($testcantVALUE['tipo_test_codigo']) {
                case 3:
                    $csschart01 = 'bg-light-info';
                    $csschartcss= 'css-bar-info css-bar-100';
                    break;

                case 2:
                    $csschart01 = 'bg-light-danger';
                    $csschartcss= 'css-bar-danger css-bar-100';
                    break;

                case 1:
                    $csschart01 = 'bg-light-success';
                    $csschartcss= 'css-bar-success css-bar-100';
                    break;
            }
?>
                                    <div class="col-sm-4">
                                        <div class="card card <?php echo $csschart01; ?>">
                                            <div class="card-body">
                                                <div class="row p-t-10 p-b-10">
                                                    <div class="col p-r-0">
                                                        <h1 class="font-light" id="titPER01"><?php echo $testcantVALUE['cantidad_test']; ?></h1>
                                                        <h6 class="text-muted"><?php echo $testcantVALUE['tipo_test_nombre']; ?></h6>
                                                    </div>

                                                    <div class="col text-right align-self-center">
                                                        <div id="valPER01" class="css-bar m-b-0 <?php echo $csschartcss; ?>" data-label="<?php echo $csschartpor; ?>"><i class="mdi mdi-star-circle"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php      
        }
    }
?>
                                </div>
                            </div>
                        </div>
                            
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Tabs-->
                                    <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
<?php
    if($tipotestJSON['code'] == 200){
        $activeCSS = 'active show';

        foreach ($tipotestJSON['data'] as $tipotestKEY => $tipotestVALUE) {
?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo $activeCSS.'PRUEBAON'; ?>" id="pills-profile01<?php echo $tipotestVALUE['tipo_parametro']; ?>-tab" data-toggle="pill" href="#tab-profile01<?php echo $tipotestVALUE['tipo_parametro']; ?>" role="tab" aria-controls="pills-profile01" aria-selected="false"><?php echo $tipotestVALUE['tipo_nombre_castellano']; ?></a>
                                        </li>
<?php
            $activeCSS = '';
        }
    }
?>
                                    </ul>

                                    <!-- Tabs-->
                                    <div class="tab-content" id="pills-tabContent">
                            
                            
<?php
    if($testJSON['code'] == 200) {
        $activeCSS = 'active';

        foreach ($tipotestJSON['data'] as $tipotestKEY => $tipotestVALUE) {

?>
                                        <div class="tab-pane fade show <?php echo $activeCSS; ?>" id="tab-profile01<?php echo $tipotestVALUE['tipo_parametro']; ?>" role="tab" aria-labelledby="pills-profile01<?php echo $tipotestVALUE['tipo_parametro']; ?>-tab">
                                            <div class="card-body">
                                                <section>
<?php
            foreach ($testJSON['data'] as $testKEY => $testVALUE){
                if ($testVALUE['tipo_examen_parametro'] ==  $tipotestVALUE['tipo_parametro']){
?>


                                                    <div class="row">
<?php
                if ($testVALUE['examen_laboratorio_adjunto'] !=  ''){
?>
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Ver Resultado Adjunto</label>
                                                                <div class="input-group mb-3">
                                                                    <a href="http://portalmedico.conmebol.com/<?php echo $testVALUE['examen_laboratorio_adjunto']; ?>" Value=""  title="<?php echo 'Click para abrir'; ?>" target="_blank" type="button" class="btn btn-info btn-icon btn-circle" ><h4><i class="fa fa-file-pdf"></i></h4></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
<?php
                } else {
?>
                                                      <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">  
                                                            </div>
                                                        </div>
<?php
                        }
?>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Test Control</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-syringe"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_codigo']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Competición</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-trophy"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['competicion_nombre']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Equipo</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-flag"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['equipo_nombre']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Fecha realización de test</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_fecha_1_2']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Posición / Cargo</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-child"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_persona_posicion']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Camiseta Nro.</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-futbol"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_persona_camiseta']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Convocado</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-star"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_persona_convocado']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Personas Adultas</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class=" fas fa-female"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_cantidad_adulto']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Personas Menores</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fab fa-odnoklassniki"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_cantidad_menor']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Laboratorio de Test</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class=" far fa-hospital"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_laboratorio_nombre']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Recepción del Test</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_laboratorio_fecha_recepcion_2']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Resultado del Test</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class=" fas fa-bug"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_laboratorio_resultado']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Ingresa a cuarentena?</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class=" fas fa-stethoscope"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_laboratorio_cuarentena']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Inicio de aislamiento</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_laboratorio_fecha_aislamiento_2']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Fin de aislamiento</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $testVALUE['examen_laboratorio_fecha_finaliza_2']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

<?php
                    foreach ($testVALUE['examen_detalle'] as $key => $examendetalle) {
                        if	($examendetalle['examen_test_codigo']!= ''){
?>

                                                        <div class="col-sm-12 col-md-4">
                                                            <div class="form-group">
                                                                <label>Test <?php echo $examendetalle['tipo_test_nombre_castellano']; ?></label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="far fa-clipboard"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $examendetalle['examen_test_valor']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 col-md-8">
                                                            <div class="form-group">
                                                                <label>Comentario</label>
                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class=" far fa-comment"></i></span>
                                                                    </div>
                                                                    <input type="text" value="<?php echo $examendetalle['examen_test_observacion']; ?>" class="form-control" style="height:40px; text-transform:uppercase;" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
<?php
                        }
                    }
?>
                                                        <div class="col-sm-12">
                                                            <hr>
                                                        </div>
                                                    </div>
<?php
                }
            }
?>
                                                </section>
                                            </div>
                                        </div>

<?php
            $activeCSS = '';
        }
    }
?>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
   
                        <!-- ============================================================== -->
                        <!-- End Container fluid  -->
                        <!-- ============================================================== -->





<?php
    include '../include/development.php';
?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <div class="chat-windows"></div>

<?php
    include '../include/footer.php';
?>

</body>
</html>