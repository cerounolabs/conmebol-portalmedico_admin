<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	
	$val100			= $_POST['var100'];

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
					'jugador_convocado'				=> $val104,
					'jugador_posicion'				=> $val102,
					'jugador_camiseta'				=> $val103,
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
				$var1051		= $_POST['var1051_'.$j.'_'.$i];
				$var1052		= $_POST['var1052_'.$j.'_'.$i];
				$var1053		= $_POST['var1053_'.$j.'_'.$i];

				$dataJSON	= json_encode(
					array(
						'tipo_test_codigo'				=> $var1051,
						'examen_codigo'					=> $work01,
						'examen_test_valor'				=> $var1052,
						'examen_test_observacion'		=> $var1053,
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