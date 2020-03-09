<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 11 && $usu_05 != 9){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }
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
                    <div class="col-sm-12 col-md-6">
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
                                                <th class="border-top-0" style="text-align:center;">VER</th>
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

                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="col-10 card-title">COMPETENCIA ASIGNADA</h4>
                                    <h4 class="col-2 card-title" style="text-align: right;">
                                        <a class="btn btn-info" style="background-color:#005ea6; border-color:#005ea6;"  href="javascript:void(0)" role="button" title="Agregar" data-toggle="modal" data-target="#modaldiv" onclick="setCompetenciaPersona();"><i class="ti-plus"></i></a>
                                	</h4>
								</div>
                                <div class="table-responsive">
                                    <table id="tableLoadComp" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigoComp" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;">IMAGEN</th>
                                                <th class="border-top-0" style="text-align:center;">DISCIPLINA</th>
                                                <th class="border-top-0" style="text-align:center;">GENERO</th>
                                                <th class="border-top-0" style="text-align:center;">COMPETENCIA</th>
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
?>

    <script src="../js/api.js"></script>
        
        <script>
            if (localStorage.getItem('medicoJSON') === 'null' || localStorage.getItem('medicoJSON') === null ){
                localStorage.removeItem('medicoJSON');
                localStorage.setItem('medicoJSON', JSON.stringify(<?php echo json_encode(get_curl('400/equipo/'.$usu_04)); ?>));
            }

            if (localStorage.getItem('competenciaJSON') === 'null' || localStorage.getItem('competenciaJSON') === null ){
                localStorage.removeItem('competenciaJSON');
                localStorage.setItem('competenciaJSON', JSON.stringify(<?php echo json_encode(get_curl('200/disciplina/'.$usu_04)); ?>));
            }

            if (localStorage.getItem('competicionMedicoJSON') === 'null' || localStorage.getItem('competicionMedicoJSON') === null ){
                localStorage.removeItem('competicionMedicoJSON');
                localStorage.setItem('competicionMedicoJSON', JSON.stringify(<?php echo json_encode(get_curl('401/competicion')); ?>));
            }

            function setCompetenciaPersona(){
                var codPers = localStorage.getItem('persona_codigo');
                var xJSON   = JSON.parse(localStorage.getItem('competenciaJSON'))['data'];
                var selComp = '';

                xJSON.forEach(element => {
                    selComp = selComp + '                               <option value="'+element.competicion_codigo+'">DISCIPLINA: '+ element.competicion_disciplina +' - COMPETENCIA: '+ element.competicion_nombre + ' - GENERO: ' + element.competicion_genero + ' - PERIODO: ' + element.competicion_anho +'</option>';
                });

                var html    = 
                    '<div class="modal-content">'+
                    '   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_competencia.php">'+
                    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
                    '		    <h4 class="modal-title" id="vcenter"> Agregar Competencia </h4>'+
                    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
                    '	    </div>'+
                    '	    <div class="modal-body" >'+
                    '           <div class="row pt-3">'+
                    '               <div class="col-sm-12">'+
                    '                   <div class="form-group">'+
                    '                       <label for="var02">Competencia</label>'+
                    '                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+selComp+
                    '                       </select>'+
                    '                    </div>'+
                    '                </div>'+
                    '                <div class="col-sm-12">'+
                    '                    <div class="form-group">'+
                    '                        <label for="var03">Comentario</label>'+
                    '                        <textarea id="var03" name="var03" class="form-control" rows="3" style="text-transform:uppercase;" required></textarea>'+
                    '                    </div>'+
                    '                </div>'+
                    '           </div>'+
                    '           <div class="form-group">'+
                    '               <input id="var01" name="var01" value="'+codPers+'" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '               <input id="workModo" name="workModo" value="C" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '               <input id="workCodigo" name="workCodigo" value="0" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '               <input id="workPage" name="workPage" value="medico" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
                    '           </div>'+
                    '	    </div>'+
                    '	    <div class="modal-footer">'+
                    '           <button type="submit" class="btn btn-info">Agregar</button>'+
                    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
                    '	    </div>'+
                    '   </form>'+
                    '</div>';

                $("#modalcontent").empty();
                $("#modalcontent").append(html);
            }
        </script>

        <script src="../js/medico.js"></script>
    </body>
</html>