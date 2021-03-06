<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 9 && $usu_05 != 10 && $usu_05 != 11 && $usu_05 != 157){
        header('Location: ../examen/competicion.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    if(isset($_GET['competicion'])){
        $valorCompeticion   = $_GET['competicion'];
    } else {
        $valorCompeticion   = 0;
    }

    if(isset($_GET['equipo'])){
        $valorEquipo        = $_GET['equipo'];
    } else {
        $valorEquipo        = 0;
    }

    if(isset($_GET['tipo'])){
        $valorTipo          = $_GET['tipo'];
    } else {
        $valorTipo          = 'P';
    }

    switch ($valorTipo) {
        case 'T':
            $tit102 = 'Cargo';
            $tit103 = '';
            break;

        case 'P':
            $tit102 = 'Posición';
            $tit103 = 'Camiseta nro.';
            break;

        case 'Z':
            $tit102 = 'Función';
            $tit103 = 'Documento';
            break;

        case 'O':
            $tit102 = 'Posición';
            $tit103 = '';
            break;
    }

    $valorEncuentro = 0;
    $dominioJSON    = get_curl('000');

    if ($valorEquipo == 39393) {
        $equipoJSON     = get_curl('100/equipo/codigo/1');
    } else {
        $equipoJSON     = get_curl('100/equipo/codigo/'.$valorEquipo);
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
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

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

            <div class="page-wrapper">
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
                                            <a href="javascript:void(0)">HOME</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/competicion_2.php">COMPETICIONES</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/encuentro_2.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/precompeticion.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>">PRE-ENCUENTRO TEST</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE TEST</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <form method="post" action="../class/crud/precompeticion_2_crud.php" class="validation-wizard wizard-circle">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                        <div class="row">
                                            <h4 class="col-12 card-title">DATOS DEL EQUIPO</h4>
								        </div>

                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Organizaci&oacute;n </label>
                                                        <input class="form-control" value="<?php echo $equipoJSON['data'][0]['organizacion_nombre']; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Organización" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var110"> Equipo </label>
                                                        <select id="var110" name="var110" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <option value="<?php echo $valorEquipo; ?>"> <?php echo $equipoJSON['data'][0]['equipo_nombre']; ?> </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label> Ciudad </label>
                                                        <input class="form-control" value="<?php echo $equipoJSON['data'][0]['equipo_pais'].' - '.$equipoJSON['data'][0]['equipo_ciudad']; ?>" type="text" style="text-transform:uppercase; height:40px;" placeholder="Ciudad" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var100"> Fecha realizaci&oacute;n de test </label>
                                                        <input id="var100" name="var100" max="<?php echo date('Y-m-d'); ?>" onblur="inputChange('var100', 'var109');" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Fecha Test" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var108"> Laboratorio de test </label>
                                                        <input id="var108" name="var108" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="Laboratorio de test" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var109"> Envio al laboratorio </label>
                                                        <input id="var109" name="var109" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Envio al laboratorio" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="background-color:#ffffff; color:#005ea6;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var101">Persona</label>
                                                        <select id="var101" name="var101" class="select2 form-control custom-select" onchange="selectJugador2(this.id, 'var102', 'var103', 'var110', <?php echo $valorCompeticion; ?>, <?php echo $valorEncuentro; ?>, 210, '<?php echo $valorTipo; ?>');" style="width:100%; height:40px;" required></select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var102"><?php echo $tit102; ?></label>
                                                        <input id="var102" name="var102" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>
<?php
    if ($valorTipo == 'P' || $valorTipo == 'Z'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var103"><?php echo $tit103; ?></label>
                                                        <input id="var103" name="var103" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>
<?php
    }
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var106">Convocado</label>
                                                        <select id="var106" name="var106" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Convocado">
                                                                <option value="NO">NO</option>
                                                                <option value="SI">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
<?php
    if ($valorTipo == 'P' || $valorTipo == 'Z'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                    </div>
                                                </div>
<?php
    }
?>

<?php
    if ($dominioJSON['code'] === 200){
        $indexTest = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'EXAMENMEDICOCOVID19SEROLOGIA'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var1071_<?php echo $indexTest; ?>" name="var1071_<?php echo $indexTest; ?>" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>
                                                        <label for="var1072_<?php echo $indexTest; ?>"> TEST <?php echo strtoupper($dominioVALUE['tipo_nombre_castellano']); ?> </label>
                                                        <select id="var1072_<?php echo $indexTest; ?>" name="var1072_<?php echo $indexTest; ?>" onchange="inputValid('var1072_<?php echo $indexTest; ?>', var1073_<?php echo $indexTest; ?>);" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Presento">
                                                                <option value="NO">NO</option>
                                                                <option value="SI">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="var1073_<?php echo $indexTest; ?>">Comentario</label>
                                                        <input id="var1073_<?php echo $indexTest; ?>" name="var1073_<?php echo $indexTest; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>
<?php
                $indexTest = $indexTest + 1;
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

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" id="workCodigo"       name="workCodigo"       value="0" required readonly>
                                        <input class="form-control" type="hidden" id="workModo"         name="workModo"         value="C" required readonly>
                                        <input class="form-control" type="hidden" id="workPage"         name="workPage"         value="precompeticion_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>&tipo=<?php echo $valorTipo; ?>&" required readonly>
                                        <input class="form-control" type="hidden" id="workTest"         name="workTest"         value="<?php echo $indexTest; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workCompeticion"  name="workCompeticion"  value="<?php echo $valorCompeticion; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workEncuentro"    name="workEncuentro"    value="<?php echo $valorEncuentro; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workEquipo"       name="workEquipo"       value="<?php echo $valorEquipo; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workAntExamen"    name="workAntExamen"    value="0" required readonly>
                                        <input class="form-control" type="hidden" id="workEstado"       name="workEstado"       value="207" required readonly>
                                        <input class="form-control" type="hidden" id="workTipo"         name="workTipo"         value="210" required readonly>
                                        <input class="form-control" type="hidden" id="workRegistro"     name="workRegistro"     value="0" required readonly>
                                    </div>

                                    <div class="card-body" style="">
                                        <button type="submit" type="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../examen/precompeticion.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>"> Volver </a>
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
                </div>

<?php
    include '../include/development.php';
?>

            </div>
        </div>

        <div class="chat-windows"></div>
        
<?php
    include '../include/footer.php';
?>

        <script src="../js/api.js?<?php echo date('Ymd');?>"></script>
        <script src="../js/select.js?<?php echo date('Ymd');?>"></script>
        
        <script>
            selectEquipo(<?php echo $valorCompeticion; ?>, <?php echo $valorEncuentro; ?>, 'var110', 210, '<?php echo $valorTipo; ?>', 'var101');
        </script>
    </body>
</html>