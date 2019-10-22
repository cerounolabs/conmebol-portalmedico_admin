<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = strtoupper($_POST['var01']);
    $val02          = $_POST['var02'];
    $val03          = $_POST['var03'];
	$val04_1       	= strtoupper($_POST['var04_1']);
	$val04_2      	= strtoupper($_POST['var04_2']);
	$val04_3		= strtoupper($_POST['var04_3']);
	$val05          = strtolower($_POST['var05']);
	$val07          = strtoupper($_POST['var07']);

    $work01         = $_POST['workCodigo'];
    $work02         = $_POST['workModo'];
    $work03         = $_POST['workDominio'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val04_1) && isset($val04_2) && isset($val04_3)) {
        $dataJSON = json_encode(
            array(
				'tipo_sub_estado_codigo'		=> $val01,
				'tipo_codigo'					=> $val02,
				'tipo_sub_orden'				=> $val03,
				'tipo_sub_nombre_ingles'		=> $val04_1,
				'tipo_sub_nombre_castellano'	=> $val04_2,
				'tipo_sub_nombre_portugues'		=> $val04_3,
				'tipo_sub_path'					=> $val05,
				'tipo_sub_dominio'          	=> $work03,
				'tipo_sub_observacion'      	=> $val07,
				'tipo_sub_usuario'          	=> $log_01,
                'tipo_sub_fecha_hora'       	=> date('Y-m-d H:i:s'),
                'tipo_sub_ip'               	=> $log_03
			));
		
		switch($work02){
			case 'C':
				$result	= post_curl('100', $dataJSON);
				break;
			case 'U':
				$result	= put_curl('100/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('100/'.$work01, $dataJSON);
				break;
		}
	}
	echo $result;
	$result		= json_decode($result, true);

	if ($work02 == 'D'){
		header('Location: ../../public/subdominio.php?dominio='.$work03.'&code='.$result['code'].'&msg='.$result['message']);
	} else {
		header('Location: ../../public/subdominio_crud.php?dominio='.$work03.'&mode='.$work02.'&codigo='.$work01.'&code='.$result['code'].'&msg='.$result['message']);
	}

	ob_end_flush();
?>