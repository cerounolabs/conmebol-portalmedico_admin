<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = strtoupper($_POST['dominioEstado']);
    $val02          = strtoupper($_POST['dominioNombre']);
    $val03          = $_POST['dominioOrden'];
    $val04          = strtoupper($_POST['dominioValor']);
	$val05          = $_POST['dominioObservacion'];
	$val06          = $_POST['dominioTipo'];

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val04)) {
        $dataJSON = json_encode(
            array(
                'tipo_sub_estado_codigo'    => $val01,
				'tipo_sub_nombre'           => $val02,
				'tipo_sub_orden'			=> $val03,
				'tipo_codigo'				=> $val06,
				'tipo_sub_dominio'          => $val04,
				'tipo_sub_observacion'      => $val05,
				'tipo_sub_usuario'          => $log_01,
                'tipo_sub_fecha_hora'       => date('Y-m-d H:i:s'),
                'tipo_sub_ip'               => $log_03
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('100/dominio', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('100/dominio/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('100/dominio/'.$work01, $dataJSON);
				break;
		}
	}
	
	$result		= json_decode($result, true);

	if ($work02 == 'D'){
		header('Location: ../../public/subdominio.php?dominio='.$work03.'&code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/subdominio_crud.php?dominio='.$work03.'&mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>