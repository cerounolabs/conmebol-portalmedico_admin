<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val01          = $_POST['var101'];	//PERIODO
    $val02          = $_POST['var102'];	//DISCIPLINA
    $val03          = $_POST['var103'];	//COMPETENCIA
	$val04      	= $_POST['var104'];	//ENCUENTRO
	$val05      	= $_POST['var105'];	//EQUIPO
	$val06			= $_POST['var106'];	//FECHA PRUEBA
	$val11			= $_POST['var107'];	//CIUDAD
	$val12			= $_POST['var108'];	//FECHA LLEGADA
	$val13			= $_POST['var109'];	//FECHA SALIDA

	$val07          = $_POST['var201'];	//PERSONA
	$val08          = $_POST['var202'];	//PERSONA ADULTA
	$val09          = $_POST['var203'];	//PERSONA MENORES

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workSPers'];
	$work04         = $_POST['workSFam'];
	$work05         = $_POST['workSerologia'];
	$work06         = $_POST['workPage'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

    if (isset($val01) && isset($val02) && isset($val03) && isset($val04) && isset($val05) && isset($val06)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'			=> 'A',
				'tipo_covid19_codigo'			=> 176,
				'disciplina_codigo'				=> $val02,
				'competicion_codigo'			=> $val03,
				'encuentro_codigo'				=> $val04,
				'equipo_codigo'					=> $val05,
				'jugador_codigo'				=> $val07,
				'covid19_periodo'				=> $val01,
				'covid19_fecha_1'				=> $val06,
				'covid19_fecha_2'				=> $val12,
				'covid19_fecha_3'				=> $val13,
				'covid19_persona_adulta'		=> $val08,
				'covid19_persona_menor'			=> $val09,
				'covid19_ciudad'				=> $val11,
                'covid19_observacion'			=> '',
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

		switch($work02){
			case 'C':
				$result	= post_curl('801/covid19/prueba', $dataJSON);
				$result	= json_decode($result, true);
				$work01 = $result['codigo'];
				break;
			case 'U':
				$result	= put_curl('801/covid19/prueba/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('801/covid19/prueba/'.$work01, $dataJSON);
				break;
		}
	}

	//SEROLOGIA
	for ($i=0; $i < $work05; $i++) { 
		$val101		= $_POST['var2041_'.$i];
		$val102		= $_POST['var2042_'.$i];
		$dataJSON	= json_encode(
			array(
				'covid19_codigo'				=> $work01,
				'tipo_prueba_codigo'			=> $val101,
				'covid19_prueba_valor'			=> $val102,
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

			$result1	= post_curl('801/covid19/examen', $dataJSON);
	}

	//SINTOMAS PERSONALES
	for ($i=0; $i < $work03; $i++) {
		$val101		= $_POST['var2051_'.$i];

		if (isset($_POST['var2052_'.$i])){
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

			$result1	= post_curl('801/covid19/examen', $dataJSON);
	}

	//SINTOMAS FAMILIARES
	for ($i=0; $i < $work04; $i++) { 
		$val101		= $_POST['var2061_'.$i];

		if (isset($_POST['var2062_'.$i])){
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

			$result1	= post_curl('801/covid19/examen', $dataJSON);
	}

	header('Location: ../../examen/'.$work06.'?code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>