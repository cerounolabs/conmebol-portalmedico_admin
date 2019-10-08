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

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val04)) {
        $dataJSON = json_encode(
            array(
                'tipo_estado_codigo'    => $val01,
				'tipo_nombre'           => $val02,
				'tipo_orden'			=> $val03,
				'tipo_dominio'          => $val04,
				'tipo_observacion'      => $val05,
				'tipo_usuario'          => $log_01,
                'tipo_fecha_hora'       => date('Y-m-d H:i:s'),
                'tipo_ip'               => $log_03
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('000', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('000/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('000/'.$work01, $dataJSON);
				break;
		}
	}
	
	$result		= json_decode($result, true);

	if ($work02 == 'D'){
		header('Location: ../../public/dominio.php?dominio='.$work03.'&code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/dominio_crud.php?dominio='.$work03.'&mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>