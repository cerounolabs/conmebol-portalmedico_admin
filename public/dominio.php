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

    if(isset($_GET['dominio'])){
        $valueDominio   = $_GET['dominio'];
        $titleDominio   = getTitleDominio($valueDominio);
    }

    $dominioJSON = get_curl('000/dominio/'.$_GET['dominio']);
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
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $titleDominio; ?></li>
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
                                    <h4 class="col-10 card-title"><?php echo $titleDominio; ?></h4>
                                    <h4 class="col-2 card-title" style="text-align: right;">
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="../public/dominio_crud.php?dominio=<?php echo $valueDominio; ?>&mode=C&codigo=0" role="button" title="Agregar"><i class="ti-plus"></i></a>
                                	</h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $valueDominio; ?>">
                                            <tr class="bg-light">
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">ORDEN</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">ESTADO</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="3">NOMBRE</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">DOMINIO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">OBSERVACI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">USUARIO</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">FECHA - HORA</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">IP</th>
                                                <th class="border-top-0" style="text-align:center;" rowspan="2">ACCI&Oacute;N</th>
                                            </tr>

                                            <tr class="bg-light">
                                                <th class="border-top-0" style="text-align:center;">INGLES</th>
                                                <th class="border-top-0" style="text-align:center;">CASTELLANO</th>
                                                <th class="border-top-0" style="text-align:center;">PORTUGUES</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->
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
                data		: <?php echo json_encode($dominioJSON['data']); ?>,
                columnDefs	: [
                    { targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
                    { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                    { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                    { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                    { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                    { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                    { targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
                    { targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
                    { targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
                    { targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
                    { targets			: [10],	visible : false,searchable : false,	orderData : [10, 0]},
                    { targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0]}
                ],
                columns		: [
                    { data				: 'tipo_codigo', name : 'tipo_codigo'},
                    { data				: 'tipo_orden', name : 'tipo_orden'},
                    { data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
                    { data				: 'tipo_nombre_ingles', name : 'tipo_nombre_ingles'},
                    { data				: 'tipo_nombre_castellano', name : 'tipo_nombre_castellano'},
                    { data				: 'tipo_nombre_portugues', name : 'tipo_nombre_portugues'},
                    { data				: 'tipo_dominio', name : 'tipo_dominio'},
                    { data				: 'tipo_observacion', name : 'tipo_observacion'},
                    { data				: 'tipo_usuario', name : 'tipo_usuario'},
                    { data				: 'tipo_fecha_hora', name : 'tipo_fecha_hora'},
                    { data				: 'tipo_ip', name : 'tipo_ip'},
                    { render			: function (data, type, full, meta) {return '<a href="../public/dominio_crud.php?dominio='+ full.tipo_dominio +'&mode=R&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/dominio_crud.php?dominio='+ full.tipo_dominio +'&mode=U&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/dominio_crud.php?dominio='+ full.tipo_dominio +'&mode=D&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
                ]
            });
        });
    </script>
</body>
</html>