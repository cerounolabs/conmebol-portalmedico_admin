<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 11 && $usu_05 != 9){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

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

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    }

    $dominioJSON        = get_curl('000');
    $organizacionJSON   = get_curl('500');
    $equipoJSON         = get_curl('300');

	if ($workCodigo <> 0){
		$dataJSON			= get_curl('400/'.$workCodigo);
		if ($dataJSON['code'] == 200){
            $row_01			= $dataJSON['data'][0]['tipo_estado_codigo'];
            $row_02			= $dataJSON['data'][0]['tipo_acceso_codigo'];
            $row_03			= $dataJSON['data'][0]['tipo_perfil_codigo'];
            $row_04         = $dataJSON['data'][0]['equipo_codigo'];
            $row_05         = $dataJSON['data'][0]['persona_nombre'];
            $row_06			= $dataJSON['data'][0]['persona_email'];
            $row_07         = $dataJSON['data'][0]['persona_user'];
			$row_08			= $dataJSON['data'][0]['persona_contrasenha'];
            $row_09			= $dataJSON['data'][0]['persona_path'];
            $row_10			= $dataJSON['data'][0]['persona_telefono'];
            $row_11			= $dataJSON['data'][0]['persona_observacion'];
            $row_12			= $dataJSON['data'][0]['tipo_categoria_codigo'];
        }
    } else {
        $row_01			= '';
        $row_02			= '';
        $row_03			= 0;
        $row_04         = '';
        $row_05			= '';
        $row_06			= '';
        $row_07			= '';
        $row_08			= '';
        $row_09			= '';
        $row_10			= '';
        $row_11			= '';
        $row_12			= '';
    }
    
	switch($workModo){
		case 'C':
            $workReadonly	= '';
            $workReadonly2	= '';
			$workATitulo	= 'Agregar';
			$workAStyle		= 'btn-info';
			break;
		case 'R':
            $workReadonly	= 'disabled';
            $workReadonly2	= 'disabled';
			$workATitulo	= 'Ver';
			$workAStyle		= 'btn-primary';
			break;
		case 'U':
            $workReadonly	= '';
            $workReadonly2	= 'disabled';
			$workATitulo	= 'Actualizar';
			$workAStyle		= 'btn-success';
			break;
		case 'D':
            $workReadonly	= 'readonly';
            $workReadonly2	= 'readonly';
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
                                        <li class="breadcrumb-item" aria-current="page">
                                            <a href="../public/persona.php">PERSONAS</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">MANTENIMIENTO</li>
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
                                    <h4 class="card-title">PERSONAS</h4>
                                    <form id="form" data-parsley-validate class="m-t-30" method="post" action="../class/crud/persona.php">
                                        <div class="form-group">
                                            <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="<?php echo $workCodigo; ?>" required readonly>
                                            <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $workModo; ?>" required readonly>
                                        </div>
                                        
                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var01">ESTADO</label>
                                                    <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;" required <?php echo $workReadonly; ?>>
                                                        <optgroup label="Estado">
<?php
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'USUARIOESTADO'){
                if ($dominioVALUE['tipo_codigo'] === $row_01){
                    $selected = 'selected';
                } else {
                    $selected = '';
                }

?>
                                                            <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var02">ACCESO</label>
                                                    <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required <?php echo $workReadonly; ?>>
                                                        <optgroup label="Acceso">
<?php
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'USUARIOACCESO'){
                if ($dominioVALUE['tipo_codigo'] === $row_02){
                    $selected = 'selected';
                } else {
                    $selected = '';
                }

?>
                                                            <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var03">PERFIL</label>
                                                    <select id="var03" name="var03" class="select2 form-control custom-select" style="width:100%; height:40px;" required <?php echo $workReadonly; ?>>
                                                        <optgroup label="Perfil">
<?php
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'USUARIOROL'){
                if ($dominioVALUE['tipo_codigo'] === $row_03){
                    $selected = 'selected';
                } else {
                    $selected = '';
                }

?>
                                                            <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
<?php
            }
        }
    }
?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var12">CATEGOR&Iacute;A</label>
                                                    <select id="var12" name="var12" class="select2 form-control custom-select" style="width:100%; height:40px;" required <?php echo $workReadonly; ?>>
                                                        <optgroup label="Categoría">
<?php
    if($dominioJSON['code'] === 200){
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'COMPETENCIACATEGORIA'){
                if ($dominioVALUE['tipo_codigo'] === $row_12){
                    $selected = 'selected';
                } else {
                    $selected = '';
                }

?>
                                                            <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $dominioVALUE['tipo_nombre_castellano']; ?></option>
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
                                                    <label for="var04">EQUIPO</label>
                                                    <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;" required <?php echo $workReadonly; ?>>
<?php
    if($organizacionJSON['code'] === 200){
        foreach ($organizacionJSON['data'] as $organizacionKEY => $organizacionVALUE) {
?>
                                                        <optgroup label="<?php echo $organizacionVALUE['organizacion_nombre']; ?>">
<?php
            if($equipoJSON['code'] === 200){
                foreach ($equipoJSON['data'] as $equipoKEY => $equipoVALUE) {
                    if($equipoVALUE['organizacion_codigo'] === $organizacionVALUE['organizacion_codigo']){
                        if ($equipoVALUE['equipo_codigo'] === $row_04){
                            $selected = 'selected';
                        } else {
                            $selected = '';
                        }

?>
                                                            <option value="<?php echo $equipoVALUE['equipo_codigo']; ?>" <?php echo $selected; ?>><?php echo $equipoVALUE['equipo_nombre']; ?></option>
<?php
                    }
                }
            }
        }
    }
?>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var05">PERSONA</label>
                                                    <input id="var05" name="var05" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="PERSONA" value="<?php echo $row_05; ?>" required <?php echo $workReadonly; ?>>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var10">TEL&Eacute;FONO</label>
                                                    <input id="var10" name="var10" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="TEL&Eacute;FONO" value="<?php echo $row_10; ?>" <?php echo $workReadonly; ?>>
                                                </div>
                                           </div>
                                        </div>

                                        <div class="row pt-3">
                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var06">EMAIL</label>
                                                    <input id="var06" name="var06" class="form-control" type="email" style="text-transform:lowercase; height:40px;" placeholder="EMAIL" value="<?php echo $row_06; ?>" required <?php echo $workReadonly2; ?>>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var07">USUARIO</label>
                                                    <input id="var07" name="var07" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="USUARIO" value="<?php echo $row_07; ?>" required <?php echo $workReadonly2; ?>>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4">
                                                <div class="form-group">
                                                    <label for="var08">CONTRASE&Ntilde;A</label>
                                                    <input id="var08" name="var08" class="form-control" type="password" style="text-transform:uppercase; height:40px;" placeholder="CONTRASE&Ntilde;A" value="<?php echo $row_08; ?>" required <?php echo $workReadonly2; ?>>
                                                </div>
                                           </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="var11">OBSERVACI&oacute;N</label>
                                            <textarea id="var11" name="var11" class="form-control" rows="5" style="text-transform:uppercase;"  <?php echo $workReadonly; ?>><?php echo $row_11; ?></textarea>
                                        </div>

                                        <button type="submit" class="btn <?php echo $workAStyle; ?>"><?php echo $workATitulo; ?></button>
                                        <a role="button" class="btn btn-dark" href="../public/persona.php">Volver</a>
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