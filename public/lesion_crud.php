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
    } else {
        $workCodigo     = $usu_04;
    }

    if(isset($_GET['mode'])){
        $workModo       = $_GET['mode'];
    } else {
        $workModo       = 'C';
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
			$row_08			= 'conmebol2019';
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
            $workReadonly	= 'disabled';
            $workReadonly2	= 'disabled';
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
                                            <a href="../public/lesion.php">LESI&Oacute;N</a>
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
                                <div class="card-body wizard-content">
                                    <h4 class="card-title">Alta de Colaborador</h4>
                                    <h6 class="card-subtitle">Favor complete todos los campos posible.</h6>
                                    <form action="#" class="validation-wizard wizard-circle m-t-40">
                                        <!-- Step 1 -->
                                        <h6>Datos del Clima</h6>
                                        <section>
                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Primer Nombre</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var001"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var001" name="var001" class="form-control" placeholder="Primer Nombre" style="height:40px;" aria-label="Primer Nombre" aria-describedby="basic-var001" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Segundo Nombre</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var002"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var002" name="var002" class="form-control" placeholder="Segundo Nombre" style="height:40px;" aria-label="Segundo Nombre" aria-describedby="basic-var002">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Primer Apellido</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var003"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var003" name="var003" class="form-control" placeholder="Primer Apellido" style="height:40px;" aria-label="Primer Apellido" aria-describedby="basic-var003" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Segundo Apellido</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var004"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var004" name="var004" class="form-control" placeholder="Segundo Apellido" style="height:40px;" aria-label="Segundo Apellido" aria-describedby="basic-var004">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>N&uacute;mero Documento</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var005"><i class="ti-id-badge"></i></span>
                                                            </div>
                                                            <input type="text" id="var005" name="var005" class="form-control" placeholder="N&uacute;mero Documento" style="height:40px;" aria-label="N&uacute;mero Documento" aria-describedby="basic-var005" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Estado Civil</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var006" name="var006" style="width:100%; height:40px;" aria-label="Estado Civil" aria-describedby="basic-var006" required>
    <?php
        if ($dominioJSON['code'] === 200){
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 'H' && $dominioVALUE['tipo_dominio'] === 'ESTADOCIVIL'){
    ?>
                                                                <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>
    <?php
                }
            }
        }
    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Sexo</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var007" name="var007" style="width:100%; height:40px;" aria-label="Sexo" aria-describedby="basic-var007" required>
    <?php
        if ($dominioJSON['code'] === 200){
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 'H' && $dominioVALUE['tipo_dominio'] === 'SEXO'){
    ?>
                                                                <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>
    <?php
                }
            }
        }
    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Fecha Nacimiento</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var008"><i class="ti-gift"></i></span>
                                                            </div>
                                                            <input type="date" id="var008" name="var008" class="form-control" placeholder="Fecha Nacimiento" aria-label="Fecha Nacimiento" style="height:40px;" aria-describedby="basic-var008" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>¿Cu&aacute;ntos hijos/as tienes?</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var009" name="var009" style="width:100%; height:40px;" aria-label="¿Cu&aacute;ntos hijos/as tienes?" aria-describedby="basic-var009" required>
                                                                <option value="0"> 0 </option>
                                                                <option value="1"> 1 </option>
                                                                <option value="2"> 2 </option>
                                                                <option value="3"> 3 </option>
                                                                <option value="4"> 4 </option>
                                                                <option value="5"> 5 </option>
                                                                <option value="6"> 5+ </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Step 1 -->

                                        <h6>Datos Personales</h6>
                                        <section>
                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Primer Nombre</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var001"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var001" name="var001" class="form-control" placeholder="Primer Nombre" style="height:40px;" aria-label="Primer Nombre" aria-describedby="basic-var001" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Segundo Nombre</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var002"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var002" name="var002" class="form-control" placeholder="Segundo Nombre" style="height:40px;" aria-label="Segundo Nombre" aria-describedby="basic-var002">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Primer Apellido</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var003"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var003" name="var003" class="form-control" placeholder="Primer Apellido" style="height:40px;" aria-label="Primer Apellido" aria-describedby="basic-var003" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Segundo Apellido</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var004"><i class="ti-user"></i></span>
                                                            </div>
                                                            <input type="text" id="var004" name="var004" class="form-control" placeholder="Segundo Apellido" style="height:40px;" aria-label="Segundo Apellido" aria-describedby="basic-var004">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>N&uacute;mero Documento</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var005"><i class="ti-id-badge"></i></span>
                                                            </div>
                                                            <input type="text" id="var005" name="var005" class="form-control" placeholder="N&uacute;mero Documento" style="height:40px;" aria-label="N&uacute;mero Documento" aria-describedby="basic-var005" required>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Estado Civil</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var006" name="var006" style="width:100%; height:40px;" aria-label="Estado Civil" aria-describedby="basic-var006" required>
    <?php
        if ($dominioJSON['code'] === 200){
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 'H' && $dominioVALUE['tipo_dominio'] === 'ESTADOCIVIL'){
    ?>
                                                                <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>
    <?php
                }
            }
        }
    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Sexo</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var007" name="var007" style="width:100%; height:40px;" aria-label="Sexo" aria-describedby="basic-var007" required>
    <?php
        if ($dominioJSON['code'] === 200){
            foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
                if ($dominioVALUE['tipo_estado_codigo'] === 'H' && $dominioVALUE['tipo_dominio'] === 'SEXO'){
    ?>
                                                                <option value="<?php echo $dominioVALUE['tipo_codigo']; ?>"><?php echo $dominioVALUE['tipo_nombre']; ?></option>
    <?php
                }
            }
        }
    ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>Fecha Nacimiento</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="basic-var008"><i class="ti-gift"></i></span>
                                                            </div>
                                                            <input type="date" id="var008" name="var008" class="form-control" placeholder="Fecha Nacimiento" aria-label="Fecha Nacimiento" style="height:40px;" aria-describedby="basic-var008" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row pt-3">
                                                <div class="col-sm-12 col-md-3">
                                                    <div class="form-group">
                                                        <label>¿Cu&aacute;ntos hijos/as tienes?</label>
                                                        <div class="input-group mb-3">
                                                            <select class="custom-select form-control" id="var009" name="var009" style="width:100%; height:40px;" aria-label="¿Cu&aacute;ntos hijos/as tienes?" aria-describedby="basic-var009" required>
                                                                <option value="0"> 0 </option>
                                                                <option value="1"> 1 </option>
                                                                <option value="2"> 2 </option>
                                                                <option value="3"> 3 </option>
                                                                <option value="4"> 4 </option>
                                                                <option value="5"> 5 </option>
                                                                <option value="6"> 5+ </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- Step 1 -->
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

        <script>
            var form = $(".validation-wizard").show();

            $(".validation-wizard").steps({
                headerTag: "h6",
                bodyTag: "section",
                transitionEffect: "fade",
                titleTemplate: '<span class="step">#index#</span> #title#',
                labels: {
                    finish: "Enviar",
                    previous: "Anterior",
                    next: "Siguiente"
                },
                onStepChanging: function(event, currentIndex, newIndex) {
                    return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                },
                onFinishing: function(event, currentIndex) {
                    return form.validate().settings.ignore = ":disabled", form.valid()
                },
                onFinished: function(event, currentIndex) {
                    swal("Formulario enviado!", "Se realizo el envio del formulario. Muchas Gracias y BIENVENIDO/A A CARSA");
                }
            }), $(".validation-wizard").validate({
                ignore: "input[type=hidden]",
                errorClass: "text-danger",
                successClass: "text-success",
                highlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass(errorClass)
                },
                errorPlacement: function(error, element) {
                    error.insertAfter(element)
                },
                rules: {
                    email: {
                        email: !0
                    }
                }
            })
        </script>
    </body>
</html>