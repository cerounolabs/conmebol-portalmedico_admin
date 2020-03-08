<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_04 == 39393 && $_GET['categoria'] == 'OTHER'){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    if(isset($_GET['tipo'])){
        $valorTipo          = $_GET['tipo'];
    } else {
        $valorTipo          = 'COM';
    }

    if(isset($_GET['disciplina'])){
        $valorDisciplina    = $_GET['disciplina'];
    } else {
        $valorDisciplina    = 'FOOTBALL';
    }

    if(isset($_GET['competencia'])){
        $valorCompetencia   = $_GET['competencia'];
    } else {
        $valorCompetencia   = 0;
    }

    if(isset($_GET['categoria'])){
        $valorCategoria     = $_GET['categoria'];
    } else {
        $valorCategoria     = 'OTHER';
    }

    if(isset($_GET['equipo'])){
        $valorEquipo   = $_GET['equipo'];
    } else {
        $valorEquipo   = 0;
    }

    if(isset($_GET['juego'])){
        $valorJuego     = $_GET['juego'];
    } else {
        $valorJuego     = 0;
    }

    $dominioJSON        = get_curl('000');
    $subDominioJSON     = get_curl('100');
    $jugadorJSON        = get_curl('700/'.$valorCompetencia.'/'.$valorEquipo);
    $juegoJSON          = get_curl('200/juego/'.$valorCompetencia.'/'.$valorEquipo.'/'.$valorJuego);

    if ($juegoJSON['code'] == 200){
        $fecAct = date('Y-m-d');
        $fecJue = $juegoJSON['data'][0]['juego_cierra'];

//        if ($fecJue <  $fecAct){
//            header('Location: ../public/home.php?code=401&msg=Ya no se puede realizar mas cargar de lesión de este encuentro!');
//        }
    } else {
        header('Location: ../public/home.php?code=401&msg=Ya no se puede realizar mas cargar de lesión de este encuentro!');
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
        include '../include/menu.php';
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
                            <h4 class="page-title"><?php echo $usu_02.' - '.$usu_01; ?></h4>
                            <div class="d-flex align-items-center"></div>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../public/home.php">HOME</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../public/competencia.php?tipo=<?php echo $valorTipo; ?>&disciplina=<?php echo $valorDisciplina; ?>">COMPETENCIAS</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../public/juego.php?tipo=<?php echo $valorTipo; ?>&disciplina=<?php echo $valorDisciplina; ?>&competencia=<?php echo $valorCompetencia; ?>&categoria=<?php echo $valorCategoria; ?>">JUEGOS</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">LESI&Oacute;N</li>
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
                    <!-- row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body wizard-content">
                                    <h4 class="card-title">Carga de Lesi&oacute;n</h4>
                                    <h6 class="card-subtitle">Favor complete todos los campos posibles.</h6>
                                    <form method="post" action="../class/crud/lesion.php" class="validation-wizard wizard-circle m-t-40">
                                        <!-- Step 1 -->
                                        <h6>Datos del Clima</h6>
                                        <section>
                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Traslado</label>
                                                        <div class="mb-3">
<?php
    if ($dominioJSON['code'] === 200){
        $checked = '';

        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CAMPOTRASLADO'){
?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="var104_<?php echo $dominioVALUE['tipo_codigo']; ?>" name="var104" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="custom-control-input" <?php echo $checked; ?> required>
                                                                
                                                                <label class="custom-control-label" for="var104_<?php echo $dominioVALUE['tipo_codigo']; ?>"><img src="../<?php echo $dominioVALUE['tipo_path']; ?>" style="width:40px;"/> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                            </div>
<?php
                if ($checked == 'checked'){
                    $checked = '';
                }
            }
        }
    }
?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Clima</label>
                                                        <div class="mb-3">
<?php
    if ($dominioJSON['code'] === 200){
        $checked = '';

        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CAMPOCLIMA'){
?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="var101_<?php echo $dominioVALUE['tipo_codigo']; ?>" name="var101" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="custom-control-input" <?php echo $checked; ?> required>
                                                                
                                                                <label class="custom-control-label" for="var101_<?php echo $dominioVALUE['tipo_codigo']; ?>"><img src="../<?php echo $dominioVALUE['tipo_path']; ?>" style="width:40px;"/> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                            </div>
<?php
                if ($checked == 'checked'){
                    $checked = '';
                }
            }
        }
    }
