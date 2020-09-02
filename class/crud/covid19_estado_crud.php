<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	require '../../class/function/function.php';

    $val100			= $_POST['var100'];
	$val101			= $_POST['var101'];
	$val102			= '';
	$val103			= $_POST['var103'];
	$val104			= $_POST['var104'];
	$val105			= $_POST['var105'];
    $val106			= $_POST['var106'];
    $val107			= $_POST['var107'];
	
	$work01         = $_POST['workCodigo'];
	$work02         = $_POST['workModo'];
	$work03         = $_POST['workPage'];
	$work04         = $_POST['workEstado'];

	$log_01         = $_SESSION['log_01'];
    $log_03         = $_SESSION['log_03'];
    
    if (!empty($_FILES['var102']['tmp_name'])) {
        $target_msn     = '';
        $target_nam     = getFechaHora();
        $target_ban     = false;
        $target_dir     = '../../imagen/examencovid19/';
        $target_file    = $target_dir.basename($_FILES['var102']['name']);
        $imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $target_file    = $target_nam.'.'.$imageFileType;

        if(isset($_POST['submit'])) {
            if ($_FILES['var102']['type'] == 'application/pdf') {
                $check = $_FILES['var102']['size'];
            } else {
                $check = getimagesize($_FILES['var102']['tmp_name']);
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
        
        if ($_FILES['var102']['size'] > 20000001 && $target_ban == true) {
            $target_msn = 'ERROR: El archivo es muy pesado, sobrepasa lo permitido de 20MB. Verifique!';
            $target_ban = false;
        }
        
        if($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg' && $imageFileType != 'pdf' && $target_ban == true) {
            $target_msn = 'ERROR: El formato del archivo no corresponde, solo permitido .jpg, .png, .jpeg, .pdf. Verifique!';
            $target_ban = false;
        }

        if ($target_ban == true) {
            if (move_uploaded_file($_FILES['var102']['tmp_name'], $target_dir.''.$target_file)) {
                $val102     = 'imagen/examencovid19/'.$target_file;
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


    if (isset($val100) && $target_ban == true) {
        $dataJSON = json_encode(
			array(
				'tipo_estado_codigo'					=> $work04,
				'examen_laboratorio_fecha_recepcion'	=> $val100,
				'examen_laboratorio_resultado'			=> $val101,
				'examen_laboratorio_adjunto'			=> $val102,
				'examen_laboratorio_cuarentena'			=> $val103,
				'examen_laboratorio_test'				=> $val104,
                'examen_laboratorio_fecha_aislamiento'	=> $val105,
                'examen_laboratorio_fecha_finaliza'	    => $val106,
				'examen_laboratorio_observacion'		=> $val107,
				'auditoria_usuario'						=> $log_01,
				'auditoria_fecha_hora'					=> date('Y-m-d H:i:s'),
				'auditoria_ip'							=> $log_03
			));

		$result	= put_curl('801/examen/prueba/'.$work01, $dataJSON);
		$result	= json_decode($result, true);
		$code 	= $result['code'];
        $msg	= $result['message'];
    }
    
    header('Location: ../../examen/'.$work03.'code='.$code.'&msg='.$msg);

	ob_end_flush();
?>