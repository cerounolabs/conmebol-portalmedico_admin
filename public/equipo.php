<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 11 && $usu_05 != 9){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    $equipoJSON = get_curl('300');
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
                                    <li class="breadcrumb-item active" aria-current="page">EQUIPOS</li>
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
                                    <h4 class="col-10 card-title">Equipos</h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0 text-center" colspan="9">EQUIPO</th>
                                                <th class="border-top-0 text-center" rowspan="2">&Uacute;LTIMA ACT.</th>
                                                <th class="border-top-0 text-center" colspan="4">ORGANIZACI&Oacute;N</th>
                                            </tr>
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0 text-center">C&Oacute;D.</th>
                                                <th class="border-top-0 text-center">ESTADO</th>
                                                <th class="border-top-0 text-center">TIPO</th>
                                                <th class="border-top-0 text-center">EQUIPO</th>
                                                <th class="border-top-0 text-center">ABR.</th>
                                                <th class="border-top-0 text-center">PA&Iacute;S</th>
                                                <th class="border-top-0 text-center">REGI&Oacute;N</th>
                                                <th class="border-top-0 text-center">CIUDAD</th>
                                                <th class="border-top-0 text-center">C&Oacute;DIGO POSTAL</th>
                                                <th class="border-top-0 text-center">C&Oacute;D.</th>
                                                <th class="border-top-0 text-center">ORGANIZACI&Oacute;N</th>
                                                <th class="border-top-0 text-center">ABR.</th>
                                                <th class="border-top-0 text-center">IMAGEN</th>
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
                    data		: <?php echo json_encode($equipoJSON['data']); ?>,
                    columnDefs	: [
                        { targets			: [0],	visible : true,	searchable : true,	orderData : [0, 0] },
                        { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                        { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                        { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                        { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                        { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                        { targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
                        { targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
                        { targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
                        { targets			: [9],	visible : true, searchable : true,	orderData : [9, 0] },
                        { targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] },
                        { targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0] },
                        { targets			: [12],	visible : true,	searchable : true,	orderData : [12, 0] },
                        { targets			: [13],	visible : true,	searchable : true,	orderData : [13, 0] },
                    ],
                    columns		: [
                        { data				: 'equipo_codigo', name : 'equipo_codigo'},
                        { data				: 'equipo_estado', name : 'equipo_estado'},
                        { data				: 'equipo_naturaleza', name : 'equipo_naturaleza'},
                        { data				: 'equipo_nombre', name : 'equipo_nombre'},
                        { data				: 'equipo_nombre_corto', name : 'equipo_nombre_corto'},
                        { data				: 'equipo_pais', name : 'equipo_pais'},
                        { data				: 'equipo_region', name : 'equipo_region'},
                        { data				: 'equipo_ciudad', name : 'equipo_ciudad'},
                        { data				: 'equipo_postal_codigo', name : 'equipo_postal_codigo'},
                        { data				: 'equipo_ultima_actualizacion', name : 'equipo_ultima_actualizacion'},
                        { data				: 'organizacion_codigo', name : 'organizacion_codigo'},
                        { data				: 'organizacion_nombre', name : 'organizacion_nombre'},
                        { data				: 'organizacion_nombre_corto', name : 'organizacion_nombre_corto'},
                        { render			: function (data, type, full, meta) {return '<img src="http://portalmedico.conmebol.com/' + full.organizacion_imagen_path + '" height="50" />';}},
                    ]
                });
            });
        </script>
    </body>
</html>