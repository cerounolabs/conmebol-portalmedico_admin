<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = $_POST['var101'];
    $val02          = $_POST['var102'];
    $val03          = $_POST['var103'];
	$val04      	= $_POST['var104'];
	$val05      	= $_POST['var105'];
	$val06			= $_POST['var106'];

	$val07          = $_POST['var201'];
	$val08          = $_POST['var202'];
	$val09          = $_POST['var203'];

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workSPers'];
	$work04         = $_POST['workSFam'];
	$work05         = $_POST['workSerologia'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val03) && isset($val04) && isset($val05) && isset($val06)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'			=> 'A',
				'disciplina_codigo'				=> $val02,
				'competicion_codigo'			=> $val03,
				'encuentro_codigo'				=> $val04,
				'equipo_codigo'					=> $val05,
				'jugador_codigo'				=> $val06,
				'covid19_periodo'				=> $val01,
				'covid19_fecha'					=> $val07,
				'covid19_persona_adulta'		=> $val08,
				'covid19_persona_menor'			=> $val09,
                'covid19_observacion'			=> '',
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

		switch($work02){
			case 'C':
				$result	= post_curl('800', $dataJSON);
				$result	= json_decode($result, true);
				$work01 = $result['codigo'];;
				break;
			case 'U':
				$result	= put_curl('800/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('800/'.$work01, $dataJSON);
				break;
		}
	}

	for ($i=0; $i < $work03; $i++) {
		$val101		= $_POST['var2041_'.$i];

		if (isset($_POST['var2042_'.$i])){
			$val102 = 'checked';
		} else {
			$val102 = '';
		}

		$dataJSON	= json_encode(
            array(
				'covid19_codigo'				=> $work01,
				'tipo_prueba_codigo'			=> $val101,
				'covid19_prueba_valor'			=> $val102,
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

			$result1	= post_curl('800/prueba', $dataJSON);
	}

	for ($i=0; $i < $work04; $i++) { 
		$val111		= $_POST['var2051_'.$i];

		if (isset($_POST['var2052_'.$i])){
			$val112 = 'checked';
		} else {
			$val112 = '';
		}

		$dataJSON	= json_encode(
            array(
				'covid19_codigo'				=> $work01,
				'tipo_prueba_codigo'			=> $val111,
				'covid19_prueba_valor'			=> $val112,
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

			$result1	= post_curl('800/prueba', $dataJSON);
	}

	for ($i=0; $i < $work05; $i++) { 
		$val121		= $_POST['var3011_'.$i];
		$val122		= $_POST['var3012_'.$i];
		$dataJSON	= json_encode(
            array(
				'covid19_codigo'				=> $work01,
				'tipo_prueba_codigo'			=> $val121,
				'covid19_prueba_valor'			=> $val122,
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

			$result1	= post_curl('800/prueba', $dataJSON);
	}

	header('Location: ../../covid19/prueba_crud.php?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>