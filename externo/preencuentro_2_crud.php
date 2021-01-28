<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

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

    $dominioJSON    = get_curl('000');
    $juegoJSON      = get_curl('200/competicion/juego/'.$usu_04.'/'.$valorEncuentro);
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
    include '../include/menu_externo.php';
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
                                            <a href="../externo/competicion.php">COMPETICIONES</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../externo/encuentro.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                        </li>

                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../externo/preencuentro.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>">PRE-ENCUENTRO TEST</a>
                                        </li>

                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE TEST</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <form method="post" action="../class/crud/preencuentro_2_crud.php" enctype="multipart/form-data" class="validation-wizard wizard-circle">
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
                                                        <label for="var110"> Equipo </label>
                                                        <select id="var110" name="var110" onchange="selectEquipo(<?php echo $juegoJSON['data'][0]['competicion_codigo']; ?>, <?php echo $valorEncuentro; ?>, 'var110', 174, '<?php echo $valorTipo; ?>', 'var101');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <option selected disabled>SELECCIONAR...</option>
                                                            <option value="<?php echo $usu_04; ?>"><?php echo $juegoJSON['data'][0]['equipo_local_nombre'].' VS '.$juegoJSON['data'][0]['equipo_visitante_nombre']; ?></option>
                                                        </select>
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
                                                        <label for="var101">Personas</label>
                                                        <select id="var101" name="var101" class="select2 form-control custom-select" onchange="selectJugador2(this.id, 'var102', 'var103', 'var110', <?php echo $valorCompeticion; ?>, <?php echo $valorEncuentro; ?>, 174, '<?php echo $valorTipo; ?>');" style="width:100%; height:40px;" required></select>
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
    } else {
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var103" name="var103" value="0" class="form-control" type="hidden" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>
<?php
    }
?>

<?php
    if ($valorTipo != 'Z'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var104">Personas adultas</label>
                                                        <select id="var104" name="var104" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Cantidad">
                                                                <option value="0">Vive solo</option>
                                                                <option value="1">1 Persona</option>
                                                                <option value="2">2 Persona</option>
                                                                <option value="3">3 Persona</option>
                                                                <option value="4">4 Persona</option>
                                                                <option value="5">5 Persona</option>
                                                                <option value="6">6 Persona</option>
                                                                <option value="7">7 Persona</option>
                                                                <option value="8">8 Persona</option>
                                                                <option value="9">9 Persona</option>
                                                                <option value="10">10 Persona</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var105">Personas menores</label>
                                                        <select id="var105" name="var105" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Cantidad">
                                                                <option value="0">Vive solo</option>
                                                                <option value="1">1 Persona</option>
                                                                <option value="2">2 Persona</option>
                                                                <option value="3">3 Persona</option>
                                                                <option value="4">4 Persona</option>
                                                                <option value="5">5 Persona</option>
                                                                <option value="6">6 Persona</option>
                                                                <option value="7">7 Persona</option>
                                                                <option value="8">8 Persona</option>
                                                                <option value="9">9 Persona</option>
                                                                <option value="10">10 Persona</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

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
    } else {
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

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var104" name="var104" value="0" class="form-control" type="hidden" style="text-transform:uppercase; height:40px;" readonly>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var105" name="var105" value="0" class="form-control" type="hidden" style="text-transform:uppercase; height:40px;" readonly>
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

<?php
    if ($valorTipo == 'Z' || $valorTipo == 'O'){
?>

                                                <div class="col-sm-12 col-md-4">
						                            <div class="form-group">
						                             <label for="var111">Ya cuenta con los resultados? </label>
                                                        <select id="var111" name="var111" class="select2 form-control custom-select" onchange="inputSelect(this.id, var111); inputSelect(this.id, var112); inputSelect(this.id, var113); inputSelect(this.id, var114); inputValid(this.id, var117);" style="width:100%; height:40px;" required>
                                                            <option value="NO" selected>NO</option>
                                                            <option value="SI">SI</option>                                                           
                                                        </select>
						                            </div>
						                        </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var112">Recepción del test</label>
                                                        <input id="var112" name="var112" class="form-control"  type="date" style="text-transform:uppercase; height:40px;" placeholder="Recepción del test" required disabled>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
						                            <div class="form-group">
						                             <label for="var113">Resultado del test</label>
                                                        <select id="var113" name="var113" class="select2 form-control custom-select" onchange="inputSelect(this.id, var115); inputSelect(this.id, var116); inputSelect(this.id, var117); inputSelect(this.id, var118); inputValid(this.id, var117);" style="width:100%; height:40px;" required disabled>
                                                            <optgroup label="Resultado">
                                                                <option value="NO" selected>NEGATIVO</option>
                                                                <option value="SI">POSITIVO</option>
                                                            </optgroup>
                                                        </select>
						                            </div>
						                        </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var114">Adjuntar resultado</label>
                                                        <input id="var114" name="var114" class="form-control" type="file" style="text-transform:uppercase; height:40px;" placeholder="Resultado" required disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var115">Ingresa a cuarentena?</label>
                                                        <select id="var115" name="var115" class="select2 form-control custom-select" style="width:100%; height:40px;" disabled>
                                                            <optgroup label="Estado">
                                                                <option value="NO" selected>NO</option>
                                                                <option value="SI">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
						                        </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var116">Nuevo test?</label>
                                                        <select id="var116" name="var116" class="select2 form-control custom-select" style="width:100%; height:40px;" disabled>
                                                            <optgroup label="Estado">
                                                                <option value="NO" selected>NO</option>
                                                                <option value="SI">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var117">Inicio de aislamiento</label>
                                                        <input id="var117" name="var117" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Inicio de aislamiento" disabled>
                                                    </div>
						                        </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var118">Fin de aislamiento</label>
                                                        <input id="var118" name="var118" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Fin de aislamiento" disabled>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="input-group mb-3">
                                                        <input type="hidden" id="var119" name="var119" class="form-control" value="208" style="height:40px; text-transform:lowercase;">
                                                    </div>
                                                </div>
<?php
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
                                        <input class="form-control" type="hidden" id="workPage"         name="workPage"         value="externo/preencuentro_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=<?php echo $valorTipo; ?>&" required readonly>
                                        <input class="form-control" type="hidden" id="workTest"         name="workTest"         value="<?php echo $indexTest; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workCompeticion"  name="workCompeticion"  value="<?php echo $juegoJSON['data'][0]['competicion_codigo']; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workEncuentro"    name="workEncuentro"    value="<?php echo $valorEncuentro; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workEquipo"       name="workEquipo"       value="<?php echo $usu_04; ?>" required readonly>
                                        <input class="form-control" type="hidden" id="workAntExamen"    name="workAntExamen"    value="0" required readonly>
                                        <input class="form-control" type="hidden" id="workEstado"       name="workEstado"       value="207" required readonly>
                                        <input class="form-control" type="hidden" id="workTipo"         name="workTipo"         value="174" required readonly>
                                        <input class="form-control" type="hidden" id="workRegistro"     name="workRegistro"     value="0" required readonly>
                                    </div>

                                    <div class="card-body">
                                        <button type="submit" name="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../externo/preencuentro.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>"> Volver </a>
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
    </body>
</html>