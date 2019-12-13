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

    $medicoJSON = get_curl('400/equipo/'.$usu_04);
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
                                    <li class="breadcrumb-item active" aria-current="page">MEDICOS</li>
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
                                    <h4 class="col-10 card-title">MEDICOS</h4>
                                    <h4 class="col-2 card-title" style="text-align: right;"></h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;">IMAGEN</th>
                                                <th class="border-top-0" style="text-align:center;">EQUIPO</th>
                                                <th class="border-top-0" style="text-align:center;">ESTADO</th>
                                                <th class="border-top-0" style="text-align:center;">ACCESO</th>
                                                <th class="border-top-0" style="text-align:center;">PERFIL</th>
                                                <th class="border-top-0" style="text-align:center;">CATEGOR&Iacute;A</th>
                                                <th class="border-top-0" style="text-align:center;">NOMBRE</th>
                                                <th class="border-top-0" style="text-align:center;">USUARIO</th>
                                                <th class="border-top-0" style="text-align:center;">EMAIL</th>
                                                <th class="border-top-0" style="text-align:center;">TEL&Eacute;FONO</th>
                                                <th class="border-top-0" style="text-align:center;">OBSERVACI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center;">USUARIO</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA - HORA</th>
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
                data		: <?php echo json_encode($medicoJSON['data']); ?>,
                columnDefs	: [
                    { targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
                    { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                    { targets			: [2],	visible : false,searchable : false,	orderData : [2, 0] },
                    { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                    { targets			: [4],	visible : false,searchable : false,	orderData : [4, 0] },
                    { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                    { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                    { targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
                    { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
                    { targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
                    { targets			: [10],	visible : false,searchable : false,	orderData : [10, 0] },
                    { targets			: [11],	visible : false,searchable : false,	orderData : [11, 0] },
                    { targets			: [12],	visible : false,searchable : false,	orderData : [12, 0] },
                    { targets			: [13],	visible : false,searchable : false,	orderData : [13, 0] },
                    { targets			: [14],	visible : false,searchable : false,	orderData : [14, 0] }
                ],
                columns		: [
                    { data				: 'persona_codigo', name : 'persona_codigo'},
                    { render			: function (data, type, full, meta) {return '<img src="../' + full.persona_path + '" height="50" />';}},
                    { data				: 'equipo_nombre', name : 'equipo_nombre'},
                    { data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
                    { data				: 'tipo_acceso_nombre_castellano', name : 'tipo_acceso_nombre_castellano'},
                    { data				: 'tipo_perfil_nombre_castellano', name : 'tipo_perfil_nombre_castellano'},
                    { data				: 'tipo_categoria_nombre_castellano', name : 'tipo_categoria_nombre_castellano'},
                    { data				: 'persona_nombre', name : 'persona_nombre'},
                    { data				: 'persona_user', name : 'persona_user'},
                    { data				: 'persona_email', name : 'persona_email'},
                    { data				: 'persona_telefono', name : 'persona_telefono'},
                    { data				: 'persona_observacion', name : 'persona_observacion'},
                    { data				: 'persona_usuario', name : 'persona_usuario'},
                    { data				: 'persona_fecha_hora', name : 'persona_fecha_hora'},
                    { data				: 'persona_ip', name : 'persona_ip'},
                ]
            });
        });

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