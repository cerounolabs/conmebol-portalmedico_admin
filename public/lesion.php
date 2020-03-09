<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    $var02              = date('Y');
    $dominioJSON        = get_curl('000');
    $subDominioJSON     = get_curl('100');
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
                            <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                <form action="#">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var01">Disciplina</label>
                                                    <select id="var01" name="var01" onchange="getCompetencias();" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
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
                                                    <label for="var02">Periodo</label>
                                                    <input id="var02" name="var02" value="<?php echo $var02; ?>" onchange="getCompetencias();" type="number" min="2019" max="<?php echo $var02; ?>" class="form-control" style="width:100%; height:40px;" required>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-6">
                                                <div class="form-group">
                                                    <label for="var03">Competencia</label>
                                                    <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
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
                                    <h4 class="col-10 card-title">Lesiones</h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0">C&Oacute;DIGO</th>
                                                <th class="border-top-0">FECHA</th>
                                                <th class="border-top-0">ESTADO</th>
                                                <th class="border-top-0">JUEGO</th>
                                                <th class="border-top-0">JUGADOR</th>
                                                <th class="border-top-0">LESI&Oacute;N</th>
                                                <th class="border-top-0">ZONA DEL CUERPO</th>
                                                <th class="border-top-0">DIAGN&Oacute;STICO</th>
                                                <th class="border-top-0">TIEMPO RECUPERACI&Oacute;N</th>
                                                <th class="border-top-0">FECHA RETORNO</th>
                                                <th class="border-top-0">ACCI&Oacute;N</th>
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

        <script src="../js/api.js"></script>
    
        <script>
            if (localStorage.getItem('dominioJSON') === 'null' || localStorage.getItem('dominioJSON') === null ){
                localStorage.removeItem('dominioJSON');
                localStorage.setItem('dominioJSON', JSON.stringify(<?php echo json_encode(get_curl('000')); ?>));
            }

            if (localStorage.getItem('subDominioJSON') === 'null' || localStorage.getItem('subDominioJSON') === null ){
                localStorage.removeItem('subDominioJSON');
                localStorage.setItem('subDominioJSON', JSON.stringify(<?php echo json_encode(get_curl('100')); ?>));
            }

            if (localStorage.getItem('competenciaJSON') === 'null' || localStorage.getItem('competenciaJSON') === null){
                localStorage.removeItem('competenciaJSON');
                localStorage.setItem('competenciaJSON', JSON.stringify(<?php echo json_encode($competenciaJSON); ?>));
            }

            if (localStorage.getItem('lesionJSON') === 'null' || localStorage.getItem('lesionJSON') === null ){
                localStorage.removeItem('lesionJSON');
                localStorage.setItem('lesionJSON', JSON.stringify(<?php echo json_encode(get_curl('600/'.$usu_04)); ?>));
            }

            function getCompetencias(){
                var codDisciplina   = document.getElementById('var01');
                var selAnho         = document.getElementById('var02');
                var selCompetencia  = document.getElementById('var03');
                var xJSON           = JSON.parse(localStorage.getItem('competenciaJSON'))['data'];
                    
                while (selCompetencia.length > 0) {
                    selCompetencia.remove(0);
                }

                xJSON.forEach(element => {
                    if (codDisciplina.value == element.competicion_disciplina && selAnho.value == element.competicion_anho) {
                        var option      = document.createElement('option');
                        option.value    = element.competicion_codigo;
                        option.text     = element.competicion_nombre;
                        selCompetencia.add(option, null);
                    }
                });
            }

            function getLesion(){
                var xJSON = JSON.parse(localStorage.getItem('lesionJSON'))['data'];
                var xCOMP = document.getElementById('var03').value;
                var xDATA = [];

                xJSON.forEach(element => {
                    if (element.competicion_codigo == xCOMP) {
                        xDATA.push(element);
                    }
                });

                return xDATA;
            }

            function setRetorno(rowLesion, estLesion){
                var codLes  = document.getElementById(rowLesion);

                if (estLesion == 112) {
                    var html    =
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="../class/crud/lesion_retorno.php">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Retorno de Lesión </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="row pt-3">'+
                    '               <div class="col-sm-12 col-md-4">'+
                    '                   <div class="form-group">'+
                    '                       <label for="var01">Examen complementario</label>'+
<?php
    if ($dominioJSON['code'] === 200){
        $indExa = 1;

        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'LESIONEXAMEN'){
?>
                    '                       <div class="custom-control custom-checkbox">'+
                    '                           <input type="checkbox" class="custom-control-input" id="var01_<?php echo $indExa; ?>" name="var01_<?php echo $indExa; ?>" value="<?php echo $dominioVALUE['tipo_codigo']; ?>">'+
                    '                           <label class="custom-control-label" for="var01_<?php echo $indExa; ?>"><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></label>'+
                    '                       </div>'+
<?php
                $indExa = $indExa + 1;
            }
        }
    }
