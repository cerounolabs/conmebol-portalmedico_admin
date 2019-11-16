<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = $_POST['var01'];
    $val02          = $_POST['var02'];
    $val03          = $_POST['var03'];
	$val04      	= $_POST['var04'];
	$val05      	= strtoupper($_POST['var05']);
	$val06			= strtolower($_POST['var06']);
	$val07          = strtoupper($_POST['var07']);
	$val08          = $_POST['var08'];

	if (isset($_POST['var09'])){
		$val09	= strtolower($_POST['var09']);
	} else {
		$val09	= 'assets/images/users/default.png';
	}

	if (isset($_POST['var10'])){
		$val10	= strtoupper($_POST['var10']);
	} else {
		$val10	= '';
	}
	
	$val11          = strtoupper($_POST['var11']);
	$val12			= $_POST['var12'];

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val03) && isset($val04) && isset($val05) && isset($val12)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'			=> $val01,
				'tipo_acceso_codigo'			=> $val02,
				'tipo_perfil_codigo'			=> $val03,
				'equipo_codigo'					=> $val04,
				'tipo_categoria_codigo'			=> $val12,
				'persona_nombre'				=> $val05,
				'persona_user'					=> $val07,
				'persona_contrasenha'			=> $val08,
				'persona_path'					=> $val09,
				'persona_email'					=> $val06,
				'persona_telefono'				=> $val10,
                'persona_observacion'			=> $val11,
				'persona_usuario'				=> $log_01,
				'persona_fecha_hora'			=> date('Y-m-d H:i:s'),
				'persona_ip'					=> $log_03
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('400', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('400/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('400/'.$work01, $dataJSON);
				break;
		}
	}

	$result		= json_decode($result, true);

	if ($work02 == 'D'){
		header('Location: ../../public/persona.php?dominio='.$work03.'&code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/persona_crud.php?dominio='.$work03.'&mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>