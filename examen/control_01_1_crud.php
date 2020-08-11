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
    $equipoJSON     = get_curl('200/competicion/equipo/'.$usu_04.'/'.$valorCompeticion);
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
                                            <a href="../examen/competicion.php">COMPETICIONES</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/encuentro.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/control_01.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>">COVID19 TEST</a>
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
                    <form method="post" action="../class/crud/control_01_1_crud.php" class="validation-wizard wizard-circle">
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

                        <div id="divjugador">

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="C" required readonly>
                                        <input id="workPage" name="workPage" class="form-control" type="hidden" placeholder="Modo" value="control_01_1_crud.php" required readonly>
                                        <input id="workSPers" name="workSPers" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSinPers; ?>" required readonly>
                                        <input id="workSFam" name="workSFam" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSinFam; ?>" required readonly>
                                        <input id="workSerologia" name="workSerologia" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSerolgia; ?>" required readonly>
                                    </div>
                                    <div class="card-body" style="">
                                        <button type="submit" type="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../examen/control_01.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>"> Volver </a>
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

        <script>
            changeDisciplina(<?php echo $usu_04; ?>, 'var101', 'var102', 'var103');
            changeCompetencia(<?php echo $usu_04; ?>, 'var101', 'var103', 'var104');

            function loadDiv(var01, var02) {
                var html    = '';
                var selSer  = '';
                var selEqu  = document.getElementById(var01);
                var selCom  = document.getElementById(var02);
                var xJSON   = getJugador(selCom.value, selEqu.value);
                var xJSON1  = getDominio('EXAMENMEDICOCOVID19SINTOMA');
                var cantReg = 0;

                xJSON1.forEach(element1 => {
					if (element1.tipo_estado_codigo == 'A') {
						selSer = selSer + '                               <option value="'+ element1.tipo_codigo +'">'+ element1.tipo_nombre_castellano +'</option>';
					}
				});

                xJSON.forEach(element => {
                        html = html +
                            '            <div class="row">'+
                            '               <div class="col-12">'+
                            '                   <div class="card">'+
                            '                       <div class="card-body" style="background-color:#ffffff; color:#005ea6;">'+
                            '                           <div class="form-body">'+
                            '                               <div class="row">'+
                            '                                   <div class="col-sm-12 col-md-6">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var201_'+ cantReg +'">Nombre</label>'+
                            '                                           <select id="var201_'+ cantReg +'" name="var201_'+ cantReg +'" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                                   <option value="'+ element.jugador_codigo +'"> '+ element.jugador_completo +'</option>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var202_'+ cantReg +'">Personas Adultas</label>'+
                            '                                           <select id="var202_'+ cantReg +'" name="var202_'+ cantReg +'" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                               <optgroup label="Cantidad">'+
                            '                                                   <option value="0">Vive solo</option>'+
                            '                                                   <option value="1">1 Persona</option>'+
                            '                                                   <option value="2">2 Persona</option>'+
                            '                                                   <option value="3">3 Persona</option>'+
                            '                                                   <option value="4">4 Persona</option>'+
                            '                                                   <option value="5">5 Persona</option>'+
                            '                                                   <option value="6">6 Persona</option>'+
                            '                                                   <option value="7">7 Persona</option>'+
                            '                                                   <option value="8">8 Persona</option>'+
                            '                                                   <option value="9">9 Persona</option>'+
                            '                                                   <option value="10">10 Persona</option>'+
                            '                                               </optgroup>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var203_'+ cantReg +'"> Personas Menores </label>'+
                            '                                           <select id="var203_'+ cantReg +'" name="var203_'+ cantReg +'" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                               <optgroup label="Cantidad">'+
                            '                                                   <option value="0">Vive solo</option>'+
                            '                                                   <option value="1">1 Persona</option>'+
                            '                                                   <option value="2">2 Persona</option>'+
                            '                                                   <option value="3">3 Persona</option>'+
                            '                                                   <option value="4">4 Persona</option>'+
                            '                                                   <option value="5">5 Persona</option>'+
                            '                                                   <option value="6">6 Persona</option>'+
                            '                                                   <option value="7">7 Persona</option>'+
                            '                                                   <option value="8">8 Persona</option>'+
                            '                                                   <option value="9">9 Persona</option>'+
                            '                                                   <option value="10">10 Persona</option>'+
                            '                                               </optgroup>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                               </div>'+
                            '                               <div class="row">'+
<?php
    if ($dominioJSON['code'] === 200){
        $indSerolgia = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'COVID19SEROLOGIA'){
?>
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <input id="var2041_<?php echo $indSerolgia; ?>_'+ cantReg +'" name="var2041_<?php echo $indSerolgia; ?>_'+ cantReg +'" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" required readonly>'+
                            '                                           <label for="var2042_<?php echo $indSerolgia; ?>_'+ cantReg +'"> TEST <?php echo $dominioVALUE['tipo_nombre_castellano']; ?> </label>'+
                            '                                           <select id="var2042_<?php echo $indSerolgia; ?>_'+ cantReg +'" name="var2042_<?php echo $indSerolgia; ?>_'+ cantReg +'" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                               <optgroup label="Presento">'+
                            '                                                   <option value="N">NO</option>'+
                            '                                                   <option value="S">SI</option>'+
                            '                                               </optgroup>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
<?php
                $indSerolgia = $indSerolgia + 1;
            }
        }
    }
?>
                            '                               </div>'+
                            '                               <div class="row">'+
                            '                                   <div class="col-sm-12 col-md-6">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var205_'+ cantReg +'">S&iacute;ntomas Personales</label>'+
<?php
    if ($dominioJSON['code'] === 200){
        $indSinPers = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'COVID19SINTOMA'){
?>
                            '                                           <div class="custom-control custom-checkbox">'+
                            '                                               <input id="var2051_<?php echo $indSinPers; ?>_'+ cantReg +'" name="var2051_<?php echo $indSinPers; ?>_'+ cantReg +'" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
                            '                                               <input type="checkbox" class="custom-control-input" id="var2052_<?php echo $indSinPers; ?>_'+ cantReg +'" name="var2052_<?php echo $indSinPers; ?>_'+ cantReg +'">'+
                            '                                               <label class="custom-control-label" for="var2052_<?php echo $indSinPers; ?>_'+ cantReg +'"> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?> </label>'+
                            '                                           </div>'+
<?php
                $indSinPers = $indSinPers + 1;
            }
        }
    }
