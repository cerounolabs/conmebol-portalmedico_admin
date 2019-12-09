<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';

    $val01          = 121;
	$val02      	= strtoupper($_POST['var02']);
	
	$work01         = $_POST['workCodigo'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($work01) && isset($log_01) && isset($log_03)) {
        $dataJSON = json_encode(
            array(
				'lesion_codigo'									=> $work01,
				'tipo_estado_codigo'							=> $val01,
				'diagnostico_observacion'						=> $val02,
				
				'auditoria_usuario'								=> $log_01,
				'auditoria_fecha_hora'							=> date('Y-m-d H:i:s'),
				'auditoria_ip'									=> $log_03
			));
		
		$result	= put_curl('650/'.$work01, $dataJSON);
	}

	$result		= json_decode($result, true);

	header('Location: ../../public/lesion.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>