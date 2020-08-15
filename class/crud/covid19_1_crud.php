<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	
	$val100			= $_POST['var100'];
	$val108			= $_POST['var108'];
	$val109			= $_POST['var109'];

	$work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];
	$work05         = $_POST['workCompeticion'];
	$work06         = $_POST['workEncuentro'];
	$work07         = $_POST['workEquipo'];
	$work08         = $_POST['workAntExamen'];
	$work09         = $_POST['workEstado'];
	$work10         = $_POST['workTipo'];
	$work11         = $_POST['workRegistro'];

	$log_01         = $_SESSION['log_01'];
	$log_03         = $_SESSION['log_03'];

	if (isset($val100)) {
		for ($i=0; $i < $work11; $i++) {
			$val101			= $_POST['var101_'.$i];
			$val102			= $_POST['var102_'.$i];
			$val103			= $_POST['var103_'.$i];
			$val104			= $_POST['var104_'.$i];
			$val105			= $_POST['var105_'.$i];
			$val106			= $_POST['var106_'.$i];
			
			$work04         = $_POST['workTest_'.$i];

			$dataJSON = json_encode(
				array(
					'tipo_estado_codigo'			=> $work09,
					'tipo_examen_codigo'			=> $work10,
					'competicion_codigo'			=> $work05,
					'encuentro_codigo'				=> $work06,
					'equipo_codigo'					=> $work07,
					'jugador_codigo'				=> $val101,
					'examen_anterior_codigo'		=> $work08,
					'examen_fecha_1'				=> $val100,
					'examen_persona_adulta'			=> $val104,
					'examen_persona_menor'			=> $val105,
					'jugador_convocado'				=> $val106,
					'jugador_posicion'				=> $val102,
					'jugador_camiseta'				=> $val103,
					'laboratorio_nombre'			=> $val108,
					'laboratorio_fecha_envio'		=> $val109,
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

			for ($j=0; $j < $work04; $j++) { 
				$var1071		= $_POST['var1071_'.$j.'_'.$i];
				$var1072		= $_POST['var1072_'.$j.'_'.$i];
				$var1073		= $_POST['var1073_'.$j.'_'.$i];

				$dataJSON	= json_encode(
					array(
						'tipo_test_codigo'				=> $var1071,
						'examen_codigo'					=> $work01,
						'examen_test_valor'				=> $var1072,
						'examen_test_observacion'		=> $var1073,
						'auditoria_usuario'				=> $log_01,
						'auditoria_fecha_hora'			=> date('Y-m-d H:i:s'),
						'auditoria_ip'					=> $log_03
					));

				$result1	= post_curl('801/examen/test', $dataJSON);
			}

			$code 	= $result['code'];
			$msg	= $result['message'];
		}
	} else {
		$code 	= 204;
		$msg	= 'Error. Algún esta vacio, verifique';
	}
	
	header('Location: ../../examen/'.$work03.'code='.$result['code'].'&msg='.$result['message']);
	
	ob_end_flush();
?>