<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 9 && $usu_05 != 10 && $usu_05 != 11 && $usu_05 != 157){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    $var04          = date('Y');
    $dominioJSON    = get_curl('000');
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
                                            <a href="../public/home.php">HOME</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../examen/antmedico.php">ANTECEDENTE M&Eacute;DICO PERSONAL</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE PRUEBA</li>
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
                    <form method="post" action="../class/crud/antmedico_2_crud.php" class="validation-wizard wizard-circle">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var101">Periodo</label>
                                                        <input id="var101" name="var101" value="<?php echo $var04; ?>" type="number" min="2019" max="<?php echo $var04; ?>" class="form-control" style="width:100%; height:40px;" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var102">Disciplina</label>
                                                        <select id="var102" name="var102" onchange="changeDisciplina(<?php echo $usu_04; ?>, 'var101', 'var102', 'var103');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Disciplina">
                                                                <option value="FOOTBALL">F&uacute;tbol de Campo</option>
                                                                <option value="FUTSAL">F&uacute;tbol de Sal&oacute;n</option>
                                                                <option value="BEACH_SOCCER">F&uacute;tbol de Playa</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var103">Competencia</label>
                                                        <select id="var103" name="var103" onchange="changeCompetencia(<?php echo $usu_04; ?>, 'var101', 'var103', 'var104');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var104">Encuentro</label>
                                                        <select id="var104" name="var104" onchange="changeJuego('var104', 'var105');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var105">Equipo</label>
                                                        <select id="var105" name="var105" onchange="changeEquipo('var103', 'var105', 'var201');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var106">Fecha Prueba</label>
                                                        <input id="var106" name="var106" class="form-control" type="date" style="text-transform:lowercase; height:40px;" placeholder="FECHA" required>
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
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="form-group">
                                                        <label for="var201">Persona</label>
                                                        <select id="var201" name="var201" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
<?php
    if ($dominioJSON['code'] === 200){
        $indAMed = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'COVID19ANTMEDICO'){
?>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <input id="var2021_<?php echo $indAMed; ?>" name="var2021_<?php echo $indAMed; ?>" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>
                                                        <label for="var2022_<?php echo $indAMed; ?>"> <?php echo $dominioVALUE['tipo_nombre_castellano']; ?> </label>
                                                        <select id="var2022_<?php echo $indAMed; ?>" name="var2022_<?php echo $indAMed; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Presento">
                                                                <option value="N">NO</option>
                                                                <option value="S">SI</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
<?php
                $indAMed = $indAMed + 1;
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
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="C" required readonly>
                                        <input id="workPage" name="workPage" class="form-control" type="hidden" placeholder="Modo" value="antmedico_2_crud.php" required readonly>
                                        <input id="workAMed" name="workAMed" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indAMed; ?>" required readonly>
                                    </div>
                                    <div class="card-body" style="">
                                        <button type="submit" type="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../examen/antmedico.php"> Volver </a>
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
        </script>
    </body>
</html>