?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Temperatura</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var102"><i class="ti-bolt-alt"></i></span>
                                                            </div>
                                                            <input type="number" id="var102" name="var102" value="20" min="0" max="100" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Distancia</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var103" name="var103" style="width:100%; height:40px;" aria-label="Distancia" aria-describedby="basic-var103" required>
                                                                <optgroup label="Distancia" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CAMPODISTANCIA'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Step 1 -->

                                        <!-- Step 2 -->
                                        <h6>Datos del Juego</h6>
                                        <section>
                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Jugador</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var201" name="var201" style="width:100%; height:40px;" aria-label="Jugador" aria-describedby="basic-var201" required>
                                                                <optgroup label="Jugador" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($jugadorJSON['code'] == 200){
        foreach ($jugadorJSON['data'] as $jugadorKEY => $jugadorVALUE) {
?>
                                                                    <option value="<?php echo $jugadorVALUE['jugador_codigo']; ?>"><?php echo $jugadorVALUE['jugador_completo']; ?></option>
<?php
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-9">
                                                    <div class="form-group">
                                                        <label>Minuto</label>
                                                        <div class="row">
                                                            <div class="col-11">
                                                                <fieldset class="m-t-20">
                                                                    <div class="form-group text-center">
                                                                        <div id="var203_slider" class="m-r-30"></div>
                                                                        </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-1">
                                                                <div class="input-group mb-3">
                                                                    <input type="number" id="var203" name="var203" class="form-control" style="height:40px;" aria-describedby="basic-var203" required readonly>
                                                                </div>
                                                            </div>
                                                        </div>   
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row pt-3">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Posici&oacute;n</label>
                                                        <div class="input-group mb-3">
<?php
    if ($dominioJSON['code'] === 200){
        $checked = '';

        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CAMPOPOSICION'){
?>
                                                            <div class="custom-control custom-radio" style="float:left;">
                                                                <input type="radio" id="var202_<?php echo $dominioVALUE['tipo_codigo']; ?>" name="var202" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="custom-control-input" <?php echo $checked; ?> required>
                                                                
                                                                <label class="custom-control-label" for="var202_<?php echo $dominioVALUE['tipo_codigo']; ?>"><img src="../<?php echo $dominioVALUE['tipo_path']; ?>" style="width:40px;"/> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                            </div>
<?php
                if ($checked == 'checked'){
                    $checked = '';
                }
            }
        }
    }
?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Step 2 -->

                                        <!-- Step 3 -->
                                        <h6>Datos de la Lesi&oacute;n</h6>
                                        <section>
                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Zona del Cuerpo</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var301" name="var301" style="width:100%; height:40px;" aria-label="Zona del Cuerpo" aria-describedby="basic-var301" required>
                                                                <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CUERPOPARTE'){
?>
                                                                <optgroup label="<?php echo $dominioVALUE['tipo_nombre_castellano']; ?>" style="background-color:#005ea6; color:#fff;">
<?php
                if ($subDominioJSON['code'] === 200){
                    foreach ($subDominioJSON['data'] as $subDominioKEY => $subDominioVALUE) {
                        if ($subDominioVALUE['tipo_sub_estado_codigo'] === 'A' && $subDominioVALUE['tipo_sub_dominio'] === 'CUERPOZONA' && $subDominioVALUE['tipo_codigo'] === $dominioVALUE['tipo_codigo']){
?>
                                                                    <option value="<?php echo $subDominioVALUE['tipo_sub_codigo']; ?>"><?php echo $subDominioVALUE['tipo_sub_nombre_castellano']; ?></option>
<?php
                        }
                    }
                }
?>
                                                                </optgroup>
<?php
            }
        }
    }
