<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val101			= strtoupper(strtolower(trim($_POST['var01'])));
	$val102			= strtoupper(strtolower(trim($_POST['var02'])));
	$val103			= strtoupper(strtolower(trim($_POST['var03'])));
	$val104			= strtoupper(strtolower(trim($_POST['var04'])));
	$val105			= $_POST['var05'];
	$val106			= strtoupper(strtolower(trim($_POST['var06'])));
	$val107			= $_POST['var07'];
	$val108			= strtoupper(strtolower(trim($_POST['var08'])));
	
	$work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];
	
    if (isset($val102) && isset($val101) && isset($val103) && isset($val107) && isset($val108)) {
        $dataJSON = json_encode(
			array(
				'persona_codigo'				=> $work01,
				'persona_tipo'					=> $val101,
				'persona_nombre'				=> $val102,
				'persona_apellido'				=> $val103,
				'persona_genero'				=> $val104,
				'persona_fecha_nacimiento'		=> $val105,
				'persona_funcion'				=> $val106,
				'tipo_documento_codigo'			=> $val107,
				'tipo_documento_numero'			=> $val108,
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

		switch($work02){
			case 'C':
				$result	= post_curl('200/persona', $dataJSON);
				$result	= json_decode($result, true);
				$work01 = $result['codigo'];
				break;

			case 'U':
				$result	= put_curl('200/persona/'.$work01, $dataJSON);
				$result = json_decode($result, true);
				break;

			case 'D':
				$result	= delete_curl('200/persona/'.$work01, $dataJSON);
				$result = json_decode($result, true);
				break;
		}

		$code 	= $result['code'];
		$msg	= $result['message'];
	} else {
		$code 	= 204;
		$msg	= 'Error. Algún esta vacio, verifique';
	}
	
	header('Location: ../../public/'.$work03.'.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>