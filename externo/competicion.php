<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    $competicionJSON    = get_curl('200/competicion/medico/'.$usu_04.'/'.$log_04);
    $compAnhio          = date('Y');
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
    include '../include/menu_externo.php';
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
                                    <li class="breadcrumb-item active" aria-current="page">COMPETICIONES</li>
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
<?php
    for ($indAnhio = $compAnhio; $indAnhio >= 2020; $indAnhio--) {
        if($indAnhio != $compAnhio) {
?>
            <br>
            
            <div class="dropdown-divider" style="border-color:#163562;"></div>

            <br>
<?php
        }
?>
                <div class="row">
                    <div class="col-12">
                        <h4 class="card-title">Competiciones <?php echo $indAnhio; ?></h4>
                        <div class="row">

<?php
        if ($competicionJSON['code'] == 200) {
            foreach ($competicionJSON['data'] as $competicionKEY => $competicionVALUE) {
                if ($competicionVALUE['competicion_anho'] == $indAnhio) {
?>
                            <div class="col-md-2">
                                <div class="card" style="height:200px; padding:0px;">
                                    <a href="../externo/encuentro.php?competicion=<?php echo $competicionVALUE['competicion_codigo']; ?>" style="height:100%">
                                        <img class="card-img-top img-responsive" src="http://portalmedico.conmebol.com/<?php echo $competicionVALUE['competicion_imagen_path']; ?>" alt="<?php echo $competicionVALUE['competicion_nombre']; ?>" title="<?php echo $competicionVALUE['competicion_nombre']; ?>" style="height:100%">
                                    </a>
                                </div>
                            </div>
<?php
                }
            }
        }
?>
                        </div>
                    </div>
                </div>

<?php
    }
?>
                
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

        <script src="../js/api.js?<?php echo date('Ymd');?>"></script>
    </body>
</html>