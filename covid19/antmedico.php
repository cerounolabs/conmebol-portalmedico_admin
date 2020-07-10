<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 9 && $usu_05 != 11 && $usu_05 != 157){
//        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }
    
    $var04              = date('Y');
    $competenciaJSON    = get_curl('200/disciplina/'.$usu_04);
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
    	include '../include/menu_covid.php';
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
                                        <a href="../covid19/home.php">HOME</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">ANT. M&Eacute;DICO</li>
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
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                <form action="#">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var01">Periodo</label>
                                                    <input id="var01" name="var01" value="<?php echo $var04; ?>" onchange="" type="number" min="2019" max="<?php echo $var04; ?>" class="form-control" style="width:100%; height:40px;" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var02">Disciplina</label>
                                                    <select id="var02" name="var02" onchange="changeDisciplina(<?php echo $usu_04; ?>, 'var01', 'var02', 'var03');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        <optgroup label="Disciplina">
                                                            <option value="FOOTBALL">F&uacute;tbol de Campo</option>
                                                            <option value="FUTSAL">F&uacute;tbol de Sal&oacute;n</option>
                                                            <option value="BEACH_SOCCER">F&uacute;tbol de Playa</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var03">Competencia</label>
                                                    <select id="var03" name="var03" onchange="changeCompetencia(<?php echo $usu_04; ?>, 'var01', 'var03', 'var04');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var04">Encuentro</label>
                                                    <select id="var04" name="var04" onchange="changeJuego('var04', 'var05');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var05">Equipo</label>
                                                    <select id="var05" name="var05" onchange="changeEquipo('var03', 'var05', 'var06');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var06">Jugador</label>
                                                    <select id="var06" name="var06" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="col-6 card-title">COVID Control 01</h4>
                                    <h4 class="col-6 card-title" style="text-align: right;">
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../covid19/control_01_1_crud.php" role="button" title="Agregar"><i class="ti-plus"></i> ALTA MASIVA</a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../covid19/control_01_2_crud.php" role="button" title="Agregar"><i class="ti-plus"></i> ALTA INDIVIDUAL</a>
                                	</h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">FECHA</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">ESTADO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">JUEGO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">CARGO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">JUGADOR</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="4">PRUEBAS</th>
                                            </tr>

                                            <tr class="bg-conmebol">
                                                <th class="border-top-0">HISOPO</th>
                                                <th class="border-top-0">RAPIDA</th>
                                                <th class="border-top-0">IGM</th>
                                                <th class="border-top-0">IGG</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Procesar -->
                <div id="modal-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" id="modal-content">
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
        changeDisciplina(<?php echo $usu_04; ?>, 'var01', 'var02', 'var03');
        changeCompetencia(<?php echo $usu_04; ?>, 'var01', 'var03', 'var04');
        changeDisciplina(<?php echo $usu_04; ?>, 'var01', 'var002', 'var003');
    </script>
</body>
</html>