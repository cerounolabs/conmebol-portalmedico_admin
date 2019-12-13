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

    $dominioJSON        = get_curl('000');
    $subDominioJSON     = get_curl('100');
    $lesionJSON         = get_curl('600/'.$usu_04);
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

    <script>
        $(document).ready(function() {
            $('#tableLoad').DataTable({
                processing	: true,
                destroy		: true,
                searching	: true,
                paging		: true,
                lengthChange: true,
                info		: true,
                orderCellsTop: false,
                fixedHeader	: false,
                language	: {
                    lengthMenu: "Mostrar _MENU_ registros por pagina",
                    zeroRecords: "Nothing found - sorry",
                    info: "Mostrando pagina _PAGE_ de _PAGES_",
                    infoEmpty: "No hay registros disponibles.",
                    infoFiltered: "(Filtrado de _MAX_ registros totales)",
                    sZeroRecords: "No se encontraron resultados",
                    sSearch: "buscar",
                    oPaginate: {
                        sFirst:    "Primero",
                        sLast:     "Último",
                        sNext:     "Siguiente",
                        sPrevious: "Anterior"
                    },
                },
                data		: <?php echo json_encode($lesionJSON['data']); ?>,
                columnDefs	: [
                    { targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
                    { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                    { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                    { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                    { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                    { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                    { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                    { targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
                    { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
                    { targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
                    { targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] }
                ],
                columns		: [
                    { data				: 'lesion_codigo', name : 'lesion_codigo'},
                    { data				: 'lesion_fecha_alta', name : 'lesion_fecha_alta'},
                    { data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
                    { data				: 'juego_nombre', name : 'juego_nombre'},
                    { data				: 'jugador_nombre', name : 'jugador_nombre'},
                    { data				: 'tipo_lesion_nombre_castellano', name : 'tipo_lesion_nombre_castellano'},
                    { data				: 'tipo_cuerpo_zona_nombre_castellano', name : 'tipo_cuerpo_zona_nombre_castellano'},
                    { data				: 'tipo_diagnostico_nombre_castellano', name : 'tipo_diagnostico_nombre_castellano'},
                    { data				: 'tipo_diagnostico_recuperacion', name : 'tipo_diagnostico_recuperacion'},
                    { data				: 'lesion_fecha_retorno', name : 'lesion_fecha_retorno'},
                    { render			: function (data, type, full, meta) {
                        return '<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-warning" title="Retorno" data-toggle="modal" data-target="#modaldiv" onclick="setRetorno(this.id, ' + full.tipo_estado_codigo + ');"><i class="ti-back-right"></i>&nbsp;</a>&nbsp;<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-success" title="Finalizar" data-toggle="modal" data-target="#modaldiv" onclick="setFinalizar(this.id, ' + full.tipo_estado_codigo + ');"><i class="ti-lock"></i>&nbsp;</a>&nbsp;<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-primary" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getVisualizar(this.id);"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-danger" title="Anular" data-toggle="modal" data-target="#modaldiv" onclick="setAnular(this.id, ' + full.tipo_estado_codigo + ');"><i class="ti-trash"></i>&nbsp;</a>';
                    }},
                ]
            });
        });

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
            var xDATA   = '<?php echo json_encode($lesionJSON['data']); ?>';
            var xJSON   = JSON.parse(xDATA);
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

        function setChangeCont(){
            var html = 
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_contrasenha.php">'+
            '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
            '		    <h4 class="modal-title" id="vcenter"> Reseteo de Contraseña </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12">'+
            '                   <div class="form-group">'+
            '                       <label for="var06">EMAIL</label>'+
            '                       <input id="var06" name="var06" value="<?php echo $log_02; ?>" class="form-control" type="email" style="text-transform:lowercase; height:40px;" required readonly>'+
            '                   </div>'+
            '               </div>'+
            ''+
            '               <div class="col-sm-12">'+
            '                   <div class="form-group">'+
            '                       <label for="var07">USUARIO</label>'+
            '                       <input id="var07" name="var07" value="<?php echo $log_01; ?>" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
            '                   </div>'+
            '               </div>'+
            ''+
            '               <div class="col-sm-12">'+
            '                   <div class="form-group">'+
            '                       <label for="var08">CONTRASE&Ntilde;A</label>'+
            '                       <input id="var08" name="var08" class="form-control" type="password" style="text-transform:uppercase; height:40px;" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="<?php echo $log_04; ?>" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workPage" name="workPage" value="home" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-success">Confirmar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';

            $("#modalcontent").empty();
            $("#modalcontent").append(html);
        }
    </script>
</body>
</html>