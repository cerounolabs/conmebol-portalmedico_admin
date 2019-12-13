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

    if(isset($_GET['tipo'])){
        $valorTipo          = $_GET['tipo'];
    } else {
        $valorTipo          = 'COM';
    }

    if(isset($_GET['disciplina'])){
        $valorDisciplina    = $_GET['disciplina'];
    } else {
        $valorDisciplina    = 'FOOTBALL';
    }

    if($valorTipo === 'COM'){
        $urlTipo            = 'juego';
    } else {
        $urlTipo            = 'lesion';
    }

    $competenciaJSON = get_curl('200/disciplina/'.$valorDisciplina.'/'.$usu_04);
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
                                    <li class="breadcrumb-item active" aria-current="page">COMPETENCIAS</li>
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
                        <div class="row">
<?php
    if ($competenciaJSON['code'] === 200) {
        foreach ($competenciaJSON['data'] as $competenciaKEY => $competenciaVALUE) {
?>
                            <div class="col-md-2">
                                <div class="card" style="height:200px; padding:20px;">
                                    <a href="../public/<?php echo $urlTipo; ?>.php?tipo=<?php echo $valorTipo; ?>&disciplina=<?php echo $valorDisciplina; ?>&competencia=<?php echo $competenciaVALUE['competicion_codigo']; ?>" style="height:100%">
                                        <img class="card-img-top img-responsive" src="../<?php echo $competenciaVALUE['competicion_imagen_path']; ?>" alt="<?php echo $competenciaVALUE['competicion_nombre']; ?>" style="height:100%">
                                    <!--
                                    <div class="card-body">
                                        <h4 class="card-title"><?php //echo $competenciaVALUE['competicion_nombre']; ?></h4>
                                        Ver Juegos
                                    </div>
                                    -->
                                    </a>
                                </div>
                            </div>
<?php
        }
    }
?>
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