<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if(isset($_GET['competicion'])){
        $valorCompeticion               = $_GET['competicion'];
    } else {
        $valorCompeticion   = 0;
    }
    
    $encuentroJSON  = get_curl('200/competicion/encuentro/'.$usu_04.'/'.$valorCompeticion);
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
                                        <li class="breadcrumb-item active" aria-current="page">ENCUENTROS</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
<?php
    if ($encuentroJSON['code'] === 200) {
        $fecVal = date('Y-m-d', strtotime('2020-09-14'));

        foreach ($encuentroJSON['data'] as $encuentroKEY => $encuentroVALUE) {
            $fecReg = str_replace('/', '-', $encuentroVALUE['juego_horario']);
            $fecReg = date('Y-m-d', strtotime($fecReg));

            if ($fecReg > $fecVal) {
                if (
                    ($log_04 != 218 && $log_04 != 219 && $log_04 != 220 && $log_04 != 221 && $log_04 != 222 && $log_04 != 223 && $log_04 != 224 && $log_04 != 225) || 
                    ($encuentroVALUE['juego_codigo'] == 54581310 && ($log_04 == 218 || $log_04 == 219 || $log_04 == 220 || $log_04 == 221 || $log_04 == 222)) || 
                    ($encuentroVALUE['juego_codigo'] == 52356413 && ($log_04 == 223 || $log_04 == 224 || $log_04 == 225))
                ) {
?>
                                <div class="col-sm-12 col-md-4 col-lg-4">
                                    <div class="card" style="height:250px;">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $encuentroVALUE['equipo_local_nombre'].' '.$encuentroVALUE['equipo_local_resultado_final'].' <br> vs <br> '.$encuentroVALUE['equipo_visitante_nombre'].' '.$encuentroVALUE['equipo_visitante_resultado_final']; ?></h4>
                                            <p class="card-text"> FASE: <?php echo $encuentroVALUE['juego_fase']; ?> <br> ESTADO: <?php echo $encuentroVALUE['juego_estado']; ?> <br> HORARIO: <?php echo $encuentroVALUE['juego_horario']; ?></p>
                                            <div style="position:absolute; bottom:1.25rem; left:1.25rem;">
                                                <a href="../externo/preencuentro.php?competicion=<?php echo $valorCompeticion; ?>&encuentro=<?php echo $encuentroVALUE['juego_codigo']; ?>" class="btn btn-info" style="background-color:#005ea6;"> Control de TEST </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
<?php
                }
            }
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
        <script>
            localStorage.removeItem('examenPruebaJSON');
            localStorage.removeItem('jugadorJSON');
        </script>
        
        <script src="../js/api.js?<?php echo date('Ymd');?>"></script>
    </body>
</html>