?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Lugar del Cuerpo</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var302" name="var302" style="width:100%; height:40px;" aria-label="Lugar del Cuerpo" aria-describedby="basic-var302" required>
                                                                <optgroup label="Lugar del Cuerpo" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CUERPOLUGAR'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Lesi&oacute;n Tipo</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var303" name="var303" style="width:100%; height:40px;" aria-label="Lesi&oacute;n Tipo" aria-describedby="basic-var303" required>
                                                                <optgroup label="Lesi&oacute;n Tipo" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONTIPO'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Lesi&oacute;n Origen</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var304" name="var304" style="width:100%; height:40px;" aria-label="Lesi&oacute;n Origen" aria-describedby="basic-var304" required>
                                                                <optgroup label="Lesi&oacute;n Origen" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONORIGEN'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Lesi&oacute;n Reincidencia</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var305" name="var305" style="width:100%; height:40px;" aria-label="Lesi&oacute;n Reincidencia" aria-describedby="basic-var305" required>
                                                                <optgroup label="Lesi&oacute;n Reincidencia" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONREINCIDENCIA'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Se retira del partido por Lesi&oacute;n</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var308" name="var308" style="width:100%; height:40px;" aria-label="Lesi&oacute;n Reincidencia" aria-describedby="basic-var308" required>
                                                                <optgroup label="Lesi&oacute;n Retiro" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONRETIRO'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Lesi&oacute;n Falta</label>
                                                        <div class="mb-3">
<?php
    if ($dominioJSON['code'] === 200){
        $checked = '';

        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONFALTA'){
?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="var307_<?php echo $dominioVALUE['tipo_codigo']; ?>" name="var307" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="custom-control-input" <?php echo $checked; ?> required>
                                                                
                                                                <label class="custom-control-label" for="var307_<?php echo $dominioVALUE['tipo_codigo']; ?>"><img src="../<?php echo $dominioVALUE['tipo_path']; ?>" style="width:40px;" /> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                            </div>
<?php
                if ($checked == 'checked'){
                    $checked = '';
                }
            }
        }
    }
?>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-3">
                                                    <div class="form-group">
                                                        <label>Lesi&oacute;n Causa</label>
                                                        <div class="mb-3">
<?php
    if ($dominioJSON['code'] === 200){
        $checked = '';

        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONCAUSA'){
?>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="var306_<?php echo $dominioVALUE['tipo_codigo']; ?>" name="var306" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="custom-control-input" <?php echo $checked; ?> required>
                                                                
                                                                <label class="custom-control-label" for="var306_<?php echo $dominioVALUE['tipo_codigo']; ?>"><img src="../<?php echo $dominioVALUE['tipo_path']; ?>" style="width:40px;"/> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                            </div>
<?php
                if ($checked == 'checked'){
                    $checked = '';
                }
            }
        }
    }
?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Step 3 -->

                                        <!-- Step 4 -->
                                        <h6>Datos del Diagnóstico</h6>
                                        <section>
                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Diagn&oacute;stico Tipo</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var401" name="var401" onblur="getDiagnostico(this.id);" style="width:100%; height:40px;" aria-label="Diagn&oacute;stico Tipo" aria-describedby="basic-var401" required>
                                                                <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'DIAGNOSTICOGRUPO'){
?>
                                                                <optgroup label="<?php echo $dominioVALUE['tipo_nombre_castellano']; ?>" style="background-color:#005ea6; color:#fff;">
<?php
                if ($subDominioJSON['code'] === 200){
                    foreach ($subDominioJSON['data'] as $subDominioKEY => $subDominioVALUE) {
                        if ($subDominioVALUE['tipo_sub_estado_codigo'] === 'A' && $subDominioVALUE['tipo_sub_dominio'] === 'DIAGNOSTICOTIPO' && $subDominioVALUE['tipo_codigo'] === $dominioVALUE['tipo_codigo']){
?>
                                                                    <option value="<?php echo $subDominioVALUE['tipo_sub_codigo']; ?>"><?php echo $subDominioVALUE['tipo_sub_nombre_castellano']; ?></option>
<?php
                        }
                    }
                }
?>
                                                                </optgroup>
<?php
            }
        }
    }
