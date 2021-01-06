<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_05 != 11 && $usu_05 != 9){
        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    if(isset($_GET['codigo'])){
        $codPerfil  = $_GET['codigo'];
    } else {
        $codPerfil  = 1;
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
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>

        <div id="main-wrapper">
<?php
    	include '../include/menu.php';
?>

            <div class="page-wrapper">
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

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <h4 class="col-10 card-title">M&Eacute;DICOS</h4>
                                        <h4 class="col-2 card-title" style="text-align: right;"></h4>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="tableLoadCMed" class="table v-middle" style="width: 100%;">
                                            <thead id="tableLoadDMed" class="<?php echo $codPerfil; ?>">
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
                                    <table id="tableLoadCComp" class="table v-middle" style="width: 100%;">
                                            <thead id="tableLoadDComp" class="<?php echo $usu_04; ?>">
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
                                                    <th class="border-top-0" style="text-align:center;">RE-TEST-VAL</th>
                                                    <th class="border-top-0" style="text-align:center;">RE-TEST</th>
                                                    <th class="border-top-0" style="text-align:center;">ACCI&Oacute;N</th>
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
                </div>
<?php
    include '../include/development.php';
?>

            </div>
        </div>

        <div class="chat-windows"></div>
<?php
    include '../include/footer.php';
?>
    
		<script>
			const _parm01BASE = '<?php echo $log_01; ?>';
			const _parm02BASE = '<?php echo date('Y-m-d H:m:s'); ?>';
			const _parm03BASE = '<?php echo $log_03; ?>';
			const _parm04BASE = 'medico.php?codigo=<?php echo $codPerfil; ?>&';
			const _parm05BASE = '<?php echo $codPerfil; ?>';
        </script>
        
        <script src="../js/api.js"></script>
        <script src="../js/medico.js"></script>
        
    </body>
</html>