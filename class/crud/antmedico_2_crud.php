<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	
	$val101			= $_POST['var101'];
	$val102			= $_POST['var102'];
	$val103			= 0;
	$val104			= '';

    $work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];
	$work04         = $_POST['workAntMedico'];
	$work05         = $_POST['workCompeticion'];
	$work06         = $_POST['workEncuentro'];
	$work07         = $_POST['workEquipo'];
	$work08         = $_POST['workAntExamen'];
	$work09         = $_POST['workEstado'];
	$work10         = $_POST['workTipo'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];
	
    if (isset($val101) && isset($val102)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'			=> $work09,
				'tipo_examen_codigo'			=> $work10,
				'competicion_codigo'			=> $work05,
				'encuentro_codigo'				=> $work06,
				'equipo_codigo'					=> $work07,
				'jugador_codigo'				=> $val101,
				'laboratorio_codigo'			=> $val103,
				'examen_anterio_codigo'			=> $work08,
				'examen_fecha_1'				=> $val102,
				'examen_fecha_2'				=> $val104,
				'examen_fecha_3'				=> '',
				'examen_persona_adulta'			=> 0,
				'examen_persona_menor'			=> 0,
				'examen_adjunto'				=> '',
                'examen_observacion'			=> '',
				'auditoria_usuario'				=> $log_01,
				'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
				'auditoria_ip'					=> $log_03
			));

		switch($work02){
			case 'C':
				$result	= post_curl('801/examen/prueba', $dataJSON);
				$result	= json_decode($result, true);
				$work01 = $result['codigo'];
				break;
			case 'U':
				$result	= put_curl('801/examen/prueba/'.$work01, $dataJSON);
				break;
			case 'D':
				$result	= delete_curl('801/examen/prueba/'.$work01, $dataJSON);
				break;
		}
		
		for ($i=0; $i <= $work04; $i++) { 
			$val201		= $_POST['var1031_'.$i];
			$val202		= $_POST['var1032_'.$i];
			$dataJSON	= json_encode(
				array(
					'tipo_test_codigo'				=> $val201,
					'examen_codigo'					=> $work01,
					'examen_test_valor'				=> $val202,
					'auditoria_usuario'				=> $log_01,
					'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
					'auditoria_ip'					=> $log_03
				));

				$result1	= post_curl('801/examen/test', $dataJSON);
		}

		$code 	= $result['code'];
		$msg	= $result['message'];

	} else {
		$code 	= 204;
		$msg	= 'Error. Algún esta vacio, verifique';
	}
	
	header('Location: ../../examen/'.$work03.'code='.$code.'&msg='.$msg);

	ob_end_flush();
?>