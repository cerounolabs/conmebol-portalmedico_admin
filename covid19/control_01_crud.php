<?php
    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';

    if ($usu_04 != 39393){
//        header('Location: ../public/home.php?code=401&msg=No tiene permiso para ingresar!Contacte con TI');
    }

    $var04          = date('Y');
    $dominioJSON    = get_curl('000');
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
                                            <a href="../public/covid19.php">COVID19</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">ALTA DE PRUEBA</li>
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
                    <form method="post" action="../class/crud/covid19.php" class="validation-wizard wizard-circle">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body" style="background-color:#005ea6; color:#ffffff;">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var101">Periodo</label>
                                                        <input id="var101" name="var101" value="<?php echo $var04; ?>" type="number" min="2019" max="<?php echo $var04; ?>" class="form-control" style="width:100%; height:40px;" required>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var102">Disciplina</label>
                                                        <select id="var102" name="var102" onchange="changeDisciplina(<?php echo $usu_04; ?>, 'var101', 'var102', 'var103');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                            <optgroup label="Disciplina">
                                                                <option value="FOOTBALL">F&uacute;tbol de Campo</option>
                                                                <option value="FUTSAL">F&uacute;tbol de Sal&oacute;n</option>
                                                                <option value="BEACH_SOCCER">F&uacute;tbol de Playa</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var103">Competencia</label>
                                                        <select id="var103" name="var103" onchange="changeCompetencia(<?php echo $usu_04; ?>, 'var101', 'var103', 'var104');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var104">Encuentro</label>
                                                        <select id="var104" name="var104" onchange="changeJuego('var104', 'var105');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var105">Equipo</label>
                                                        <select id="var105" name="var105" onchange="loadDiv('var105', 'var103');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4">
                                                    <div class="form-group">
                                                        <label for="var106">Fecha Prueba</label>
                                                        <input id="var106" name="var106" class="form-control" type="date" style="text-transform:lowercase; height:40px;" placeholder="FECHA" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="divjugador">

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="form-group">
                                        <input id="workCodigo" name="workCodigo" class="form-control" type="hidden" placeholder="Codigo" value="" required readonly>
                                        <input id="workModo" name="workModo" class="form-control" type="hidden" placeholder="Modo" value="C" required readonly>
                                        <input id="workSPers" name="workSPers" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSinPers; ?>" required readonly>
                                        <input id="workSFam" name="workSFam" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSinFam; ?>" required readonly>
                                        <input id="workSerologia" name="workSerologia" class="form-control" type="hidden" placeholder="Modo" value="<?php echo $indSerolgia; ?>" required readonly>
                                    </div>
                                    <div class="card-body" style="">
                                        <button type="submit" type="submit" class="btn btn-info"> Guardar </button>
                                        <a role="button" class="btn btn-dark" href="../covid19/control_01.php"> Volver </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

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
            changeDisciplina(<?php echo $usu_04; ?>, 'var101', 'var102', 'var103');
            changeCompetencia(<?php echo $usu_04; ?>, 'var101', 'var103', 'var104');