?>
                            '                                       </div>'+
                            '                                   </div>'+
                            '                                   <div class="col-sm-12 col-md-6">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var206_'+ cantReg +'">S&iacute;ntomas Familiares</label>'+
<?php
    if ($dominioJSON['code'] === 200){
        $indSinFam = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'COVID19SINTOMA'){
?>
                            '                                           <div class="custom-control custom-checkbox">'+
                            '                                               <input id="var2061_<?php echo $indSinFam; ?>_'+ cantReg +'" name="var2061_<?php echo $indSinFam; ?>_'+ cantReg +'" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
                            '                                               <input type="checkbox" class="custom-control-input" id="var2062_<?php echo $indSinFam; ?>_'+ cantReg +'" name="var2062_<?php echo $indSinFam; ?>_'+ cantReg +'">'+
                            '                                               <label class="custom-control-label" for="var2062_<?php echo $indSinFam; ?>_'+ cantReg +'"> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?> </label>'+
                            '                                           </div>'+
<?php
                $indSinFam = $indSinFam + 1;
            }
        }
    }
?>
                            '                                       </div>'+
                            '                                   </div>'+
                            '                               </div>'+
                            '                           </div>'+
                            '                       </div>'+
                            '                   </div>'+
                            '               </div>'+
                            '               <div class="form-group">'+
                            '                   <input id="workSPers" name="workSPers_'+ cantReg +'" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSinPers; ?>" required readonly>'+
                            '                   <input id="workSFam" name="workSFam_'+ cantReg +'" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSinFam; ?>" required readonly>'+
                            '                   <input id="workSerologia" name="workSerologia_'+ cantReg +'" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSerolgia; ?>" required readonly>'+
                            '               </div>'+
                            '            </div>';

                        cantReg = cantReg + 1;
                });

                html = html +
                    '               <div class="form-group">'+
                    '                   <input id="workCJug" name="workCJug" class="form-control" type="hidden" placeholder="Modo" value="'+ cantReg +'" required readonly>'+
                    '               </div>';

                $("#divjugador").empty();
                $("#divjugador").append(html);
            }
        </script>
    </body>
</html>