<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = strtoupper($_POST['var01']);
    $val02          = $_POST['var02'];
	$val03_1        = strtoupper($_POST['var03_1']);
	$val03_2        = strtoupper($_POST['var03_2']);
	$val03_3		= strtoupper($_POST['var03_3']);
    $val04          = strtolower($_POST['var04']);
    $val06          = strtoupper($_POST['var06']);

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val03_1) && isset($val03_2) && isset($val03_3)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'    	=> $val01,
				'tipo_orden'				=> $val02,
				'tipo_nombre_ingles'		=> $val03_1,
				'tipo_nombre_castellano'	=> $val03_2,
				'tipo_nombre_portugues'		=> $val03_3,
				'tipo_path'					=> $val04,
				'tipo_dominio'          	=> $work03,
				'tipo_observacion'      	=> $val06,
				'tipo_usuario'          	=> $log_01,
                'tipo_fecha_hora'       	=> date('Y-m-d H:i:s'),
                'tipo_ip'               	=> $log_03
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