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

    if(isset($_GET['tipo'])){
        $valorTipo          = $_GET['tipo'];
    } else {
        $valorTipo          = 'P';
    }

    $dominioJSON    = get_curl('000');
    $juegoJSON      = get_curl('200/competicion/juego/'.$usu_04.'/'.$valorEncuentro);
    $equipoJSON     = get_curl('200/competicion/equipo/alta/'.$usu_04.'/'.$valorCompeticion.'/206/'.$valorEncuentro);
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
                                            <a href="../examen/competicion.php">COMPETICIONES</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/encuentro.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/sintomas.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>">S&Iacute;NTOMAS</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE TEST</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <form method="post" action="../class/crud/sintomas_2_crud.php" class="validation-wizard wizard-circle">
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
                                                        <label for="var100"> Fecha de s&iacute;ntomas </label>
                                                        <input id="var100" name="var100" max="<?php echo date('Y-m-d'); ?>" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Fecha Test" required>
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
                                                        <select id="var101" name="var101" class="select2 form-control custom-select" onchange="selectJugador(this.id, 'var102', 'var103', <?php echo $usu_04; ?>, <?php echo $valorCompeticion; ?>);" style="width:100%; height:40px;" required>
                                                            <option selected disabled>SELECCIONAR...</option>
<?php
    if ($equipoJSON['code'] === 200){
        foreach ($equipoJSON['data'] as $equipoKEY => $equipoVALUE) {
            if ($usu_04 == 39393) {
?>
                                                            <option value="<?php echo $equipoVALUE['jugador_codigo']; ?>"><?php echo $equipoVALUE['jugador_nombre'].' '.$equipoVALUE['jugador_apellido']; ?></option>
<?php
            } else {
                if ($equipoVALUE['jugador_tipo'] == $valorTipo) {
?>
                                                            <option value="<?php echo $equipoVALUE['jugador_codigo']; ?>"><?php echo $equipoVALUE['jugador_nombre'].' '.$equipoVALUE['jugador_apellido']; ?></option>
<?php
                }
            }
        }
    }
?>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var102">Posición</label>
                                                        <input id="var102" name="var102" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var103">Camiseta nro.</label>
                                                        <input id="var103" name="var103" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var104">Convocado</label>
                                                        <select id="var104" name="var104" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Convocado">
                                                                <option value="NO"> NO </option>
                                                                <option value="SI"> SI </option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                    </div>
                                                </div>

<?php
    if ($dominioJSON['code'] === 200){
        $indexTest = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'EXAMENMEDICOCOVID19SINTOMA'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var1051_<?php echo $indexTest; ?>" name="var1051_<?php echo $indexTest; ?>" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>
                                                        <label for="var1052_<?php echo $indexTest; ?>"> S&iacute;ntomas <?php echo ucwords(strtolower($dominioVALUE['tipo_nombre_castellano']), ' / '); ?> </label>
                                                        <select id="var1052_<?php echo $indexTest; ?>" name="var1052_<?php echo $indexTest; ?>" onchange="inputValid('var1052_<?php echo $indexTest; ?>', var1053_<?php echo $indexTest; ?>);" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Presento">
                                                                <option value="NO">NO</option>
                                                                <option value="SI">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-8">
                                                    <div class="form-group">
                                                        <label for="var1053_<?php echo $indexTest; ?>">Comentario</label>
                                                        <input id="var1053_<?php echo $indexTest; ?>" name="var1053_<?php echo $indexTest; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>
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
                                        <input class="form-control" type="hidden" id="workPage"         name="workPage"         value="sintomas_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=<?php echo $valorTipo; ?>&" required readonly>
                                        <input class="form-control" type="hidden" id="workTest"         name="workTest"         value="<?php echo $indexTest; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workCompeticion"  name="workCompeticion"  value="<?php echo $juegoJSON['data'][0]['competicion_codigo']; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workEncuentro"    name="workEncuentro"    value="<?php echo $valorEncuentro; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workEquipo"       name="workEquipo"       value="<?php echo $usu_04; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workAntExamen"    name="workAntExamen"    value="0" required readonly>
                                        <input class="form-control" type="hidden" id="workEstado"       name="workEstado"       value="0" required readonly>
                                        <input class="form-control" type="hidden" id="workTipo"         name="workTipo"         value="206" required readonly>
                                        <input class="form-control" type="hidden" id="workRegistro"     name="workRegistro"     value="0" required readonly>
                                    </div>

                                    <div class="card-body" style="">
                                        <button type="submit" type="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../examen/sintomas.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>"> Volver </a>
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
    </body>
</html>