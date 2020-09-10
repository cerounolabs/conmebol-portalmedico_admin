<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val101			= $_POST['var101'];
	$val102			= strtoupper(strtolower(trim($_POST['var102'])));
	$val103			= strtoupper(strtolower(trim($_POST['var103'])));
	$val104			= $_POST['var104'];
	$val105			= $_POST['var105'];
	$val106			= strtoupper(strtolower(trim($_POST['var106'])));
	$val107			= $_POST['var107'];
	$val108			= strtoupper(strtolower(trim($_POST['var108'])));
	
	$work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];
	$work04         = $_POST['workTest'];
	$work05         = $_POST['workCompeticion'];
	$work06         = $_POST['workEncuentro'];
	$work07         = $_POST['workEquipo'];
	$work08         = $_POST['workAntExamen'];
	$work09         = $_POST['workEstado'];
	$work10         = $_POST['workTipo'];
	$work11         = $_POST['workRegistro'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

    if (isset($val101) && isset($val102) && isset($val103) && isset($val104)) {
        $dataJSON = json_encode(
			array(
				'competicion_codigo'				=> $work05,
				'equipo_codigo'						=> $work07,
				'tipo_persona_codigo'				=> $val101,
				'tipo_genero_codigo'				=> $val104,
				'tipo_documento_codigo'				=> $val107,
				'persona_nombre'					=> $val102,
				'persona_apellido'					=> $val103,
				'persona_fecha_nacimiento'			=> $val105,
				'persona_documento'					=> $val108,
				'persona_posicion'					=> $val106,
				'auditoria_usuario'					=> $log_01,
				'auditoria_fecha_hora'				=> date('Y-m-d H:i:s'),
				'auditoria_ip'						=> $log_03
			));

		switch($work02){
			case 'C':
				$result	= post_curl('200/competicion/persona', $dataJSON);
				$result	= json_decode($result, true);
				$work01 = $result['codigo'];
				break;

			case 'U':
				$result	= put_curl('200/competicion/persona/'.$work01, $dataJSON);
				break;

			case 'D':
				$result	= delete_curl('200/competicion/persona/'.$work01, $dataJSON);
				break;
		}
		
		$code 	= $result['code'];
		$msg	= $result['message'];
	} else {
		$code 	= 204;
		$msg	= 'Error. Algún esta vacio, verifique';
	}
	
	header('Location: ../../examen/'.$work03.'code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>