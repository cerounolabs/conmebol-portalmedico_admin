<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if(isset($_GET['code'])){
        $codeRest       = $_GET['code'];
        $msgRest        = $_GET['msg'];
    } else {
        $codeRest       = 0;
        $msgRest        = '';
    }

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
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="../public/juego.php?tipo=<?php echo $valorTipo; ?>&disciplina=<?php echo $valorDisciplina; ?>&competencia=<?php echo $valorCompetencia; ?>">JUEGOS</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">LESIONES</li>
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
                                    <h4 class="col-10 card-title">Lesiones</h4>
                                    <h4 class="col-2 card-title" style="text-align: right;">
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../public/lesion_crud.php?mode=C&codigo=0&competencia=<?php echo $valorCompetencia; ?>" role="button" title="Agregar"><i class="ti-plus"></i></a>
                                	</h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-light">
                                                <th class="border-top-0">EQUIPO C&Oacute;D.</th>
                                                <th class="border-top-0">EQUIPO ESTADO</th>
                                                <th class="border-top-0">EQUIPO TIPO</th>
                                                <th class="border-top-0">EQUIPO</th>
                                                <th class="border-top-0">EQUIPO ABR.</th>
                                                <th class="border-top-0">EQUIPO PA&Iacute;S</th>
                                                <th class="border-top-0">EQUIPO REGI&Oacute;N</th>
                                                <th class="border-top-0">EQUIPO CIUDAD</th>
                                                <th class="border-top-0">EQUIPO C&Oacute;DIGO POSTAL</th>
                                                <th class="border-top-0">ORGANIZACI&Oacute;N C&Oacute;D.</th>
                                                <th class="border-top-0">ORGANIZACI&Oacute;N</th>
                                                <th class="border-top-0">ORGANIZACI&Oacute;N ABR.</th>
                                                <th class="border-top-0">ORGANIZACI&Oacute;N IMAGEN</th>
                                                <th class="border-top-0">&Uacute;LTIMA ACT.</th>
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
                <div id="modalprocesar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" id="prodesc">
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
   
    if ($codeRest == 200) {
?>
    <script>
        $(function() {
            toastr.success('<?php echo $msgRest; ?>', 'Correcto!');
        });
    </script>
<?php
    }
            
    if (($codeRest == 204) || ($codeRest == 401)) {
?>
    <script>
        $(function() {
            toastr.error('<?php echo $msgRest; ?>', 'Error!');
        });
    </script>
<?php
    }
?>

    <script src="../js/lesion.js"></script>
</body>
</html>