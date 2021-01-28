<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	require '../../class/function/function.php';

    $val100			= $_POST['var100'];
	$val101			= $_POST['var101'];
	$val102			= $_POST['var102'];
	$val103			= $_POST['var103'];
	$val104			= $_POST['var104'];
	$val105			= $_POST['var105'];
	$val106			= $_POST['var106'];
	$val108			= $_POST['var108'];
	$val109			= $_POST['var109'];
	$val110			= $_POST['var110'];
	
	$val111			= trim($_POST['var111']);
	$val112			= $_POST['var112'];
	$val113			= trim($_POST['var113']);
	$val115			= trim($_POST['var115']);
	$val116			= trim($_POST['var116']);
	$val117			= $_POST['var117'];
	$val118			= $_POST['var118'];
	$val119			= $_POST['var119'];
	
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

    if (isset($val100) && $val101 != 0) {
        $dataJSON = json_encode(
			array(
				'tipo_estado_codigo'				=> $work09,
				'tipo_examen_codigo'				=> $work10,
				'competicion_codigo'				=> $work05,
				'encuentro_codigo'					=> $work06,
				'equipo_codigo'						=> $val110,
				'persona_codigo'					=> $val101,
				'examen_anterior_codigo'			=> $work08,
				'examen_fecha_1'					=> $val100,
				'examen_cantidad_adulto'			=> $val104,
				'examen_cantidad_menor'				=> $val105,
				'examen_persona_convocado'			=> $val106,
				'examen_persona_posicion'			=> $val102,
				'examen_persona_camiseta'			=> $val103,
				'examen_laboratorio_nombre'			=> $val108,
				'examen_laboratorio_fecha_envio'	=> $val109,
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
			$var1071		= $_POST['var1071_'.$i];
			$var1072		= $_POST['var1072_'.$i];
			$var1073		= $_POST['var1073_'.$i];

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

		if ($val111 == 'SI'){	
			if (!empty($_FILES['var114']['tmp_name'])) {
				$target_msn     = '';
				$target_nam     = getFechaHora().''.rand(100, 999).'_'.$work01;
				$target_ban     = false;
				$target_dir     = '../../imagen/examencovid19/';
				$target_file    = $target_dir.basename($_FILES['var114']['name']);
				$imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				$target_file    = $target_nam.'.'.$imageFileType;
	
				if(isset($_POST['submit'])) {
					if ($_FILES['var114']['type'] == 'application/pdf') {
						$check = $_FILES['var114']['size'];
					} else {
						$check = getimagesize($_FILES['var114']['tmp_name']);
					}
	
					if($check !== false) {
						$target_ban = true;
					} else {
						$target_ban = false;
						$target_msn = 'ERROR: El archivo no es correcto. Verifique!';
					}
				}
				
				if (file_exists($target_file) && $target_ban == true) {
					$target_msn = 'ERROR: Ya existe una archivo con el mismo nombre. Verifique!';
					$target_ban = false;
				}
				
				if ($_FILES['var114']['size'] > 20000001 && $target_ban == true) {
					$target_msn = 'ERROR: El archivo es muy pesado, sobrepasa lo permitido de 20MB. Verifique!';
					$target_ban = false;
				}
				
				if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'pdf' && $target_ban == true) {
					$target_msn = 'ERROR: El formato del archivo no corresponde, solo permitido .jpg, .png, .jpeg, .pdf. Verifique!';
					$target_ban = false;
				}
	
				if ($target_ban == true) {
					if (move_uploaded_file($_FILES['var114']['tmp_name'], $target_dir.''.$target_file)) {
						$val114     = 'imagen/examencovid19/'.$target_file;
						$target_msn = $target_file;
						$target_ban = true;
					} else {
						$target_msn = 'ERROR: El archivo tuvo inconveniente en subir, favor intente devuelta. Verifique!';
						$target_ban = false;
					}
				}
				
				$code   = 400;
				$msg	= $target_msn;
			}
			
			if (isset($val112) && $target_ban == true) {
				$dataJSON = json_encode(
					array(
						'tipo_estado_codigo'					=> $val119,
						'examen_laboratorio_fecha_recepcion'	=> $val112,
						'examen_laboratorio_resultado'			=> $val113,
						'examen_laboratorio_adjunto'			=> $val114,
						'examen_laboratorio_cuarentena'			=> $val115,
						'examen_laboratorio_test'				=> $val116,
						'examen_laboratorio_fecha_aislamiento'	=> $val117,
						'examen_laboratorio_fecha_finaliza'     => $val118,
						'auditoria_usuario'						=> $log_01,
						'auditoria_fecha_hora'					=> date('Y-m-d H:i:s'),
						'auditoria_ip'							=> $log_03
					));
	
				$result	= put_curl('801/examen/prueba/'.$work01, $dataJSON);
				$result	= json_decode($result, true);
				$code 	= $result['code'];
				$msg	= $result['message'];
			}
		}

		$code 	= $result['code'];
		$msg	= $result['message'];
	} else {
		$code 	= 204;
		$msg	= 'Error. Algún esta vacio, verifique';
	}
	
	header('Location: ../../'.$work03.'code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>