?>
                    '                   </div>'+
                    '               </div>'+
                    '               <div class="col-sm-12 col-md-4">'+
                    '                   <div class="form-group">'+
                    '                       <label for="var02">Fecha de retorno</label>'+
                    '                       <input id="var02" name="var02" class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" onblur="cantFecha();" style="text-transform:uppercase; height:40px;" placeholder="FECHA HASTA">'+
                    '                   </div>'+
                    '               </div>'+
                    '               <div class="col-sm-12 col-md-4">'+
                    '                   <div class="form-group">'+
                    '                       <label for="var03">Se precisa de Cirugia</label>'+
                    '                       <div class="custom-control custom-radio">'+
                    '                           <input type="radio" id="var03_1" name="var03" value="1" class="custom-control-input" checked>'+
                    '                           <label class="custom-control-label" for="var03_1">NO</label>'+
                    '                       </div>'+
                    '                       <div class="custom-control custom-radio">'+
                    '                           <input type="radio" id="var03_2" name="var03" value="2" class="custom-control-input">'+
                    '                           <label class="custom-control-label" for="var03_2">SI</label>'+
                    '                       </div>'+
                    '                   </div>'+
                    '               </div>'+
                    '           </div>'+
                    '           <div class="row pt-3">'+
                    '               <div class="col-sm-12">'+
                    '                   <div class="form-group">'+
                    '                       <label for="var04">Diagn&oacute;stico Final</label>'+
                    '                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
<?php
    if ($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'DIAGNOSTICOGRUPO'){
?>
                    '                           <optgroup label="<?php echo $dominioVALUE['tipo_nombre_castellano']; ?>">'+
<?php
                if ($subDominioJSON['code'] === 200){
                    foreach ($subDominioJSON['data'] as $subDominioKEY => $subDominioVALUE) {
                        if ($subDominioVALUE['tipo_sub_estado_codigo'] === 'A' && $subDominioVALUE['tipo_sub_dominio'] === 'DIAGNOSTICOTIPO' && $subDominioVALUE['tipo_codigo'] === $dominioVALUE['tipo_codigo']){
?>
                    '                               <option value="<?php echo $subDominioVALUE['tipo_sub_codigo']; ?>"><?php echo $subDominioVALUE['tipo_sub_nombre_castellano']; ?></option>'+
<?php
                        }
                    }
                }
            }
        }
    }
