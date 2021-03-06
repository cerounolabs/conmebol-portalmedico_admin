<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';
    
    if(isset($_GET['var01'])){
        $var01 = $_GET['var01'];
    } else {
        $var01 = 'FOOTBALL';
    }

    if(isset($_GET['var02'])){
        $var02 = $_GET['var02'];
    } else {
        $var02 = 0;
    }

    if(isset($_GET['var03'])){
        $var03 = $_GET['var03'];
    } else {
        $var03 = 0;
    }

    if(isset($_GET['var04'])){
        $var04 = $_GET['var04'];
    } else {
        $var04 = date('Y');
    }

    $var05  = '';

    $competenciaJSON        = get_curl('200/disciplina/'.$usu_04);

    if (empty($var02)) {
        if ($competenciaJSON['code'] == 200){
            foreach ($competenciaJSON['data'] as $competenciaKEY => $competenciaVALUE) {
                if ($competenciaVALUE['competicion_anho'] == $var04){
                    $var02  = $competenciaVALUE['competicion_codigo'];
                    $var05  = $competenciaVALUE['competicion_categoria_codigo'];
                    break;
                }
            }
        }
    }

    $lesionEstadoJSON       = get_curl('600/LESIONESTADO/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionTipoJSON         = get_curl('600/LESIONTIPO/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionDiagnosticoJSON  = get_curl('600/DIAGNOSTICOTIPO/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionReincidenciaJSON = get_curl('600/LESIONREINCIDENCIA/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionCausaJSON        = get_curl('600/LESIONCAUSA/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionFaltaJSON        = get_curl('600/LESIONFALTA/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionPosicionJSON     = get_curl('600/CAMPOPOSICION/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionCuerpoZonaJSON   = get_curl('600/CUERPOZONA/'.$usu_04.'/'.$var02.'/'.$var03);
    $lesionCuerpoLugarJSON  = get_curl('600/CUERPOLUGAR/'.$usu_04.'/'.$var02.'/'.$var03);

    $var01_1 = '';
    $var01_2 = '';
    $var01_3 = '';

    switch ($var01) {
        case 'FOOTBALL':
            $var01_1 = 'selected';
            break;

        case 'FUTSAL':
            $var01_2 = 'selected';
            break;

        case 'BEACH_SOCCER':
            $var01_3 = 'selected';
            break;
    }

    $var03_0 = '';
    $var03_1 = '';
    $var03_2 = '';
    $var03_3 = '';

    switch ($var03) {
        case '0':
            $var03_0 = 'selected';
            break;

        case '1':
            $var03_1 = 'selected';
            break;

        case '2':
            $var03_2 = 'selected';
            break;

        case '3':
            $var03_3 = 'selected';
            break;
    }

    $juegoJSON = get_curl('200/juegotop4/'.$var02.'/'.$usu_04);
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
                                            <div class="col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="var01">Disciplina</label>
                                                    <select id="var01" name="var01" onchange="getCompetencias();" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        <optgroup label="Disciplina">
                                                            <option value="FOOTBALL" <?php echo $var01_1; ?>>F&uacute;tbol de Campo</option>
                                                            <option value="FUTSAL" <?php echo $var01_2; ?>>F&uacute;tbol de Sal&oacute;n</option>
                                                            <option value="BEACH_SOCCER" <?php echo $var01_3; ?>>F&uacute;tbol de Playa</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="var04">Periodo</label>
                                                    <input id="var04" name="var04" value="<?php echo $var04; ?>" onchange="getCompetencias();" type="number" min="2019" max="2030" class="form-control" style="width:100%; height:40px;" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-5">
                                                <div class="form-group">
                                                    <label for="var02">Competencia</label>
                                                    <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-2">
                                                <div class="form-group">
                                                    <label for="var03">Lesi&oacute;n</label>
                                                    <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        <optgroup label="Lesi&oacute;n">
                                                            <option value="0" <?php echo $var03_0; ?>>Todos</option>
                                                            <option value="112" <?php echo $var03_1; ?>>Ingresado</option>
                                                            <option value="114" <?php echo $var03_2; ?>>En Proceso</option>
                                                            <option value="115" <?php echo $var03_3; ?>>Finalizado</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-1">
                                                <div class="form-group text-right">
                                                    <button type="submit" class="btn btn-info">VER</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
<?php
    if ($usu_04 != 39393){
?>
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
                                        <a href="../public/lesion_crud.php?tipo=COM&disciplina=<?php echo $var01; ?>&competencia=<?php echo $var02; ?>&categoria=<?php echo $var05; ?>&equipo=<?php echo $usu_04; ?>&juego=<?php echo $juegoVALUE['juego_codigo']; ?>" class="btn btn-info" style="background-color:#005ea6; position:absolute; bottom: 20px;">Nueva Lesi&oacute;n</a>
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
<?php
    }
?>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info" style="background-color:#163562;">
                                <h4 class="card-title" style="color:#fff;">Lesión x Estado</h4>
                                <div id="chart01" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title" style="color:#163562;">Lesión x Tipo</h4>
                                <div id="chart02" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info" style="background-color:#163562;">
                                <h4 class="card-title" style="color:#fff;">Lesión x Reincidencia</h4>
                                <div id="chart03" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title" style="color:#163562;">Lesión x Diagnostico</h4>
                                <div id="chart04" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info" style="background-color:#163562;">
                                <h4 class="card-title" style="color:#fff;">Lesión x Causa</h4>
                                <div id="chart05" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title" style="color:#163562;">Lesión x Amonestación</h4>
                                <div id="chart06" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info" style="background-color:#163562;">
                                <h4 class="card-title" style="color:#fff;">Lesión x Posición</h4>
                                <div id="chart07" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info">
                                <h4 class="card-title" style="color:#163562;">Lesión x Zona del Cuerpo</h4>
                                <div id="chart08" style="height:300px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-body analytics-info" style="background-color:#163562;">
                                <h4 class="card-title" style="color:#fff;">Lesión x Lugar del Cuerpo</h4>
                                <div id="chart09" style="height:300px;"></div>
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

    <script src="../js/api.js"></script>

    <script>
        if (localStorage.getItem('lesionJSON') === 'null' || localStorage.getItem('lesionJSON') === null ){
            localStorage.removeItem('lesionJSON');
            localStorage.setItem('lesionJSON', JSON.stringify(<?php echo json_encode(get_curl('600/'.$usu_04)); ?>));
        }

        function getCompetencias(){
            var codDisciplina   = document.getElementById('var01');
            var selCompetencia  = document.getElementById('var02');
            var selAnho         = document.getElementById('var04'); 
            var selOption       = '<?php echo $var02; ?>';
            var xDATA           = '<?php echo json_encode($competenciaJSON['data']); ?>';
            var xJSON           = JSON.parse(xDATA);
                    
            while (selCompetencia.length > 0) {
                selCompetencia.remove(0);
            }

            xJSON.forEach(element => {
                if (codDisciplina.value == element.competicion_disciplina && selAnho.value == element.competicion_anho) {
                    var option      = document.createElement('option');
                    option.value    = element.competicion_codigo;
                    option.text     = element.competicion_nombre;

                    if (selOption == element.competicion_codigo){
                        option.selected = true;
                    } else {
                        option.selected = false;
                    }
                    
                    selCompetencia.add(option, null);
                }
            });
        }

        getCompetencias();

        $(function() {
            "use strict";

            var chart01 = echarts.init(document.getElementById('chart01'));
            var option01= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {   
                        name: 'Estado',
                        type: 'pie',
                        radius: ['60%', '85%'],
                        selectedMode: 'single',
                        x: '55%',
                        y: '7.5%',
                        width: '40%',
                        height: '85%',
                        funnelAlign: 'right',
                        itemStyle: {
                            normal: {
                                label: {
                                    position: 'inner'
                                },
                                labelLine: {
                                    show: false
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true
                                }
                            }
                        },
                        data: [
<?php
    if ($lesionEstadoJSON['code'] == 200){
        foreach ($lesionEstadoJSON['data'] as $lesionEstadoKEY => $lesionEstadoVALUE) {
?>
            {value: <?php echo $lesionEstadoVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionEstadoVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            var chart02 = echarts.init(document.getElementById('chart02'));
            var option02= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {
                        name: 'Tipo',
                        type: 'pie',
                        radius: ['15%', '73%'],
                        center: ['50%', '57%'],
                        roseType: 'area',
                        width: '40%',
                        height: '78%',
                        x: '30%',
                        y: '17.5%',
                        data: [
<?php
    if ($lesionTipoJSON['code'] === 200){
        foreach ($lesionTipoJSON['data'] as $lesionTipoKEY => $lesionTipoVALUE) {
?>
                            {value: <?php echo $lesionTipoVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionTipoVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
                            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            var chart03 = echarts.init(document.getElementById('chart03'));
            var option03= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {   
                        name: 'Reincidencia',
                        type: 'pie',
                        radius: ['60%', '85%'],
                        selectedMode: 'single',
                        x: '55%',
                        y: '7.5%',
                        width: '40%',
                        height: '85%',
                        funnelAlign: 'right',
                        itemStyle: {
                            normal: {
                                label: {
                                    position: 'inner'
                                },
                                labelLine: {
                                    show: false
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true
                                }
                            }
                        },
                        data: [
<?php
    if ($lesionReincidenciaJSON['code'] == 200){
        foreach ($lesionReincidenciaJSON['data'] as $lesionReincidenciaKEY => $lesionReincidenciaVALUE) {
?>
            {value: <?php echo $lesionReincidenciaVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionReincidenciaVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            var chart04 = echarts.init(document.getElementById('chart04'));
            var option04= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [{
                    name: 'Diagnostico',
                    type: 'pie',
                    radius: '70%',
                    center: ['50%', '57.5%'],
                    data: [
<?php
    if ($lesionDiagnosticoJSON['code'] == 200){
        foreach ($lesionDiagnosticoJSON['data'] as $lesionDiagnosticoKEY => $lesionDiagnosticoVALUE) {
?>
            {value: <?php echo $lesionDiagnosticoVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionDiagnosticoVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                    ]
                }]
        };

            var chart05 = echarts.init(document.getElementById('chart05'));
            var option05= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {   
                        name: 'Causa',
                        type: 'pie',
                        radius: ['60%', '85%'],
                        selectedMode: 'single',
                        x: '55%',
                        y: '7.5%',
                        width: '40%',
                        height: '85%',
                        funnelAlign: 'right',
                        itemStyle: {
                            normal: {
                                label: {
                                    position: 'inner'
                                },
                                labelLine: {
                                    show: false
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true
                                }
                            }
                        },
                        data: [
<?php
    if ($lesionCausaJSON['code'] == 200){
        foreach ($lesionCausaJSON['data'] as $lesionCausaKEY => $lesionCausaVALUE) {
?>
            {value: <?php echo $lesionCausaVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionCausaVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            var chart06 = echarts.init(document.getElementById('chart06'));

            var dataStyle = {
                normal: {
                    label: {show: false},
                    labelLine: {show: false}
                }
            };

            var placeHolderStyle = {
                normal: {
                    color: 'rgba(0,0,0,0)',
                    label: {show: false},
                    labelLine: {show: false}
                },
                emphasis: {
                    color: 'rgba(0,0,0,0)'
                }
            };

            var option06 = {
                title: {
                    text: 'Amonestación',
                    x: 'center',
                    y: 'center',
                    itemGap: 10,
                    textStyle: {
                        color: 'rgba(30,144,255,0.8)',
                        fontSize: 19,
                        fontWeight: '500'
                    }
                },

                tooltip: {
                    show: true,
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },

                legend: {
                    orient: 'vertical',
                    x: document.getElementById('chart06').offsetWidth / 2,
                    y: 30,
                    x: '55%',
                    itemGap: 15,
                    data: [
<?php
    if ($lesionFaltaJSON['code'] == 200){
        foreach ($lesionFaltaJSON['data'] as $lesionFaltaKEY => $lesionFaltaVALUE) {
?>
                        '<?php echo $lesionFaltaVALUE['tipo_nombre_castellano']; ?>',
<?php
        }
    } else {
?>
                        'No hay registro',
<?php
    }
?>
                    ]
                },

                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
 
                series: [
<?php
    if ($lesionFaltaJSON['code'] == 200){
        $index      = 1;
        foreach ($lesionFaltaJSON['data'] as $lesionFaltaKEY => $lesionFaltaVALUE) {
            switch ($index) {
                case 1:
                    $dataRadius1 = '75%';
                    $dataRadius2 = '90%';
                    break;
                
                case 2:
                    $dataRadius1 = '60%';
                    $dataRadius2 = '75%';
                    break;

                case 3:
                    $dataRadius1 = '45%';
                    $dataRadius2 = '60%';
                    break;
            }
?>
                    {
                        name: '<?php echo $index; ?>',
                        type: 'pie',
                        clockWise: false,
                        radius: ['<?php echo $dataRadius1; ?>', '<?php echo $dataRadius2; ?>'],
                        itemStyle: dataStyle,
                        data: [
                            {
                                value: <?php echo $lesionFaltaVALUE['tipo_cantidad']; ?>,
                                name: '<?php echo $lesionFaltaVALUE['tipo_nombre_castellano']; ?>'
                            },
                            {
                                value: <?php echo (100 - $lesionFaltaVALUE['tipo_cantidad']); ?>,
                                name: '<?php echo $lesionFaltaVALUE['tipo_nombre_castellano']; ?>',
                                itemStyle: placeHolderStyle
                            }
                        ]
                    },
<?php
            $index = $index + 1;
        }
    }
?>
                ]
            };

            var chart07 = echarts.init(document.getElementById('chart07'));
            var option07= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {   
                        name: 'Posicion',
                        type: 'pie',
                        radius: ['60%', '85%'],
                        selectedMode: 'single',
                        x: '55%',
                        y: '7.5%',
                        width: '40%',
                        height: '85%',
                        funnelAlign: 'right',
                        itemStyle: {
                            normal: {
                                label: {
                                    position: 'inner'
                                },
                                labelLine: {
                                    show: false
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true
                                }
                            }
                        },
                        data: [
<?php
    if ($lesionPosicionJSON['code'] == 200){
        foreach ($lesionPosicionJSON['data'] as $lesionPosicionKEY => $lesionPosicionVALUE) {
?>
            {value: <?php echo $lesionPosicionVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionPosicionVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            var chart08 = echarts.init(document.getElementById('chart08'));
            var option08= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {
                        name: 'Zona del Cuerpo',
                        type: 'pie',
                        radius: ['15%', '73%'],
                        center: ['50%', '57%'],
                        roseType: 'area',
                        width: '40%',
                        height: '78%',
                        x: '30%',
                        y: '17.5%',
                        data: [
<?php
    if ($lesionCuerpoZonaJSON['code'] === 200){
        foreach ($lesionCuerpoZonaJSON['data'] as $lesionCuerpoZonaKEY => $lesionCuerpoZonaVALUE) {
?>
                            {value: <?php echo $lesionCuerpoZonaVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionCuerpoZonaVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
                            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            var chart09 = echarts.init(document.getElementById('chart09'));
            var option09= {
                tooltip: {
                    trigger: 'item',
                    formatter: "{a} <br/>{b}: {c} ({d}%)"
                },
                color: ['#ffbc34', '#4fc3f7', '#006064', '#f62d51', '#2962FF', '#212529', '#FFC400', '#FF1744', '#1565C0', '#FFC400', '#64FFDA', '#607D8B'],
                calculable: true,
                series: [
                    {   
                        name: 'Lugar del Cuerpo',
                        type: 'pie',
                        radius: ['60%', '85%'],
                        selectedMode: 'single',
                        x: '55%',
                        y: '7.5%',
                        width: '40%',
                        height: '85%',
                        funnelAlign: 'right',
                        itemStyle: {
                            normal: {
                                label: {
                                    position: 'inner'
                                },
                                labelLine: {
                                    show: false
                                }
                            },
                            emphasis: {
                                label: {
                                    show: true
                                }
                            }
                        },
                        data: [
<?php
    if ($lesionCuerpoLugarJSON['code'] == 200){
        foreach ($lesionCuerpoLugarJSON['data'] as $lesionCuerpoLugarKEY => $lesionCuerpoLugarVALUE) {
?>
            {value: <?php echo $lesionCuerpoLugarVALUE['tipo_cantidad']; ?>, name: '<?php echo $lesionCuerpoLugarVALUE['tipo_nombre_castellano']; ?>'},
<?php
        }
    } else {
?>
            {value: 0, name: 'No hay registro'},
<?php
    }
?>
                        ]
                    }
                ]
            };

            chart01.setOption(option01);
            chart02.setOption(option02);
            chart03.setOption(option03);
            chart04.setOption(option04);
            chart05.setOption(option05);
            chart06.setOption(option06);
            chart07.setOption(option07);
            chart08.setOption(option08);
            chart09.setOption(option09);
        });
    </script>
</body>
</html>