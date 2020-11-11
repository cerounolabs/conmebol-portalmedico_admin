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

    if(isset($_GET['encuentro'])){
        $valorEncuentro     = $_GET['encuentro'];
    } else {
        $valorEncuentro     = 0;
    }

    $chart01JSON  = get_curl('801/examen/competicion/chart01/'.$usu_04.'/'.$valorCompeticion.'/174/'.$valorEncuentro);
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
                                        <a href="javascript:void(0)">HOME</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="../examen/competicion.php">COMPETICIONES</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="../examen/encuentro.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">CONTROL DE TEST</li>
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
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="col-sm-12 col-md-4 card-title">Control de TEST</h4>
                                    <h4 class="col-sm-12 col-md-8 card-title" style="text-align: right;">
<?php
    if ($usu_04 == 39393 && $usu_05 == 157){
?>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=O" role="button" title="Agregar"><i class="ti-plus"></i> ALTA OFICIALES </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=Z" role="button" title="Agregar"><i class="ti-plus"></i> ALTA ZONA 1 </a>
<?php
    } elseif ($usu_04 == 39393 && $usu_05 == 9) {
?>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=O" role="button" title="Agregar"><i class="ti-plus"></i> ALTA OFICIALES </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=T" role="button" title="Agregar"><i class="ti-plus"></i> ALTA CUERPO T&Eacute;CNICO </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=P" role="button" title="Agregar"><i class="ti-plus"></i> ALTA JUGADORES </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=Z" role="button" title="Agregar"><i class="ti-plus"></i> ALTA ZONA 1 </a>
<?php
    } else {
?>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=T" role="button" title="Agregar"><i class="ti-plus"></i> ALTA CUERPO T&Eacute;CNICO </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/covid19_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $valorEncuentro; ?>&tipo=P" role="button" title="Agregar"><i class="ti-plus"></i> ALTA JUGADORES </a>
<?php
    }
?>
                                	</h4>
								</div>

                                <div class="row">
 <?php           
    if ($chart01JSON['code'] === 200){
        $cantTot = 0;
        $cantEsp = 0;
        $cantAdj = 0;
        $cantPen = 0;

        foreach ($chart01JSON['data'] as $chart01KEY => $chart01VALUE){
            $csschart01 = '';
            $csschartpor= '100%';

            switch ($chart01VALUE['tipo_codigo']) {
                case 1:
                    $cantTot    = $chart01VALUE['cantidad_persona'];
                    $csschart01 = 'bg-light-info';
                    $csschartcss= 'css-bar-info css-bar-100';
                    break;
                
                case 207:
                    $cantEsp    = $chart01VALUE['cantidad_persona'];
                    $csschart01 = 'bg-light-warning';
                    $csschartcss= 'css-bar-warning css-bar-100';
                    break;

                case 208:
                    $cantAdj    = $chart01VALUE['cantidad_persona'];
                    $csschart01 = 'bg-light-success';
                    $csschartcss= 'css-bar-success css-bar-100';
                    break;

                case 211:
                    $csschart01 = 'bg-encu';
                    break;

                case 2:
                    $cantPen    = $chart01VALUE['cantidad_persona'];
                    $csschart01 = 'bg-light-danger';
                    $csschartcss= 'css-bar-danger css-bar-100';
                    break;
            }
            
            if ($chart01VALUE['tipo_codigo'] != 211){
 ?>
                                    <div class="col-sm-3">
                                            <div class="card card <?php echo $csschart01; ?>">
                                                <div class="card-body">
                                                    <div class="row p-t-10 p-b-10">
                                                        <div class="col p-r-0">
                                                            <h1 class="font-light" id="titPER01"><?php echo $chart01VALUE['cantidad_persona']; ?></h1>
                                                            <h6 class="text-muted"><?php echo $chart01VALUE['tipo_nombre']; ?></h6>
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
    }
 ?>
                                </div>

                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="2">TEST</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">COMPETICI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">ENCUENTRO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">EQUIPO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">JUGADOR</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">POSICI&Oacute;N / FUNCI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="5">LABORATORIO</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="3">AUDITORIA</th>
                                            </tr>
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;">ESTADO</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA</th>
                                                <th class="border-top-0" style="text-align:center;">NOMBRE</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA ENVIO</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA RECEPCI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center;">RESULTADO</th>
                                                <th class="border-top-0" style="text-align:center; width:80px;">&nbsp;</th>
                                                <th class="border-top-0" style="text-align:center;">USUARIO</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA HORA</th>
                                                <th class="border-top-0" style="text-align:center;">IP</th>
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

    <script>
        const _codPers = <?php echo $log_04; ?>;
        const _codEqui = <?php echo $usu_04; ?>;
        const _codComp = <?php echo $valorCompeticion; ?>;
        const _codEncu = <?php echo $valorEncuentro; ?>;
        const _codPerf = <?php echo $usu_05; ?>;
    </script>
    
    <script src="../js/api.js?<?php echo date('Ymd');?>"></script>
    <script src="../js/covid19.js?<?php echo date('Ymd');?>"></script>
</body>
</html>