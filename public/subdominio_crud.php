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

    if(isset($_GET['codigo'])){
        $workCodigo     = $_GET['codigo'];
    }

    if(isset($_GET['dominio'])){
        $workDominio    = $_GET['dominio'];
        $titleDominio   = getTitleDominioSub($workDominio);
        $valDominio     = getDominioSub($workDominio);
        $dominioJSON    = get_curl('000/dominio/'.$valDominio);
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('100/'.$workCodigo);
		if ($dataJSON['code'] == 200){
            $row_01			= $dataJSON['data'][0]['tipo_sub_estado_codigo'];
            $row_02			= $dataJSON['data'][0]['tipo_codigo'];
            $row_03			= $dataJSON['data'][0]['tipo_sub_orden'];
            $row_04_1		= $dataJSON['data'][0]['tipo_sub_nombre_ingles'];
            $row_04_2		= $dataJSON['data'][0]['tipo_sub_nombre_castellano'];
            $row_04_3		= $dataJSON['data'][0]['tipo_sub_nombre_portugues'];
			$row_05			= $dataJSON['data'][0]['tipo_sub_path'];
            $row_06			= $dataJSON['data'][0]['tipo_sub_dominio'];
            $row_07			= $dataJSON['data'][0]['tipo_sub_observacion'];
        }
        
        if ($row_01 === 'A'){
            $row_01_h = 'selected';
            $row_01_d = '';
        }else{
            $row_01_h = '';
            $row_01_d = 'selected';
        }
    } else {
        $row_01			= '';
        $row_01_h       = 'selected';
        $row_01_d       = '';
        $row_02			= '';
        $row_03			= 0;
        $row_04_1		= '';
        $row_04_2		= '';
        $row_04_3		= '';
        $row_05			= '';
        $row_06			= '';
        $row_07			= '';
    }
    
	switch($workModo){
		case 'C':
			$workReadonly	= '';
			$workATitulo	= 'Agregar';
			$workAStyle		= 'btn-info';
			break;
		case 'R':
			$workReadonly	= 'disabled';
			$workATitulo	= 'Ver';
			$workAStyle		= 'btn-primary';
			break;
		case 'U':
			$workReadonly	= '';
			$workATitulo	= 'Actualizar';
			$workAStyle		= 'btn-success';
			break;
		case 'D':
			$workReadonly	= 'disabled';
			$workATitulo	= 'Eliminar';
			$workAStyle		= 'btn-danger';
			break;
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
                            <div class="d-flex align-items-center"></div>
                        </div>
                        <div class="col-7 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="../public/home.php">Home</a>
                                        </li>
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../public/dominio.php?dominio=<?php echo $workDominio; ?>"><?php echo $titleDominio; ?></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Mantenimiento</li>
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
                    <!-- row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $titleDominio; ?></h4>
                                    <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/subdominio.php">
                                        <div class="form-group">
                                            <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                            <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                            <input id="workDominio" name="workDominio" class="form-control" type="hidden" placeholder="Dominio" value="<?php echo $workDominio; ?>" required readonly>
                                        </div>
                                        
                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var01">ESTADO</label>
                                                    <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;" <?php echo $workReadonly; ?>>
                                                        <optgroup label="ESTADO">
                                                            <option value="A" <?php echo $row_01_h; ?>>ACTIVO</option>
                                                            <option value="I" <?php echo $row_01_d; ?>>INACTIVO</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var03">ORDEN</label>
                                                    <input id="var03" name="var03" class="form-control" type="number" style="text-transform:uppercase; height:40px;" placeholder="ORDEN" value="<?php echo $row_03; ?>" <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var02">TIPO</label>
                                                    <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required <?php echo $workReadonly; ?>>
                                                        <optgroup label="TIPO">
<?php
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A'){
                if ($dominioVALUE['tipo_codigo'] === $row_02){
                    $selected = 'selected';
                } else {
                    $selected = '';
                }

?>
                                                            <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre_ingles'].' - '.$dominioVALUE['tipo_nombre_castellano'].' - '.$dominioVALUE['tipo_nombre_portugues']; ?></option>
<?php
            }
        }
    }
?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var04_1">NOMBRE EN INGLES</label>
                                                    <input id="var04_1" name="var04_1" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NOMBRE EN INGLES" value="<?php echo $row_04_1; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var04_2">NOMBRE EN CASTELLANO</label>
                                                    <input id="var04_2" name="var04_2" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NOMBRE EN CASTELLANO" value="<?php echo $row_04_2; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var04_3">NOMBRE EN PORTUGUES</label>
                                                    <input id="var04_3" name="var04_3" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NOMBRE EN PORTUGUES" value="<?php echo $row_04_3; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var05">IMAGEN</label>
                                                    <input id="var05" name="var05" class="form-control" type="text" style="text-transform:lowercase; height:40px;" placeholder="IMAGEN" value="<?php echo $row_05; ?>" <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var06">DOMINIO</label>
                                                    <input id="var06" name="var06" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="DOMINIO" value="<?php echo $workDominio; ?>" required readonly>
                                                </div>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="var07">OBSERVACI&oacute;N</label>
                                            <textarea id="var07" name="var07" class="form-control" rows="5" style="text-transform:uppercase;"  <?php echo $workReadonly; ?>><?php echo $row_07; ?></textarea>
                                        </div>

                                        <button type="submit" class="btn <?php echo $workAStyle; ?>"><?php echo $workATitulo; ?></button>
                                        <a role="button" class="btn btn-dark" href="../public/subdominio.php?dominio=<?php echo $workDominio; ?>">Volver</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
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
    
    if ($codeRest === 204 || $codeRest === 400) {
?>
        <script>
            $(function() {
                toastr.error('<?php echo $msgRest; ?>', 'Error!');
            });
        </script>
<?php
    }
?>
    </body>
</html>