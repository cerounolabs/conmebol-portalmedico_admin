<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';

	if (isset($_POST['var01_1'])){
		$val01_1        = $_POST['var01_1'];
	} else {
		$val01_1        = 0;
	}

	if (isset($_POST['var01_2'])){
		$val01_2        = $_POST['var01_2'];
	} else {
		$val01_2        = 0;
	}

	if (isset($_POST['var01_3'])){
		$val01_3        = $_POST['var01_3'];
	} else {
		$val01_3        = 0;
	}

	if (isset($_POST['var01_4'])){
		$val01_4        = $_POST['var01_4'];
	} else {
		$val01_4        = 0;
	}

	if (isset($_POST['var01_5'])){
		$val01_5        = $_POST['var01_5'];
	} else {
		$val01_5        = 0;
	}

    $val02          = $_POST['var02'];
    $val03          = $_POST['var03'];
	$val04      	= $_POST['var04'];
	$val05      	= strtoupper($_POST['var05']);
	
	$work01         = $_POST['workCodigo'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($work01) && isset($log_01) && isset($log_03)) {
        $dataJSON = json_encode(
            array(
				'lesion_codigo'									=> $work01,
				'tipo_lesion_examen1_codigo'					=> $val01_1,
				'tipo_lesion_examen2_codigo'					=> $val01_2,
				'tipo_lesion_examen3_codigo'					=> $val01_3,
				'tipo_lesion_examen4_codigo'					=> $val01_4,
				'tipo_lesion_examen5_codigo'					=> $val01_5,
				'lesion_fecha_retorno'							=> $val02,
				'lesion_cirugia'								=> $val03,
				'tipo_diagnostico_tipo_codigo'					=> $val04,
				'diagnostico_observacion'						=> $val05,
				
				'auditoria_usuario'								=> $log_01,
				'auditoria_fecha_hora'							=> date('Y-m-d H:i:s'),
				'auditoria_ip'									=> $log_03
			));
		
		$result	= post_curl('650', $dataJSON);
	}

	$result		= json_decode($result, true);

	header('Location: ../../public/lesion.php?tipo='.$work01.'&disciplina='.$work02.'&competencia='.$work03.'&equipo='.$work04.'&juego='.$work05.'&code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>