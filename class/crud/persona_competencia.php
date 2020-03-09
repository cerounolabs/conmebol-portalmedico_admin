<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = $_POST['var01'];
    $val02          = $_POST['var02'];
	$val03          = $_POST['var03'];

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02)) {
        $dataJSON = json_encode(
            array(
				'competicion_codigo'				=> $val02,
				'persona_codigo'					=> $val01,
                'competicion_persona_observacion'	=> $val03,
				'auditoria_usuario'					=> $log_01,
				'auditoria_fecha_hora'				=> date('Y-m-d H:i:s'),
				'auditoria_ip'						=> $log_03
			));

		switch($work02){
			case 'C':
				$result	= post_curl('401', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('401/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('401/'.$work01, $dataJSON);
				break;
		}
	}

	$result		= json_decode($result, true);

	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>