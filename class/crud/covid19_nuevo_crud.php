<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

    $val100			= $_POST['var200'];
	$val101			= $_POST['var201'];
	$val102			= $_POST['var202'];
	$val103			= $_POST['var203'];
	$val104			= $_POST['var204'];
	$val105			= '';
	$val106			= $_POST['var206'];
	$val107			= $_POST['var207'];
	$val108			= $_POST['var208'];
	
	$work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];
	$work04         = $_POST['workTest'];
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
        $dataJSON = json_encode(
			array(
				'tipo_estado_codigo'				=> $work09,
				'tipo_examen_codigo'				=> $work10,
				'competicion_codigo'				=> $work05,
				'encuentro_codigo'					=> $work06,
				'equipo_codigo'						=> $work07,
				'persona_codigo'					=> $val100,
				'examen_anterior_codigo'			=> $work08,
				'examen_fecha_1'					=> $val103,
				'examen_cantidad_adulto'			=> $val106,
				'examen_cantidad_menor'				=> $val107,
				'examen_persona_convocado'			=> $val108,
				'examen_persona_posicion'			=> $val101,
				'examen_persona_camiseta'			=> $val102,
				'examen_laboratorio_nombre'			=> $val104,
				'examen_laboratorio_fecha_envio'	=> $val103,
				'examen_observacion'				=> '',
				'auditoria_usuario'					=> $log_01,
				'auditoria_fecha_hora'				=> date('Y-m-d H:i:s'),
				'auditoria_ip'						=> $log_03
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

		for ($i=0; $i < $work04; $i++) { 
			$var1091		= $_POST['var2091_'.$i];
			$var1092		= $_POST['var2092_'.$i];
			$var1093		= $_POST['var2093_'.$i];

			$dataJSON	= json_encode(
				array(
					'tipo_test_codigo'				=> $var1091,
					'examen_codigo'					=> $work01,
					'examen_test_valor'				=> $var1092,
					'examen_test_observacion'		=> $var1093,
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
	
	header('Location: ../../examen/'.$work03.'code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>