?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label>Tiempo de baja previsto</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control col-6" id="var402" name="var402" style="width:100%; height:40px;" aria-label="Diagn&oacute;stico Recuperaci&oacute;n" aria-describedby="basic-var402" required>
                                                                <optgroup label="Cantidad" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'DIAGNOSTICORECUPERACION'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        
                                                            <select class="custom-select form-control col-6" id="var403" name="var403" style="width:100%; height:40px;" aria-label="Diagn&oacute;stico Tiempo" aria-describedby="basic-var403" required>
                                                                <optgroup label="Tiempo" style="background-color:#005ea6; color:#fff;">
                                                                    <option selected disabled>SELECCIONAR...</option>
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'DIAGNOSTICOTIEMPO'){
?>
                                                                    <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Diagn&oacute;stico Comentario</label>
                                                        <div class="input-group mb-3">
                                                            <textarea id="var404" name="var404" class="form-control" rows="3" style="text-transform:uppercase;" aria-describedby="basic-var404" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="datCon01" class="row pt-5" style="display:none;">
                                                <h4 class="page-title" style="width:100%;">TIPO</h4>
<?php
    $indConTip = 0;

    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CONCUSIONTIPO'){
?>
                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                        <div class="input-group mb-3">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var501_S_<?php echo $indConTip; ?>" name="var501_<?php echo $indConTip; ?>" value="S_<?php echo $dominioVALUE['tipo_codigo']; ?>">    
                                                                <label class="custom-control-label" for="var501_S_<?php echo $indConTip; ?>">&nbsp;SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var501_N_<?php echo $indConTip; ?>" name="var501_<?php echo $indConTip; ?>" value="N_<?php echo $dominioVALUE['tipo_codigo']; ?>" checked>    
                                                                <label class="custom-control-label" for="var501_N_<?php echo $indConTip; ?>">&nbsp;NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<?php
                $indConTip = $indConTip + 1;
            }
        }
    }
?>
                                            </div>

                                            <div id="datCon02" class="row pt-5" style="display:none;">
                                                <h4 class="page-title" style="width:100%;">SIGNOS</h4>
<?php
    $indConSig = 0;

    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CONCUSIONSIGNO'){
?>
                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                        <div class="input-group mb-3">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var502_S_<?php echo $indConSig; ?>" name="var502_<?php echo $indConSig; ?>" value="S_<?php echo $dominioVALUE['tipo_codigo']; ?>">    
                                                                <label class="custom-control-label" for="var502_S_<?php echo $indConSig; ?>">&nbsp;SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var502_N_<?php echo $indConSig; ?>" name="var502_<?php echo $indConSig; ?>" value="N_<?php echo $dominioVALUE['tipo_codigo']; ?>" checked>    
                                                                <label class="custom-control-label" for="var502_N_<?php echo $indConSig; ?>">&nbsp;NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<?php
                $indConSig = $indConSig + 1;
            }
        }
    }
?>
                                            </div>

                                            <div id="datCon03" class="row pt-5" style="display:none;">
                                                <h4 class="page-title" style="width:100%;">PRUEBA DE MEMORIA. PREGUNTE</h4>
<?php
    $indConMen = 0;

    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CONCUSIONMEMORIA'){
?>
                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                        <div class="input-group mb-3">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var503_S_<?php echo $indConMen; ?>" name="var503_<?php echo $indConMen; ?>" value="S_<?php echo $dominioVALUE['tipo_codigo']; ?>">    
                                                                <label class="custom-control-label" for="var503_S_<?php echo $indConMen; ?>">&nbsp;SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var503_N_<?php echo $indConMen; ?>" name="var503_<?php echo $indConMen; ?>" value="N_<?php echo $dominioVALUE['tipo_codigo']; ?>" checked>    
                                                                <label class="custom-control-label" for="var503_N_<?php echo $indConMen; ?>">&nbsp;NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<?php
                $indConMen = $indConMen + 1;
            }
        }
    }
?>
                                            </div>

                                            <div id="datCon04" class="row pt-5" style="display:none;">
                                                <h4 class="page-title" style="width:100%;">SEGUIMIENTO</h4>

