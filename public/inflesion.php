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

    $var04              = date('Y');
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
                                    <li class="breadcrumb-item active" aria-current="page">INFORME LESIONES</li>
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
                                                    <input id="var02" name="var02" value="<?php echo $var04; ?>" onchange="getCompetencias();" type="number" min="2019" max="<?php echo $var04; ?>" class="form-control" style="width:100%; height:40px;" required>
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
                                    <h4 class="col-2 card-title" style="text-align: right;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" style="background-color:#005ea6; border-color:#005ea6;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Exportar
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="getInforme(1);"><i class="far fa-file-excel"></i> Excel</a>
                                            </div>
                                        </div>
                                	</h4>
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
    <script src="../js/api.js"></script>

    <script>
        if (localStorage.getItem('competenciaJSON') === 'null' || localStorage.getItem('competenciaJSON') === null){
            localStorage.removeItem('competenciaJSON');
            localStorage.setItem('competenciaJSON', JSON.stringify(<?php echo json_encode($competenciaJSON); ?>));
        }

        if (localStorage.getItem('lesionJSON') === 'null' || localStorage.getItem('lesionJSON') === null ){
            localStorage.removeItem('lesionJSON');
            localStorage.setItem('lesionJSON', JSON.stringify(<?php echo json_encode(get_curl('600/'.$usu_04)); ?>));
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

            $('#modalcontent').empty();
            $('#modalcontent').append(html);
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

        function getInforme(codInf){
            var codComp = document.getElementById('var03').value;

            switch (codInf) {
                case 1:
                    window.location = "../public/inflesion_xls.php?competencia=" + codComp;
                    break;
            }
        }
        
        getCompetencias();

        $(document).ready(function() {
            var xDATA       = getLesion();
            var tableData   = $('#tableLoad').DataTable(
                {
                    processing	: true,
                    destroy		: true,
                    searching	: false,
                    paging		: false,
                    lengthChange: true,
                    info		: false,
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
                    data : xDATA,
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
                        { targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] }
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
                    ]
                }
            );

            $('.form-group').change(function() {
                var xDATA = getLesion();
                tableData.clear().rows.add(xDATA).draw();
            });
        });
    </script>
</body>
</html>