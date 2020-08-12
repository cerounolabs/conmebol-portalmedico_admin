<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 9 && $usu_05 != 10 && $usu_05 != 11 && $usu_05 != 157){
        header('Location: ../examen/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    if(isset($_GET['competicion'])){
        $valorCompeticion   = $_GET['competicion'];
    } else {
        $valorCompeticion   = 0;
    }

    if(isset($_GET['encuentro'])){
        $valorEncuentro     = $_GET['encuentro'];
    } else {
        $valorEncuentro     = 0;
    }

    $dominioJSON    = get_curl('000');
    $juegoJSON      = get_curl('200/competicion/juego/'.$usu_04.'/'.$valorEncuentro);
    $equipoJSON     = get_curl('200/competicion/equipo/alta/'.$usu_04.'/'.$valorCompeticion.'/177/'.$valorEncuentro);
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
    switch ($usu_05) {
        case 157:
            include '../include/menu_examen.php';
            break;
        
        default:
            include '../include/menu.php';
            break;
    }
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
                                            <a href="../examen/home.php">HOME</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/competicion.php">COMPETICI&Oacute;N</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/encuentro.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/antmedico.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>">ANTECEDENTE M&Eacute;DICO</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE TEST</li>
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
                    <form method="post" action="../class/crud/antmedico_1_crud.php" class="validation-wizard wizard-circle">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                        <div class="row">
                                            <h4 class="col-12 card-title">DATOS DEL ENCUENTRO</h4>
								        </div>
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Competicion </label>
                                                        <input class="form-control" value="<?php echo $juegoJSON['data'][0]['juego_fase']; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Competicion" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Rival </label>
                                                        <input class="form-control" value="<?php $rival = ($juegoJSON['data'][0]['equipo_local_codigo'] == $usu_04) ? str_replace('"', '', $juegoJSON['data'][0]['equipo_visitante_nombre']) : str_replace('"', '', $juegoJSON['data'][0]['equipo_local_nombre']); echo $rival; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Rival" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Fecha </label>
                                                        <input class="form-control" value="<?php echo $juegoJSON['data'][0]['juego_horario']; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Fecha" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Ciudad </label>
                                                        <input class="form-control" value="<?php echo $juegoJSON['data'][0]['juego_ciudad']; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Ciudad" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Estadio </label>
                                                        <input class="form-control" value="<?php echo $juegoJSON['data'][0]['juego_estadio']; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Estadio" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var102"> Fecha Realizaci&oacute;n de Test </label>
                                                        <input id="var102" name="var102" max="<?php echo date('Y-m-d'); ?>" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Fecha Test" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
    if ($equipoJSON['code'] === 200){
        $cantReg = 0;

        foreach ($equipoJSON['data'] as $equipoKEY => $equipoVALUE) {
?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="background-color:#ffffff; color:#005ea6;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var101_<?php echo $cantReg; ?>">Persona</label>
                                                        <select id="var101_<?php echo $cantReg; ?>" name="var101_<?php echo $cantReg; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <option value="<?php echo $equipoVALUE['jugador_codigo']; ?>"><?php echo $equipoVALUE['jugador_nombre'].' '.$equipoVALUE['jugador_apellido'] ?></option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>Posición</label>
                                                        <input value="<?php echo $equipoVALUE['jugador_posicion']; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>Nro Camiseta</label>
                                                        <input value="<?php echo $equipoVALUE['jugador_numero']; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>

<?php
            if ($dominioJSON['code'] === 200){
                $indAntMed = 0;

                foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                    if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'EXAMENMEDICOANTMEDICO'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var1031_<?php echo $indAntMed; ?>_<?php echo $cantReg; ?>" name="var1031_<?php echo $indAntMed; ?>_<?php echo $cantReg; ?>" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>
                                                        <label for="var1032_<?php echo $indAntMed; ?>_<?php echo $cantReg; ?>"> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?> </label>
                                                        <select id="var1032_<?php echo $indAntMed; ?>_<?php echo $cantReg; ?>" name="var1032_<?php echo $indAntMed; ?>_<?php echo $cantReg; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Presento">
                                                                <option value="N">NO</option>
                                                                <option value="S">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
<?php
                        $indAntMed = $indAntMed + 1;
                    }
                }
            }
?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
            $cantReg = $cantReg + 1;
        }
    }
?>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="0" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="C" required readonly>
                                        <input id="workPage" name="workPage" class="form-control" type="hidden" placeholder="Modo" value="antmedico_1_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&" required readonly>
                                        <input id="workAntMedico" name="workAntMedico" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indAntMed; ?>" required readonly>
                                        <input id="workCompeticion" name="workCompeticion" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $juegoJSON['data'][0]['competicion_codigo']; ?>" required readonly>
                                        <input id="workEncuentro" name="workEncuentro" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $valorEncuentro; ?>" required readonly>
                                        <input id="workEquipo" name="workEquipo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $usu_04; ?>" required readonly>
                                        <input id="workAntExamen" name="workAntExamen" class="form-control" type="hidden" placeholder="Modo" value="0" required readonly>
                                        <input id="workEstado" name="workEstado" class="form-control" type="hidden" placeholder="Modo" value="0" required readonly>
                                        <input id="workTipo" name="workTipo" class="form-control" type="hidden" placeholder="Modo" value="177" required readonly>
                                        <input id="workCRegistro" name="workCRegistro" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $cantReg; ?>" required readonly>
                                    </div>
                                    <div class="card-body" style="">
                                        <button type="submit" type="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../examen/antmedico.php?competicion=<?php echo $valorCompeticion;?>&encuentro=<?php echo $valorEncuentro; ?>"> Volver </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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
    </body>
</html>