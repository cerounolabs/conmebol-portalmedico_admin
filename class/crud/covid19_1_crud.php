<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	
	$val102			= $_POST['var102'];
	$val106			= $_POST['var106'];
	$val107			= $_POST['var107'];

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
	$work11			= $_POST['workCRegistro'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

	if (isset($val102)) {
		for ($i=0; $i < $work11; $i++) {
			$val101			= $_POST['var101_'.$i];
			$val103			= $_POST['var103_'.$i];
			$val104			= $_POST['var104_'.$i];
			$val108			= $_POST['var108_'.$i];
			
			$work12         = $_POST['workSerologia_'.$i];

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
					'examen_fecha_2'				=> $val107,
					'examen_fecha_3'				=> '',
					'examen_persona_adulta'			=> $val103,
					'examen_persona_menor'			=> $val104,
					'examen_convocado'				=> $val108,
					'examen_adjunto'				=> $val106,
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

			for ($j=0; $j < $work12; $j++) { 
				$val1051		= $_POST['var1051_'.$j.'_'.$i];
				$val1052		= $_POST['var1052_'.$j.'_'.$i];
				$dataJSON	= json_encode(
					array(
						'tipo_test_codigo'				=> $val1051,
						'examen_codigo'					=> $work01,
						'examen_test_valor'				=> $val1052,
						'auditoria_usuario'				=> $log_01,
						'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
						'auditoria_ip'					=> $log_03
					));
		
				$result1	= post_curl('801/examen/test', $dataJSON);
			}
		}
	}

	header('Location: ../../examen/'.$work03.'code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>