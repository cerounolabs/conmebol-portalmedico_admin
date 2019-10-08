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
        $valueDominio   = getDominioSub($workDominio);
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('100/dominio/'.$workCodigo);
		if ($dataJSON['code'] == 200){
			$row_01			= $dataJSON['data'][0]['tipo_sub_estado_codigo'];
			$row_02			= $dataJSON['data'][0]['tipo_sub_estado_nombre'];
			$row_03			= $dataJSON['data'][0]['tipo_sub_nombre'];
			$row_04			= $dataJSON['data'][0]['tipo_sub_orden'];
            $row_05			= $dataJSON['data'][0]['tipo_sub_dominio'];
            $row_06			= $dataJSON['data'][0]['tipo_sub_observacion'];
            $row_07			= $dataJSON['data'][0]['tipo_codigo'];
			$row_08			= $dataJSON['data'][0]['tipo_nombre'];
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
        $row_03			= '';
        $row_04			= 0;
        $row_05			= '';
        $row_06			= '';
        $row_07			= '';
        $row_08			= '';
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
                                        <a href="../public/subdominio.php?dominio=<?php echo $workDominio; ?>"><?php echo $titleDominio; ?></a>
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
                                    <div class="form-group">
                                        <label for="dominioEstado">Estado</label>
                                		<select id="dominioEstado" name="dominioEstado" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?>>
                                    		<optgroup label="Estado">
                                        		<option value="A" <?php echo $row_01_h; ?>>ACTIVO</option>
                                        		<option value="I" <?php echo $row_01_d; ?>>INACTIVO</option>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dominioOrden">Orden</label>
                                        <input id="dominioOrden" name="dominioOrden" class="form-control" type="number" style="text-transform:uppercase;" placeholder="Orden" value="<?php echo $row_04; ?>" <?php echo $workReadonly; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="dominioTipo">Tipo</label>
                                		<select id="dominioTipo" name="dominioTipo" class="select2 form-control custom-select" style="width: 100%; height:36px;" <?php echo $workReadonly; ?> required>
                                    		<optgroup label="Tipo">
<?php
    $dominioJSON = get_curl('000/'.$valueDominio);

    foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
        $row_dominio_00 = $dominioVALUE['tipo_codigo'];
        $row_dominio_01 = $dominioVALUE['tipo_estado_codigo'];
        $row_dominio_02 = $dominioVALUE['tipo_nombre'];

        if ($row_dominio_01 == 'H'){
            if ($row_dominio_00 == $row_07){
                $row_01_selected = 'selected';
            } else {
                $row_01_selected = '';
            }
?>
                                        		<option value="<?php echo $row_dominio_00; ?>" <?php echo $row_01_selected; ?>><?php echo $row_dominio_02; ?></option>
<?php
        }
    }
?>
                                    		</optgroup>
                                		</select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dominioNombre">Nombre</label>
                                        <input id="dominioNombre" name="dominioNombre" class="form-control" type="text" style="text-transform:uppercase;" placeholder="Nombre" value="<?php echo $row_03; ?>" required <?php echo $workReadonly; ?>>
                                    </div>
                                    <div class="form-group">
                                        <label for="dominioValor">Dominio</label>
                                        <input id="dominioValor" name="dominioValor" class="form-control" type="text" style="text-transform:uppercase;" placeholder="Dominio" value="<?php echo $workDominio; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                    	<label for="dominioObservacion">Observaci&oacute;n</label>
                                    	<textarea id="dominioObservacion" name="dominioObservacion" class="form-control" rows="5" <?php echo $workReadonly; ?>><?php echo $row_06; ?></textarea>
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
    
    if ($codeRest == 204) {
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