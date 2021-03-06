<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

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

    $juegoJSON = get_curl('200/juego/'.$valorCompetencia.'/'.$usu_04);
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
                                    <li class="breadcrumb-item active" aria-current="page">JUEGOS</li>
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
                        <div class="row">
<?php
    if ($juegoJSON['code'] === 200) {
        foreach ($juegoJSON['data'] as $juegoKEY => $juegoVALUE) { 
?>
                            <div class="col-sm-12 col-md-4 col-lg-3">
                                <div class="card" style="height:250px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $juegoVALUE['equipo_local_nombre'].' '.$juegoVALUE['equipo_local_resultado_final'].' <br> vs <br> '.$juegoVALUE['equipo_visitante_nombre'].' '.$juegoVALUE['equipo_visitante_resultado_final']; ?></h4>
                                        <p class="card-text"> FASE: <?php echo $juegoVALUE['juego_fase']; ?> <br> ESTADO: <?php echo $juegoVALUE['juego_estado']; ?> <br> HORARIO: <?php echo $juegoVALUE['juego_horario']; ?></p>
                                        <a href="../public/lesion_crud.php?tipo=<?php echo $valorTipo; ?>&disciplina=<?php echo $valorDisciplina; ?>&competencia=<?php echo $valorCompetencia; ?>&categoria=<?php echo $valorCategoria;?>&equipo=<?php echo $usu_04; ?>&juego=<?php echo $juegoVALUE['juego_codigo']; ?>" class="btn btn-info" style="background-color:#005ea6; position:absolute; bottom: 20px;">Nueva Lesi&oacute;n</a>
                                    </div>
                                </div>
                            </div>
<?php
        }
    }
?>
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
    </body>
</html>