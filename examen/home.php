<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 9 && $usu_05 != 10 && $usu_05 != 11 && $usu_05 != 157){
        header('Location: ../examen/competicion.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }
    
    if(isset($_GET['competicion'])){
        $valorCompeticion               = $_GET['competicion'];
    } else {
        $valorCompeticion   = 0;
    }
    
    $encuentroJSON  = get_curl('200/competicion/home/ultimoencuentro/'.$usu_04);
    $pruebaJSON     = get_curl('200/competicion/home/resultado/'.$usu_04); 
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
    if ($encuentroJSON['code'] === 200) {
        foreach ($encuentroJSON['data'] as $encuentroKEY => $encuentroVALUE) {
            $fecReg = str_replace('/', '-', $encuentroVALUE['juego_horario']);
            $fecReg = date('Y-m-d', strtotime($fecReg));
?>
                            <div class="col-sm-12 col-md-3">
                                <div class="card" style="height:250px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $encuentroVALUE['equipo_local_nombre'].' '.$encuentroVALUE['equipo_local_resultado_final'].' <br> vs <br> '.$encuentroVALUE['equipo_visitante_nombre'].' '.$encuentroVALUE['equipo_visitante_resultado_final']; ?></h4>
                                        <p class="card-text"> FASE: <?php echo $encuentroVALUE['juego_fase']; ?> <br> ESTADO: <?php echo $encuentroVALUE['juego_estado']; ?> <br> HORARIO: <?php echo $encuentroVALUE['juego_horario']; ?></p>
                                        <div style="position:absolute; bottom:1.25rem; left:1.25rem;">
                                            <a href="../examen/covid19.php?competicion=<?php echo $encuentroVALUE['competicion_codigo_padre'];?>&encuentro=<?php echo $encuentroVALUE['juego_codigo']; ?>" class="btn btn-info" style="background-color:#005ea6;"> Control de TEST </a>
                                            <a href="../examen/sintomas.php?competicion=<?php echo $encuentroVALUE['competicion_codigo_padre'];?>&encuentro=<?php echo $encuentroVALUE['juego_codigo']; ?>" class="btn btn-info" style="background-color:#005ea6;"> S&iacute;ntomas </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
        }
    }
?>
<?php
    if($pruebaJSON['code'] == 200){
        $indReg = 0;
        
        foreach ($pruebaJSON['data'] as $pruebaKEY => $pruebaVALUE) {
?>
                            <div class="col-sm-12 col-lg-4">
                                <div class="card ">
                                    <div class="card-body">
                                        <h4 class="card-title"><?php echo $pruebaVALUE['encuentro_competicion'].' - '.$pruebaVALUE['encuentro_equipo'] ?></h4>
                                        <div id="chart01_<?php echo $indReg;?>" style="height:253px;" class="m-t-20"></div>
                                        <!-- row -->
                                        <div class="row m-t-30 m-b-15">
                                            <!-- column -->
                                            <div class="col-4 birder-right text-left">
                                                <h4 class="m-b-0"><?php echo  $pruebaVALUE['encuentro_cantidad_positivo'] + $pruebaVALUE['encuentro_cantidad_negativo']; ?>
                                                </h4>Cant. Pruebas</div>
                                            <!-- column -->
                                            <div class="col-4 birder-right text-center">
                                                <h4 class="m-b-0"><?php echo  $pruebaVALUE['encuentro_cantidad_positivo']; ?>
                                                    <small>
                                                        <i class="ti-arrow-up text-danger"></i>
                                                    </small>
                                                </h4>Cant. Positivo</div>
                                            <!-- column -->
                                            <div class="col-4 text-right">
                                                <h4 class="m-b-0"><?php echo  $pruebaVALUE['encuentro_cantidad_negativo']; ?>
                                                    <small>
                                                        <i class="ti-arrow-down text-info"></i>
                                                    </small>
                                                </h4>Cant. Negativo</div>
                                        </div>
                                        <ul class="list-inline m-t-30 text-center font-12">
                                            <li class="list-inline-item">
                                                <i class="fa fa-circle text-danger"></i> Positivo</li>
                                            <li class="list-inline-item">
                                                <i class="fa fa-circle text-info"></i> Negativo</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
<?php
            $indReg = $indReg + 1;
        }
    }
?>
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
        <script src="../js/api.js?<?php echo date('Ymd');?>"></script>
        <script>
            function loadChart(inpElem, cantPositivo, cantNegativo){
                $(function() {
                    'use strict';

                    var inputDiv =  document.getElementById(inpElem);

                    var chart = c3.generate({
                        bindto: inputDiv,
                        data: {
                        columns: [
                            ['Positivo', cantPositivo],
                            ['Negativo', cantNegativo]
                        ],

                        type: 'donut',

                        onclick: function(d, i) {
                            console.log('onclick', d, i);
                        },
                        onmouseover: function(d, i) {
                            console.log('onmouseover', d, i);
                        },
                        onmouseout: function(d, i) {
                            console.log('onmouseout', d, i);
                        }
                        },
                        donut: {
                        label: {
                            show: false
                        },
                        title: 'Datos',
                        width: 30
                        },

                        legend: {
                        hide: true
                        },
                        color: {
                        pattern: ['#ff7676', '#4798e8']
                        }
                    });
                });
            }

<?php
    if($pruebaJSON['code'] == 200){
        $indReg = 0;

        foreach ($pruebaJSON['data'] as $pruebaKEY => $pruebaVALUE) {
?>
            loadChart('chart01_<?php echo $indReg; ?>', <?php echo  $pruebaVALUE['encuentro_cantidad_positivo']; ?>, <?php echo  $pruebaVALUE['encuentro_cantidad_negativo']; ?> );
<?php
            $indReg = $indReg + 1;
        }
    }
?>
        </script>
    </body>
</html>