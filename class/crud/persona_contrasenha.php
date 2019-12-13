<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

	$val06			= strtolower($_POST['var06']);
	$val07          = strtoupper($_POST['var07']);
	$val08          = $_POST['var08'];

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workPage'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

    if (isset($val06) && isset($val07) && isset($val08)) {
        $dataJSON = json_encode(
            array(
				'persona_user'					=> $val07,
				'persona_contrasenha'			=> $val08,
				'persona_email'					=> $val06,
				'persona_usuario'				=> $log_01,
				'persona_fecha_hora'			=> date('Y-m-d H:i:s'),
				'persona_ip'					=> $log_03
			));
		
		$result	= put_curl('400/reseteo/'.$work01, $dataJSON);
	}

	$result		= json_decode($result, true);

	header('Location: ../../public/'.$work02.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>