?>
                    '                       </select>'+
                    '                   </div>'+
                    '               </div>'+
                    '           </div>'+
                    '           <div class="row pt-3">'+
                    '                <div class="col-sm-12">'+
                    '                    <div class="form-group">'+
                    '                        <label for="var05">Detalle su diagn&oacute;stico</label>'+
                    '                        <textarea id="var05" name="var05" class="form-control" rows="3" style="text-transform:uppercase;" required></textarea>'+
                    '                    </div>'+
                    '                </div>'+
                    '           </div>'+
                    '           <div class="row pt-3">'+
                    '                <div class="col-sm-12">'+
                    '                    <div class="form-group">'+
                    '                        <label for="var07">Detalle su Tratamiento</label>'+
                    '                        <textarea id="var07" name="var07" class="form-control" rows="3" style="text-transform:uppercase;" required></textarea>'+
                    '                    </div>'+
                    '                </div>'+
                    '           </div>'+
                    '           <div class="form-group">'+
                    '               <input id="workCodigo" name="workCodigo" value="'+codLes.id+'" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '               <input id="workCant" name="workCant" value="<?php echo $indExa; ?>" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '           <button type="submit" class="btn btn-info">Guardar</button>'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';
                } else {
                var html    =
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="#">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Retorno de Lesión </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="form-group">'+
                    '               <h4 style="text-align:center;">EL ESTADO DE LA LESIÓN NO PERMITE MAS MODIFICACIONES</h4>'
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';
                }

                $("#modalcontent").empty();
                $("#modalcontent").append(html);
            }

            function setFinalizar(rowLesion, estLesion){
                var codLes  = document.getElementById(rowLesion);

                if (estLesion == 114) {
                    var html    =
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="../class/crud/lesion_estado.php">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Finalizar Lesión </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="row pt-3">'+
                    '                <div class="col-sm-12">'+
                    '                    <div class="form-group">'+
                    '                        <label for="var02">Comentario</label>'+
                    '                        <textarea id="var02" name="var02" class="form-control" rows="3" style="text-transform:uppercase;" required></textarea>'+
                    '                    </div>'+
                    '                </div>'+
                    '           </div>'+
                    '           <div class="form-group">'+
                    '               <input id="workCodigo" name="workCodigo" value="'+codLes.id+'" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '               <input id="workEstado" name="workEstado" value="115" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '           <button type="submit" class="btn btn-success">Finalizar</button>'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';
                } else {
                    var html    =
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="#">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Retorno de Lesión </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="form-group">'+
                    '               <h4 style="text-align:center;">PARA FINALIZAR LA LESIÓN EL ESTADO DEBE DE ESTAR EN "EN PROCESO". VERIFIQUE!</h4>'
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';
                }

                $("#modalcontent").empty();
                $("#modalcontent").append(html);
            }

            function setAnular(rowLesion, estLesion){
                var codLes  = document.getElementById(rowLesion);

                if (estLesion == 112 || estLesion == 114) {
                    var html    =
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="../class/crud/lesion_estado.php">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Anular Lesión </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="row pt-3">'+
                    '                <div class="col-sm-12">'+
                    '                    <div class="form-group">'+
                    '                        <label for="var02">Comentario</label>'+
                    '                        <textarea id="var02" name="var02" class="form-control" rows="3" style="text-transform:uppercase;" required></textarea>'+
                    '                    </div>'+
                    '                </div>'+
                    '           </div>'+
                    '           <div class="form-group">'+
                    '               <input id="workCodigo" name="workCodigo" value="'+codLes.id+'" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '               <input id="workEstado" name="workEstado" value="121" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '           <button type="submit" class="btn btn-danger">Anular</button>'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';
                } else {
                    var html    =
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="#">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Retorno de Lesión </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="form-group">'+
                    '               <h4 style="text-align:center;">LA LESIÓN YA SE ENCUENTRA FINALIZADA NO SE PUEDE ANULAR. VERIFIQUE!</h4>'
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';
                }

                $("#modalcontent").empty();
                $("#modalcontent").append(html);
            }

            function getVisualizar(rowLesion) {
                /*
                var xDATA   = JSON.parse(localStorage.getItem('lesionJSON'))['data'];
                xDATA       = xDATA.replace(/\r\n/g, ' ');
                */
                var xJSON   = JSON.parse(localStorage.getItem('lesionJSON'))['data'];
                var codLes  = document.getElementById(rowLesion);
                var html    = '';

                xJSON.forEach(element => {
                    if (codLes.id == element.lesion_codigo) {
                        html =
                        '<div class="modal-content">'+
                        '   <div class="modal-header" style="color:#fff; background:#163562;">'+
                        '		<h4 class="modal-title" id="vcenter"> Lesión </h4>'+
                        '	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                        '	</div>'+
                        '   <div class="modal-body" >'+
                        '       <div class="row pt-3">'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Traslado</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_traslado_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Clima</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_clima_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Temperatura</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.temperatura_numero+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Distancia</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_distancia_nombre_castellano+'" id="var102" name="var102" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '       </div>'+
                        '       <div class="row pt-5">'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Jugador</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.jugador_nombre+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Posicion</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_posicion_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Minuto</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_minuto_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '       </div>'+
                        '       <div class="row pt-5">'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Zona del Cuerpo</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_cuerpo_zona_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Lugar del Cuerpo</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_cuerpo_lugar_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Lesion Tipo</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_lesion_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Lesion Origen</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_lesion_origen_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Lesion Reincidencia</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_lesion_reincidencia_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Se retira del partido por Lesi&oacute;n</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_lesion_retiro_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Lesion Falta</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_lesion_falta_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Lesion Causa</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_lesion_causa_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '       </div>'+
                        '       <div class="row pt-5">'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Diagnóstico Tipo</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_diagnostico_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Diagnóstico Recuperación</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_diagnostico_recuperacion_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Diagnóstico Tiempo</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_diagnostico_tiempo_nombre_castellano+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '           <div class="col-sm-12 col-md-6 col-lg-3">'+
                        '               <div class="form-group">'+
                        '                   <label>Diagnóstico Comentario</label>'+
                        '                    <div class="input-group mb-3">'+
                        '                        <div class="input-group-prepend">'+
                        '                            <span class="input-group-text" id="basic-var102"><i class="ti-marker"></i></span>'+
                        '                        </div>'+
                        '                        <input type="text" value="'+element.tipo_diagnostico_observacion+'" class="form-control"  style="height:40px;" aria-label="Temperatura ºC" aria-describedby="basic-var102" required readonly>'+
                        '                    </div>'+
                        '                </div>'+
                        '           </div>'+
                        '       </div>'+
                        '	</div>'+
                        '   <div class="modal-footer">'+
                        '	    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                        '   </div>'+
                        '</div>';
                    }
                });

                $("#modalcontent").empty();
                $("#modalcontent").append(html);
            }

            getCompetencias();
        </script>

        <script src="../js/lesion.js"></script>
    </body>
</html>