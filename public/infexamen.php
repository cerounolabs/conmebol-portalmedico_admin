<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';
    
    $var04  = date('Y');
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
                                    <li class="breadcrumb-item active" aria-current="page">INFORME EXAMEN M&Eacute;DICO</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                <form action="#">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var01">Periodo</label>
                                                    <input id="var01" name="var01" value="<?php echo $var04; ?>" onchange="selectCompetencias(<?php echo $usu_04; ?>, 'var03', 'var01', 'var04'); selectEncuentros(<?php echo $usu_04; ?>, 'var04', 'var01', 2, 'var05'); selectEquipos('var04', 'var05', 2, 'var06');" type="number" min="2019" max="<?php echo $var04; ?>" class="form-control" style="width:100%; height:40px;" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var02">Tipo</label>
                                                    <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var03">Disciplina</label>
                                                    <select id="var03" name="var03" onchange="selectCompetencias(<?php echo $usu_04; ?>, 'var03', 'var01', 'var04'); selectEncuentros(<?php echo $usu_04; ?>, 'var04', 'var01', 2, 'var05'); selectEquipos('var04', 'var05', 2, 'var06');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        <option value="FOOTBALL">F&Uacute;TBOL DE CAMPO</option>
                                                        <option value="FUTSAL">F&Uacute;TBOL DE SAL&Oacute;N</option>
                                                        <option value="BEACH_SOCCER">F&Uacute;TBOL DE PLAYA</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var04">Competici&oacute;n</label>
                                                    <select id="var04" name="var04" onchange="selectEncuentros(<?php echo $usu_04; ?>, 'var04', 'var01', 2, 'var05'); selectEquipos('var04', 'var05', 2, 'var06');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var05">Encuentro</label>
                                                    <select id="var05" name="var05" onchange="selectEquipos('var04', 'var05', 2, 'var06');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3">
                                                <div class="form-group">
                                                    <label for="var06">Equipo</label>
                                                    <select id="var06" name="var06" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4 class="col-10 card-title">Examenes Medicos</h4>
                                    <h4 class="col-2 card-title" style="text-align: right;">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-info dropdown-toggle" style="background-color:#005ea6; border-color:#005ea6;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Exportar
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0)" onclick="getInforme(1);"><i class="far fa-file-excel"></i> Excel</a>
                                            </div>
                                        </div>
                                	</h4>
								</div>
                                <div class="table-responsive">
                                <table id="tableLoad" class="table v-middle" style="width: 100%;">
                                        <thead id="tableCodigo" class="<?php echo $usu_04; ?>">
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;" rowspan="2"></th>
                                                <th class="border-top-0" style="text-align:center;" colspan="3">TEST</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="3">EQUIPO</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="5">PERSONA</th>
                                                <th class="border-top-0" style="text-align:center;" colspan="4">LABORATORIO</th>
                                            </tr>
                                            <tr class="bg-conmebol">
                                                <th class="border-top-0" style="text-align:center;">C&Oacute;DIGO</th>
                                                <th class="border-top-0" style="text-align:center;">ESTADO</th>
                                                <th class="border-top-0" style="text-align:center;">FECHA</th>

                                                <th class="border-top-0" style="text-align:center;">EQUIPO</th>
                                                <th class="border-top-0" style="text-align:center;">LOCAL</th>
                                                <th class="border-top-0" style="text-align:center;">VISITANTE</th>

                                                <th class="border-top-0" style="text-align:center;">NOMBRE</th>
                                                <th class="border-top-0" style="text-align:center;">APELLIDO</th>
                                                <th class="border-top-0" style="text-align:center;">CONVOCADO</th>
                                                <th class="border-top-0" style="text-align:center;">POSICI&Oacute;N</th>
                                                <th class="border-top-0" style="text-align:center;">DOCUMENTO</th>

                                                <th class="border-top-0" style="text-align:center;">NOMBRE</th>
                                                <th class="border-top-0" style="text-align:center;">RESULTADO</th>
                                                <th class="border-top-0" style="text-align:center;">FEC. ENVIO</th>
                                                <th class="border-top-0" style="text-align:center;">FEC. RETORNO</th>
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
                    <div class="modal-dialog modal-dialog-centered" id="modalcontent"></div>
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
    <script src="../js/api.js"></script>
    <script src="../js/infexamen.js"></script>
    <script src="../js/select.js"></script>

    <script>
        function getInforme(codInf){
            var codTipo     = document.getElementById('var02').value;
            var codComp     = document.getElementById('var04').value;
            var codEncu     = document.getElementById('var05').value;
            var codEqui     = document.getElementById('var06').value;

            switch (codInf) {
                case 1:
                    window.location = '../export/export_infexamen.php?cod01=' + codTipo + '&cod02=' + codComp + '&cod03=' + codEncu + '&cod04=' + codEqui;
                    break;
            }
        }

        selectDominio('EXAMENMEDICOTIPO', 0, 'var02');
        selectCompetencias(<?php echo $usu_04; ?>, 'var03', 'var01', 'var04');
        selectEncuentros(<?php echo $usu_04; ?>, 'var04', 'var01', 2, 'var05');
        selectEquipos('var04', 'var05', 2, 'var06');
    </script>
</body>
</html>