<?php
    $indConSeg = 0;
    
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'CONCUSIONSEGUIMIENTO'){
?>
                                                <div class="col-sm-12 col-md-6 col-lg-4">
                                                    <div class="form-group">
                                                        <label><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>
                                                        <div class="input-group mb-3">
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var504_S_<?php echo $indConSeg; ?>" name="var504_<?php echo $indConSeg; ?>" value="S_<?php echo $dominioVALUE['tipo_codigo']; ?>">    
                                                                <label class="custom-control-label" for="var504_S_<?php echo $indConSeg; ?>">&nbsp;SI&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input class="custom-control-input custom-radio-concusion" type="radio" id="var504_N_<?php echo $indConSeg; ?>" name="var504_<?php echo $indConSeg; ?>" value="N_<?php echo $dominioVALUE['tipo_codigo']; ?>" checked>    
                                                                <label class="custom-control-label" for="var504_N_<?php echo $indConSeg; ?>">&nbsp;NO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
<?php
                $indConSeg = $indConSeg + 1;
            }
        }
    }
?>
                                            </div>
                                        </section>
                                        <!-- Step 4 -->

                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <input type="hidden" id="workTipo" name="workTipo" value="<?php echo $valorTipo; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workDisciplina" name="workDisciplina" value="<?php echo $valorDisciplina; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workCompetencia" name="workCompetencia" value="<?php echo $valorCompetencia; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workEquipo" name="workEquipo" value="<?php echo $valorEquipo; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workJuego" name="workJuego" value="<?php echo $valorJuego; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workDiag1" name="workDiag1" value="<?php echo $indConTip; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workDiag2" name="workDiag2" value="<?php echo $indConSig; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workDiag3" name="workDiag3" value="<?php echo $indConMen; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                        <input type="hidden" id="workDiag4" name="workDiag4" value="<?php echo $indConSeg; ?>" class="form-control" placeholder="Temperatura ºC" style="height:40px;" aria-describedby="basic-var102">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Modal Procesar -->
                    <div id="modaldiv" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" id="modalcontent">
                        </div>
                    </div>
                    <!-- Modal Procesar -->
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

        <script src="../js/api.js"></script>
        
        <script>
            var form = $(".validation-wizard").show();

            $(".validation-wizard").steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                labels: {
                    finish: "Enviar",
                    previous: "Anterior",
                    next: "Siguiente"
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                },
                onFinishing: function(event, currentIndex) {
                    return form.validate().settings.ignore = ":disabled", form.valid()
                },
                onFinished: function(event, currentIndex) {
                    swal("Formulario enviado!", "Se realizo el envio del formulario de la lesión.");
                    form.submit();
                }
            }), $(".validation-wizard").validate({
                ignore: "input[type=hidden]",
                errorClass: "text-danger",
                successClass: "text-success",
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element)
                },
                rules: {
                    email: {
                        email: !0
                    }
                }
            })
            
            var minSlider = document.getElementById('var203_slider');

            noUiSlider.create(minSlider, {
                range: {
                    'min': [0],
                    'max': [120]
                },
                start: 0,
                step: 1,
                tooltips: true,
                format: wNumb({
                    decimals: 0
                }),
                connect: 'lower',
                orientation: 'horizontal',
                pips: {
                    mode: 'range',
                    density: 1
                }
            });

            var valueSlider = document.getElementById('var203');
            minSlider.noUiSlider.on('update', function (values, handle) {
                valueSlider.value = values[handle];
            });

            function getDiagnostico(codTipo){
                var codDiag = document.getElementById(codTipo);
                var datCon1 = document.getElementById('datCon01');
                var datCon2 = document.getElementById('datCon02');
                var datCon3 = document.getElementById('datCon03');
                var datCon4 = document.getElementById('datCon04');

                if (codDiag.value == 32){
                    datCon1.style.display   = '';
                    datCon2.style.display   = '';
                    datCon3.style.display   = '';
                    datCon4.style.display   = '';
                } else {
                    datCon1.style.display = 'none';
                    datCon2.style.display = 'none';
                    datCon3.style.display = 'none';
                    datCon4.style.display = 'none';
                }
            }
        </script>
    </body>
</html>