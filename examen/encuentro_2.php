<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 9 && $usu_05 != 10 && $usu_05 != 11 && $usu_05 != 157){
        header('Location: ../examen/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    if(isset($_GET['competicion'])){
        $valorCompeticion               = $_GET['competicion'];
    } else {
        $valorCompeticion   = 0;
    }

    $equipoJSON  = get_curl('200/competicion/equipo/participante/'.$valorCompeticion);
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
                                        <a href="../examen/precompeticion.php">PRE-COMPETICIONES</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">ENCUENTROS</li>
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
    if ($equipoJSON['code'] === 200) {
        foreach ($equipoJSON['data'] as $equipoKEY => $equipoVALUE) { 
?>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="card" style="height:250px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $equipoVALUE['equipo_nombre']; ?></h4>
                                        <p class="card-text"> <?php echo $equipoVALUE['organizacion_nombre_corto']; ?> - <?php echo $equipoVALUE['organizacion_nombre']; ?> <br/> <img src="http://portalmedico.conmebol.com/<?php echo $equipoVALUE['organizacion_imagen_path']; ?>" style="height:100px;"></p>
                                        <div style="position:absolute; bottom:1.25rem; left:1.25rem;">
                                            <a href="../examen/precompeticion.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $equipoVALUE['equipo_codigo']; ?>" class="btn btn-info" style="background-color:#005ea6;"> Pre-Competici&oacute;n </a>
                                        </div>
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
        <script>
            localStorage.removeItem('examenPruebaJSON');
            localStorage.removeItem('jugadorJSON');
        </script>
    </body>
</html>