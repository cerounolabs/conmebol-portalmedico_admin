<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
    require '../../class/function/curl_api.php';

	$val001         = 112;
	$val002         = date('Y-m-d');

    $val101         = $_POST['var101'];
    $val102         = strtoupper($_POST['var102']);
    $val103         = $_POST['var103'];
	$val104      	= $_POST['var104'];

	$val201      	= $_POST['var201'];
	$val202			= $_POST['var202'];
	$val203         = round($_POST['var203']);
	$val204         = 113;

	$val301      	= $_POST['var301'];
	$val302			= $_POST['var302'];
	$val303         = $_POST['var303'];
	$val304      	= $_POST['var304'];
	$val305			= $_POST['var305'];
	$val306         = $_POST['var306'];
	$val307      	= $_POST['var307'];
	$val308      	= $_POST['var308'];

	$val401         = $_POST['var401'];
    $val402         = $_POST['var402'];
    $val403         = $_POST['var403'];
	$val404      	= strtoupper($_POST['var404']);

	$work01         = $_POST['workTipo'];
    $work02         = $_POST['workDisciplina'];
	$work03         = $_POST['workCompetencia'];
	$work04         = $_POST['workEquipo'];
	$work05         = $_POST['workJuego'];
	$work06         = $_POST['workDiag1'];
	$work07         = $_POST['workDiag2'];
	$work08         = $_POST['workDiag3'];
	$work09         = $_POST['workDiag4'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];

    if (isset($work01) && isset($work02) && isset($work03) && isset($work04) && isset($work05) && isset($log_01) && isset($log_03)) {
        $dataJSON = json_encode(
            array(
				'tipo_estado_codigo'							=> $val001,
				'competencia_codigo'							=> $work03,
				'juego_codigo'									=> $work05,
				'equipo_codigo'									=> $work04,
				'jugador_codigo'								=> $val201,
				'lesion_fecha_hora'								=> $val002,

				'tipo_clima_codigo'								=> $val101,
				'temperatura_numero'							=> $val102,
				'tipo_distancia_codigo'							=> $val103,
				'tipo_traslado_codigo'							=> $val104,

				'tipo_posicion_codigo'							=> $val202,
				'tipo_minuto_codigo'							=> $val203,
				'tipo_campo_codigo'								=> $val204,

				'tipo_cuerpo_zona_codigo'						=> $val301,
				'tipo_cuerpo_lugar_codigo'						=> $val302,
				'tipo_lesion_tipo_codigo'						=> $val303,
				'tipo_lesion_origen_codigo'						=> $val304,
				'tipo_lesion_reincidencia_codigo'				=> $val305,
				'tipo_lesion_causa_codigo'						=> $val306,
				'tipo_lesion_falta_codigo'						=> $val307,
				'tipo_lesion_retiro_codigo'						=> $val308,

				'tipo_diagnostico_tipo_codigo'					=> $val401,
				'tipo_diagnostico_recuperacion_codigo'			=> $val402,
				'tipo_diagnostico_tiempo_codigo'				=> $val403,
				'diagnostico_observacion'						=> $val404,
				
				'auditoria_usuario'								=> $log_01,
				'auditoria_fecha_hora'							=> date('Y-m-d H:i:s'),
				'auditoria_ip'									=> $log_03
			));
		
		$result		= post_curl('600', $dataJSON);
		$resultJSON = json_decode($result, true);
        $work00     = $resultJSON['codigo'];
	}

	for ($i=0; $i < $work06; $i++) { 
		$row_00	= $_POST['var501_'.$i];

		$pos	= strpos($row_00, '_');
		$row_01	= substr($row_00, ($pos+1));
		$row_02	= substr($row_00, 0, $pos);

		$dataJSON = json_encode(
            array(
				'lesion_codigo'							=> $work00,
				'tipo_concusion_codigo'					=> 150,
				'pregunta_concusion_codigo'				=> $row_01,
				'lesion_concusion_respuesta'			=> $row_02,
				'lesion_concusion_observacion'			=> '',
				
				'auditoria_usuario'						=> $log_01,
				'auditoria_fecha_hora'					=> date('Y-m-d H:i:s'),
				'auditoria_ip'							=> $log_03
			));
		
		$result1	= post_curl('601', $dataJSON);
	}

	for ($i=0; $i < $work07; $i++) { 
		$row_00	= $_POST['var502_'.$i];

		$pos	= strpos($row_00, '_');
		$row_01	= substr($row_00, ($pos+1));
		$row_02	= substr($row_00, 0, $pos);

		$dataJSON = json_encode(
            array(
				'lesion_codigo'							=> $work00,
				'tipo_concusion_codigo'					=> 151,
				'pregunta_concusion_codigo'				=> $row_01,
				'lesion_concusion_respuesta'			=> $row_02,
				'lesion_concusion_observacion'			=> '',
				
				'auditoria_usuario'						=> $log_01,
				'auditoria_fecha_hora'					=> date('Y-m-d H:i:s'),
				'auditoria_ip'							=> $log_03
			));
		
		$result2	= post_curl('601', $dataJSON);
	}

	for ($i=0; $i < $work08; $i++) { 
		$row_00	= $_POST['var503_'.$i];

		$pos	= strpos($row_00, '_');
		$row_01	= substr($row_00, ($pos+1));
		$row_02	= substr($row_00, 0, $pos);

		$dataJSON = json_encode(
            array(
				'lesion_codigo'							=> $work00,
				'tipo_concusion_codigo'					=> 152,
				'pregunta_concusion_codigo'				=> $row_01,
				'lesion_concusion_respuesta'			=> $row_02,
				'lesion_concusion_observacion'			=> '',
				
				'auditoria_usuario'						=> $log_01,
				'auditoria_fecha_hora'					=> date('Y-m-d H:i:s'),
				'auditoria_ip'							=> $log_03
			));
		
		$result3	= post_curl('601', $dataJSON);
	}

	for ($i=0; $i < $work09; $i++) { 
		$row_00	= $_POST['var504_'.$i];

		$pos	= strpos($row_00, '_');
		$row_01	= substr($row_00, ($pos+1));
		$row_02	= substr($row_00, 0, $pos);

		$dataJSON = json_encode(
            array(
				'lesion_codigo'							=> $work00,
				'tipo_concusion_codigo'					=> 153,
				'pregunta_concusion_codigo'				=> $row_01,
				'lesion_concusion_respuesta'			=> $row_02,
				'lesion_concusion_observacion'			=> '',
				
				'auditoria_usuario'						=> $log_01,
				'auditoria_fecha_hora'					=> date('Y-m-d H:i:s'),
				'auditoria_ip'							=> $log_03
			));
		
		$result4	= post_curl('601', $dataJSON);
	}

	$result		= json_decode($result, true);

	header('Location: ../../public/lesion_crud.php?tipo='.$work01.'&disciplina='.$work02.'&competencia='.$work03.'&equipo='.$work04.'&juego='.$work05.'&code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>