<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val101         = $_POST['var101'];
    $val102         = strtoupper($_POST['var102']);
    $val103         = $_POST['var103'];
	$val104      	= $_POST['var104'];

	$val201      	= $_POST['var201'];
	$val202			= $_POST['var202'];
	$val203         = $_POST['var203'];

	$val301      	= $_POST['var301'];
	$val302			= $_POST['var302'];
	$val303         = $_POST['var303'];
	$val304      	= $_POST['var304'];
	$val305			= $_POST['var305'];
	$val306         = $_POST['var306'];
	$val307      	= $_POST['var307'];

	$val401         = $_POST['var401'];
    $val402         = $_POST['var402'];
    $val403         = $_POST['var403'];
	$val404      	= strtoupper($_POST['var404']);

	$work01         = $_POST['workTipo'];
    $work02         = $_POST['workDisciplina'];
	$work03         = $_POST['workCompetencia'];
	$work04         = $_POST['workEquipo'];
	$work05         = $_POST['workJuego'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($work01) && isset($work02) && isset($work03) && isset($work04) && isset($work05) && isset($log_01) && isset($log_03)) {
        $dataJSON = json_encode(
            array(
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));
		
		$result	= post_curl('400', $dataJSON);
	}

	$result		= json_decode($result, true);

	header('Location: ../../public/lesion_crud.php?tipo='.$work01.'&disciplina='.$work02.'&competencia='.$work03.'&equipo='.$work04.'&juego='.$work05.'&code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>