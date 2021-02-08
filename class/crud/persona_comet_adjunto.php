<?php
	if(!isset($_SESSION)){ 
        session_start(); 
    }
    
    ob_start();
    
	require '../../class/function/curl_api.php';
	require '../../class/function/function.php';
	require '../../class/session/session_system.php';
	require '../../vendor/autoload.php';

	use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\Settings;
    use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Reader\IReader;
	
	$val09			= '';
	$target_dir     = '../../upload/personas/';
	
	$work01			= $_POST['workCodigo'];
	$work02			= $_POST['workModo'];
	$work03			= $_POST['workPage'];

	$log_01			= $_SESSION['log_01'];
	$log_03			= $_SESSION['log_03'];

	if (!empty($_FILES['var09']['tmp_name'])) {
		$target_ban     = false;
        $target_msn     = '';
		$target_nam     = getFechaHora().'_'.rand(100, 999).'_'.$work01;
        $target_file    = $target_dir.basename($_FILES['var09']['name']);
		$imageFileType  = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		$target_file	= $target_nam.'.'.$imageFileType;

        if(isset($_POST['submit'])) {
			if ($_FILES['var09']['type'] == 'application/vnd.ms-excel' || $_FILES['var09']['type'] == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
				$check = $_FILES['var09']['size'];
			} else {
				$check = getimagesize($_FILES['var09']['tmp_name']);
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
        
        if ($_FILES['var09']['size'] > 20000001 && $target_ban == true) {
            $target_msn = 'ERROR: El archivo es muy pesado, sobrepasa lo permitido de 20MB. Verifique!';
			$target_ban = false;
        }
        
        if($imageFileType != 'xls' && $imageFileType != 'xlsx' && $target_ban == true) {
            $target_msn = 'ERROR: El formato del archivo no corresponde, solo permitido .xls, .xlsx. Verifique!';
			$target_ban = false;
        }

        if ($target_ban == true) {
            if (move_uploaded_file($_FILES['var09']['tmp_name'], $target_dir.''.$target_file)) {
				$val09		= $target_file;
				$target_msn	= $target_file;
                $target_ban = true;
            } else {
                $target_msn = 'ERROR: El archivo tuvo inconveniente en subir, favor intente devuelta. Verifique!';
				$target_ban = false;
            }
		}
	}

	$target_file	= $target_dir.''.$val09;
	$spreadsheet	= IOFactory::load($target_file);
	$xlsHojas		= $spreadsheet->getSheetCount();

	for ($indPage = 0; $indPage < $xlsHojas; $indPage++) {
		for ($indRow = 2; $indRow < 200; $indRow++) {
			$val01 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(1, $indRow)->getValue();
			$val02 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(2, $indRow)->getValue();
			$val03 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(3, $indRow)->getValue();
			$val04 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(4, $indRow)->getFormattedValue();
			$val05 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(5, $indRow)->getValue();
			$val06 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(6, $indRow)->getValue();
			$val07 	= $spreadsheet->getSheet($indPage)->getCellByColumnAndRow(7, $indRow)->getValue();
			$val08 	= 'Z';//$spreadsheet->getSheet($indPage)->getCellByColumnAndRow(8, $indRow)->getValue();
echo $val04;
			if ($val03 == 'F') {
				$val03 = 'FEMALE';
			} else {
				$val03 = 'MALE';
			}

			if ($val06 == 'D') {
				$val06 = 212;
			} else {
				$val06 = 213;
			}

			if (!empty($val01) && !empty($val02) && !empty($val03) && !empty($val06) && !empty($val07)) {
				$dataJSON = json_encode(
					array(
						'persona_codigo'			=> $work01,
						'persona_tipo'				=> $val08,
						'persona_nombre'			=> $val01,
						'persona_apellido'			=> $val02,
						'persona_genero'			=> $val03,
						'persona_fecha_nacimiento'	=> $val04,
						'persona_funcion'			=> $val05,
						'tipo_documento_codigo'		=> $val06,
						'tipo_documento_numero'		=> $val07,
						'auditoria_usuario'         => $log_01,
						'auditoria_fecha_hora'	    => date('Y-m-d H:i:s'),
						'auditoria_ip'        	    => $log_03
					));

//				$result	= post_curl('200/persona', $dataJSON);
//				$result	= json_decode($result, true);
			}
		}

		if(empty($val01) && empty($val02) && empty($val03)){
			$indRow = 200;
		}		
	}

//	header('Location: ../../'.$work03.'code='.$result['code'].'&msg='.$result['message']);

	ob_end_flush();
?>