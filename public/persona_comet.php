<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 11 && $usu_05 != 9){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    $personJSON         = get_curl('200/persona');
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
                                    <li class="breadcrumb-item active" aria-current="page">PERSONAS</li>
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
                                    <h4 class="col-6 card-title">PERSONAS</h4>
                                    <h4 class="col-6 card-title" style="text-align: right;">
                                        <a href="javascript:void(0)" onclick="setPersonaComet(0, 6);" title="Persona Zona1" class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;" role="button" data-toggle="modal" data-target="#modal-dialog"><i class="fa fa-cloud-upload-alt"></i> Importar Excel </a>
                                        <a href="javascript:void(0)" onclick="setPersonaComet(0, 1);" title="Importar Excel" class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;" role="button" data-toggle="modal" data-target="#modal-dialog"><i class="ti-plus"></i> Persona Zona 1 </a>
                                        <a href="javascript:void(0)" onclick="setPersonaComet2(0, 1);" title="Persona Comet" class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;" role="button" data-toggle="modal" data-target="#modal-dialog"><i class="ti-plus"></i> Persona Comet </a>
                                </h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;">TIPO</th>
                                                <th class="border-top-0" style="text-align:center;">TIPO DOCUMENTO</th>
                                                <th class="border-top-0" style="text-align:center;">N&Uacute;MERO DOCUMENTO</th>
                                                <th class="border-top-0" style="text-align:center;">NOMBRE</th>
                                                <th class="border-top-0" style="text-align:center;">APELLIDO</th>
                                                <th class="border-top-0" style="text-align:center;">GENERO</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA NACIMIENTO</th>
                                                <th class="border-top-0" style="text-align:center;">POSICI&Oacute;N O FUNCI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center; width:120px;">ACCI&Oacute;N</th>
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

                <div id="modal-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" id="modal-content">
                    </div>
                </div>

                <div id="modal-dialog" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" id="modal-content">
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

        <script>
            const _parm01BASE = '<?php echo $log_01; ?>';
            const _parm02BASE = '<?php echo date('Y-m-d H:i:s'); ?>';
            const _parm03BASE = '<?php echo $log_03; ?>';
            const _parm04BASE = 'public/persona_comet.php?';
        </script>

        <script src="../js/api.js"></script>
        <script src="../js/select.js"></script>
        <script src="../js/persona_comet.js"></script>

        <script>
            $(document).ready(function() {
                var xJSON	= JSON.parse('<?php echo json_encode($personJSON['data']); ?>');

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
                    data		: xJSON,
                    columnDefs	: [
                        { targets			: [0],	visible : true, searchable : true,	orderData : [0, 0] },
                        { targets			: [1],	visible : false,searchable : false,	orderData : [1, 0] },
                        { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                        { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                        { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                        { targets			: [5],	visible : true, searchable : true,	orderData : [5, 0] },
                        { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                        { targets			: [7],	visible : false, searchable : false,orderData : [7, 0] },
                        { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
                        { targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
                    ],
                    columns		: [
                        { data				: 'persona_codigo', name : 'persona_codigo'},
                        { data				: 'persona_tipo', name : 'persona_tipo'},
                        { data				: 'tipo_documento_nombre_castellano', name : 'tipo_documento_nombre_castellano'},
                        { data				: 'tipo_documento_numero', name : 'tipo_documento_numero'},
                        { data				: 'persona_nombre', name : 'persona_nombre'},
                        { data				: 'persona_apellido', name : 'persona_apellido'},
                        { data				: 'persona_genero', name : 'persona_genero'},
                        { data				: 'persona_fecha_nacimiento_2', name : 'persona_fecha_nacimiento_2'},
                        { data				: 'persona_funcion', name : 'persona_funcion'},

                        { render			: 
                            function (data, type, full, meta) {
                                var btnDSP	= '<button onclick="setPersonaComet('+ full.persona_codigo +', 2);" title="Ver" type="button" class="btn btn-primary btn-icon btn-circle" data-toggle="modal" data-target="#modal-dialog"><i class="fa fa-eye"></i></button>';
                                var btnUPD	= '<button onclick="setPersonaComet('+ full.persona_codigo +', 3);" title="Editar" type="button" class="btn btn-success btn-icon btn-circle" data-toggle="modal" data-target="#modal-dialog"><i class="fa fa-edit"></i></button>';
                                var btnDLT	= '<button onclick="setPersonaComet('+ full.persona_codigo +', 4);" title="Eliminar" type="button" class="btn btn-danger btn-icon btn-circle" data-toggle="modal" data-target="#modal-dialog"><i class="fa fa-eraser"></i></button>';
                                var btnAUD	= '<button onclick="setPersonaComet('+ full.persona_codigo +', 5);" title="Auditoria" type="button" class="btn btn-warning btn-icon btn-circle" data-toggle="modal" data-target="#modal-dialog"><i class="fa fa-user-secret"></i></button>';
                                return (btnDSP + '&nbsp;' + btnUPD + '&nbsp;' + btnDLT);
                            }
                        },
                    ]
                });
            });
        </script>
    </body>
</html>