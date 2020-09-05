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

    if(isset($_GET['equipo'])){
        $valorEquipo        = $_GET['equipo'];
    } else {
        $valorEquipo        = 0;
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

                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE PERSONA</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <form method="post" action="../class/crud/precompeticion_3_crud.php" class="validation-wizard wizard-circle">
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
                                                        <label for="var101">TIPO</label>
                                                        <select id="var101" name="var101" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Tipo">
                                                                <option value="P">JUGADOR</option>
                                                                <option value="T">DELEGADO</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var102">NOMBRE</label>
                                                        <input id="var102" name="var102" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var103">APELLIDO</label>
                                                        <input id="var103" name="var103" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var104">GENERO</label>
                                                        <select id="var104" name="var104" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Tipo">
                                                                <option value="MALE">MALE</option>
                                                                <option value="FEMALE">FEMALE</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>FECHA NACIMIENTO</label>
                                                        <input id="var105" name="var105" class="form-control" type="date" style="text-transform:uppercase; height:40px;">
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label>POSICI&Oacute;N</label>
                                                        <input id="var106" name="var106" class="form-control" type="text" style="text-transform:uppercase; height:40px;">
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
                                    <div class="form-group">
                                        <input class="form-control" type="hidden" id="workCodigo"       name="workCodigo"       value="0" required readonly>
                                        <input class="form-control" type="hidden" id="workModo"         name="workModo"         value="C" required readonly>
                                        <input class="form-control" type="hidden" id="workPage"         name="workPage"         value="precompeticion_3_crud.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>&" required readonly>
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

    </body>
</html>