//            selDominio('var204', 'COVID19SINTOMA');
//            selDominio('var205', 'COVID19SINTOMA');

            function loadDiv(var01, var02) {
                var html    = '';
                var selSer  = '';
                var selEqu  = document.getElementById(var01);
                var selCom  = document.getElementById(var02);
                var xJSON   = getJugador(selCom.value, selEqu.value);
                var xJSON1  = getDominio('COVID19SINTOMA');

                xJSON1.forEach(element1 => {
					if (element1.tipo_estado_codigo == 'A') {
						selSer = selSer + '                               <option value="'+ element1.tipo_codigo +'">'+ element1.tipo_nombre_castellano +'</option>';
					}
				});

                xJSON.forEach(element => {
    //                if (element.juego_codigo == selPart.value) {
                        html = html+
                            '            <div class="row">'+
                            '               <div class="col-12">'+
                            '                   <div class="card">'+
                            '                       <div class="card-body" style="background-color:#ffffff; color:#005ea6;">'+
                            '                           <div class="form-body">'+
                            '                               <div class="row">'+
                            '                                   <div class="col-sm-12 col-md-12">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var201">Nombre</label>'+
                            '                                           <select id="var201" name="var201" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                                   <option value="'+ element.jugador_codigo +'"> '+ element.jugador_completo +'</option>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                               </div>'+
                            '                               <div class="row">'+
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var202">Personas Adultas</label>'+
                            '                                           <select id="var202" name="var202" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                               <optgroup label="Cantidad">'+
                            '                                                   <option value="0">Vive solo</option>'+
                            '                                                   <option value="1">1 Persona</option>'+
                            '                                                   <option value="2">2 Persona</option>'+
                            '                                                   <option value="3">3 Persona</option>'+
                            '                                                   <option value="4">4 Persona</option>'+
                            '                                                   <option value="5">5 Persona</option>'+
                            '                                                   <option value="6">6 Persona</option>'+
                            '                                                   <option value="7">7 Persona</option>'+
                            '                                                   <option value="8">8 Persona</option>'+
                            '                                                   <option value="9">9 Persona</option>'+
                            '                                                   <option value="10">10 Persona</option>'+
                            '                                               </optgroup>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                                   '+
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var203"> Personas Menores </label>'+
                            '                                           <select id="var203" name="var203" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                               <optgroup label="Cantidad">'+
                            '                                                   <option value="0">Vive solo</option>'+
                            '                                                   <option value="1">1 Persona</option>'+
                            '                                                   <option value="2">2 Persona</option>'+
                            '                                                   <option value="3">3 Persona</option>'+
                            '                                                   <option value="4">4 Persona</option>'+
                            '                                                   <option value="5">5 Persona</option>'+
                            '                                                   <option value="6">6 Persona</option>'+
                            '                                                   <option value="7">7 Persona</option>'+
                            '                                                   <option value="8">8 Persona</option>'+
                            '                                                   <option value="9">9 Persona</option>'+
                            '                                                   <option value="10">10 Persona</option>'+
                            '                                               </optgroup>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                                   '+
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var204"> S&iacute;ntomas Personales </label>'+
                            '                                           <select id="var204" name="var204" onchange="" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+ selSer +
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                                   '+
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                       <div class="form-group">'+
                            '                                           <label for="var205">S&iacute;ntomas Familiares</label>'+
                            '                                           <select id="var205" name="var205" onchange="" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+ selSer +
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
                            '                               </div>'+
                            '                               '+
                            '                               <div class="row">'+
<?php
    if ($dominioJSON['code'] === 200){
        $indSerolgia = 0;
        foreach ($dominioJSON['data'] as $dominioKEY => $dominioVALUE) {
            if ($dominioVALUE['tipo_estado_codigo'] === 'A' && $dominioVALUE['tipo_dominio'] === 'COVID19SEROLOGIA'){
?>
                            '                                   <div class="col-sm-12 col-md-3">'+
                            '                                      <div class="form-group">'+
                            '                                            <input id="var2061_<?php echo $indSerolgia; ?>" name="var2061_<?php echo $indSerolgia; ?>" value="<?php echo $dominioVALUE['tipo_codigo']; ?>" class="form-control" type="hidden" required readonly>'+
                            '                                           <label for="var2062_<?php echo $indSerolgia; ?>"> Serolog&iacute;a <?php echo $dominioVALUE['tipo_nombre_castellano']; ?> </label>'+
                            '                                           <select id="var2062_<?php echo $indSerolgia; ?>" name="var2062_<?php echo $indSerolgia; ?>" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
                            '                                               <optgroup label="Presento">'+
                            '                                                   <option value="N">NO</option>'+
                            '                                                   <option value="S">SI</option>'+
                            '                                               </optgroup>'+
                            '                                           </select>'+
                            '                                       </div>'+
                            '                                   </div>'+
<?php
                $indSerolgia = $indSerolgia + 1;
            }
        }
    }
?>
                            '                               </div>'+
                            '                            </div>'+
                            '                        </div>'+
                            '                    </div>'+
                            '                </div>'+
                            '            </div>';

    //                }
                });

                $("#divjugador").empty();
                            $("#divjugador").append(html);
            }
        </script>
    </body>
</html>