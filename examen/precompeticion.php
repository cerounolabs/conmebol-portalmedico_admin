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

    if(isset($_GET['equipo'])){
        $valorEquipo   = $_GET['equipo'];
    } else {
        $valorEquipo   = 0;
    }

    $valorEncuentro     = NULL;

    $chart01JSON  = get_curl('801/examen/competicion/chart01/'.$usu_04.'/'.$valorCompeticion.'/210');
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
                                        <a href="../examen/competicion_2.php">PRE-COMPETICIONES</a>
                                    </li>
                                    <li class="breadcrumb-item" aria-current="page">
                                        <a href="../examen/encuentro_2.php?competicion=<?php echo $valorCompeticion; ?>">ENCUENTROS</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">PRE-ENCUENTRO TEST</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="col-sm-12 col-md-4 card-title">PRE-ENCUENTRO Test</h4>
                                    <h4 class="col-sm-12 col-md-8 card-title" style="text-align: right;">
<?php
    if ($valorEquipo == 39393) {
?>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/precompeticion_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>&tipo=O" role="button" title="Agregar"><i class="ti-plus"></i> ALTA OFICIALES </a>
<?php
    } else {
?>
                                        <!--<a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/precompeticion_3_crud.php?competicion=<?php //echo $valorCompeticion; ?>&equipo=<?php //echo $valorEquipo; ?>" role="button" title="Agregar"><i class="ti-plus"></i> NUEVA PERSONA </a>-->
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/precompeticion_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>&tipo=T" role="button" title="Agregar"><i class="ti-plus"></i> ALTA CUERPO T&Eacute;CNICO </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/precompeticion_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>&tipo=P" role="button" title="Agregar"><i class="ti-plus"></i> ALTA JUGADORES </a>
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../examen/precompeticion_2_crud.php?competicion=<?php echo $valorCompeticion; ?>&equipo=<?php echo $valorEquipo; ?>&tipo=Z" role="button" title="Agregar"><i class="ti-plus"></i> ALTA ZONA 1 </a>
<?php
    }
?>
                                    </h4>
                                </div>
                                <div class="row">
 <?php           
    if ($chart01JSON['code'] === 200){
        foreach ($chart01JSON['data'] as $chart01KEY => $chart01VALUE){
            $csschart01 = '';
            switch ($chart01VALUE['tipo_codigo']) {
                case 1:
                    $csschart01 = 'bg-light-info';
                    break;
                
                case 207:
                    $csschart01 = 'bg-encu';
                    break;

                case 208:
                    $csschart01 = 'bg-light-danger';
                    break;

                case 211:
                    $csschart01 = 'bg-light-warning';
                    break;

                case 2:
                    $csschart01 = 'bg-light-success';
                    break;
            }            
 ?>
                                    <div class="col-sm-3 col-sm-3">
                                        <div class="card card <?php echo $csschart01; ?>">
                                            <div class="card-body">
                                                <div class="row p-t-10 p-b-10">
                                                    <div class="col p-r-0">
                                                        <h1 class="font-light" id="titPER01"><?php echo $chart01VALUE['cantidad_persona']; ?></h1>
                                                        <h6 class="text-muted"><?php echo $chart01VALUE['tipo_nombre']; ?></h6>
                                                    </div>

                                                    <div class="col text-right align-self-center">
                                                        <div id="valPER01" class="css-bar m-b-0 css-bar-info"><i class="mdi mdi-star-circle"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
<?php
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
        const _codPers = <?php echo $log_04; ?>;
        const _codEqui = <?php echo $valorEquipo; ?>;
        const _codComp = <?php echo $valorCompeticion; ?>;
        const _codEncu = 0;
        const _codPerf = <?php echo $usu_05; ?>;

        localStorage.removeItem('examenJugadorJSON');
        localStorage.removeItem('examenPersonaJSON');
    </script>
    
    <script src="../js/api.js?<?php echo date('Ymd');?>"></script>
    <script src="../js/precompeticion.js?<?php echo date('Ymd');?>"></script>
</body>
</html>