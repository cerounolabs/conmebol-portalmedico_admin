<?php 
    ob_start();

    require '../class/function/curl_api.php';
    require '../class/function/function.php';
    require '../class/session/session_system.php';
    require '../vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Helper\Sample;
    use PhpOffice\PhpSpreadsheet\Settings;
    use PhpOffice\PhpSpreadsheet\IOFactory;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;

    $sheetXLS = new Spreadsheet();

    // Set document properties
    $sheetXLS->getProperties()
        ->setCreator('MSc. Christian Zelaya')
        ->setLastModifiedBy('MSc. Christian Zelaya')
        ->setTitle('CONMEBOL - Sistema Lesión export XLS')
        ->setSubject('CONMEBOL - Sistema Lesión export XLS')
        ->setDescription('CONMEBOL - Sistema Lesión')
        ->setKeywords('CONMEBOL - Sistema Lesión export XLS')
        ->setCategory('CONMEBOL - Sistema Lesión export XLS');

    $codTipo        = $_GET['cod01'];
    $codComp        = $_GET['cod02'];
    $codEncu        = $_GET['cod03'];
    $codEqui        = $_GET['cod04'];
    $infJSON        = get_curl('200/competicion/examen/'.$codComp.'/'.$codTipo);
    $fileName       = "planilla_examen_".date('YmdHis').".xls";
    $indexRow       = 2;

    $sheetXLS->setActiveSheetIndex(0)
        ->setCellValue('B1', 'CONFEDERACION SUDAMERICANA DE FUTBOL');

    $sheetXLS->setActiveSheetIndex(0)
        ->setCellValue('A'.$indexRow, 'COMPETICION CODIGO')
        ->setCellValue('B'.$indexRow, 'COMPETICION')
        ->setCellValue('C'.$indexRow, 'JUEGO CODIGO')
        ->setCellValue('D'.$indexRow, 'JUEGO')
        ->setCellValue('E'.$indexRow, 'EQUIPO CODIGO')
        ->setCellValue('F'.$indexRow, 'EQUIPO')
        ->setCellValue('G'.$indexRow, 'JUGADOR CODIGO')
        ->setCellValue('H'.$indexRow, 'JUGADOR')
        ->setCellValue('I'.$indexRow, 'LESION CODIGO')
        ->setCellValue('J'.$indexRow, 'ESTADO CODIGO')
        ->setCellValue('K'.$indexRow, 'ESTADO')
        ->setCellValue('L'.$indexRow, 'FECHA ALTA')
        ->setCellValue('M'.$indexRow, 'FECHA RETORNO')
        ->setCellValue('N'.$indexRow, 'PRECISA DE CIRUGIA')
        ->setCellValue('O'.$indexRow, 'TEMPERATURA')
        ->setCellValue('P'.$indexRow, 'OBSERVACION')
        ->setCellValue('Q'.$indexRow, 'CLIMA CODIGO')
        ->setCellValue('R'.$indexRow, 'CLIMA')
        ->setCellValue('S'.$indexRow, 'DISTANCIA CODIGO')
        ->setCellValue('T'.$indexRow, 'DISTANCIA')
        ->setCellValue('U'.$indexRow, 'TRASLADO CODIGO')
        ->setCellValue('V'.$indexRow, 'TRASLADO')
        ->setCellValue('W'.$indexRow, 'POSICION CODIGO')
        ->setCellValue('X'.$indexRow, 'POSICION')
        ->setCellValue('Y'.$indexRow, 'MINUTO CODIGO')
        ->setCellValue('Z'.$indexRow, 'MINUTO')
        ->setCellValue('AA'.$indexRow, 'CUERPO ZONA CODIGO')
        ->setCellValue('AB'.$indexRow, 'CUERPO ZONA')
        ->setCellValue('AC'.$indexRow, 'CUERPO LUGAR CODIGO')
        ->setCellValue('AD'.$indexRow, 'CUERPO LUGAR')
        ->setCellValue('AE'.$indexRow, 'TIPO LESION CODIGO')
        ->setCellValue('AF'.$indexRow, 'TIPO LESION')
        ->setCellValue('AG'.$indexRow, 'ORIGEN LESION CODIGO')
        ->setCellValue('AH'.$indexRow, 'ORIGEN LESION')
        ->setCellValue('AI'.$indexRow, 'REINCIDENCIA LESION CODIGO')
        ->setCellValue('AJ'.$indexRow, 'REINCIDENCIA LESION')
        ->setCellValue('AK'.$indexRow, 'RETIRO LESION CODIGO')
        ->setCellValue('AL'.$indexRow, 'RETIRO LESION')
        ->setCellValue('AM'.$indexRow, 'EXAMEN RX CODIGO')
        ->setCellValue('AN'.$indexRow, 'EXAMEN RX')
        ->setCellValue('AO'.$indexRow, 'EXAMEN US CODIGO')
        ->setCellValue('AP'.$indexRow, 'EXAMEN US')
        ->setCellValue('AQ'.$indexRow, 'EXAMEN TOMOGRAFIA COMPUTADORIZADA CODIGO')
        ->setCellValue('AR'.$indexRow, 'EXAMEN TOMOGRAFIA COMPUTADORIZADA')
        ->setCellValue('AS'.$indexRow, 'EXAMEN RESONANCIA MAGNETICA CODIGO')
        ->setCellValue('AT'.$indexRow, 'EXAMEN RESONANCIA MAGNETICA')
        ->setCellValue('AU'.$indexRow, 'EXAMEN OTRO CODIGO')
        ->setCellValue('AV'.$indexRow, 'EXAMEN OTRO')
        ->setCellValue('AW'.$indexRow, 'CAUSA LESION CODIGO')
        ->setCellValue('AX'.$indexRow, 'CAUSA LESION')
        ->setCellValue('AY'.$indexRow, 'FALTA LESION CODIGO')
        ->setCellValue('AZ'.$indexRow, 'FALTA LESION')
        ->setCellValue('BA'.$indexRow, 'DIAGNOSTICO CODIGO')
        ->setCellValue('BB'.$indexRow, 'DIAGNOSTICO')
        ->setCellValue('BC'.$indexRow, 'DIAGNOSTICO RETORNO CODIGO')
        ->setCellValue('BD'.$indexRow, 'DIAGNOSTICO RETORNO')
        ->setCellValue('BE'.$indexRow, 'DIAGNOSTICO RETORNO OBSERVACION')
        ->setCellValue('BF'.$indexRow, 'DIAGNOSTICO RETORNO TRATAMIENTO')
        ->setCellValue('BG'.$indexRow, 'DIAGNOSTICO RECUPERACION CODIGO')
        ->setCellValue('BH'.$indexRow, 'DIAGNOSTICO RECUPERACION')
        ->setCellValue('BI'.$indexRow, 'DIAGNOSTICO RECUPERACION TIPO')
        ->setCellValue('BJ'.$indexRow, 'TIEMPO DIAGNOSTICO CODIGO')
        ->setCellValue('BK'.$indexRow, 'TIEMPO DIAGNOSTICO');

    if ($repDetalleJSON['code'] === 200) {
        $indexRow = $indexRow + 1;

        foreach ($repDetalleJSON['data'] as $key => $value) {
            $sheetXLS->setActiveSheetIndex(0)
            ->setCellValue('A'.$indexRow, $value['competicion_codigo'])
            ->setCellValue('B'.$indexRow, $value['competicion_nombre'])
            ->setCellValue('C'.$indexRow, $value['juego_codigo'])
            ->setCellValue('D'.$indexRow, $value['juego_nombre'])
            ->setCellValue('E'.$indexRow, $value['equipo_codigo'])
            ->setCellValue('F'.$indexRow, $value['equipo_nombre'])
            ->setCellValue('G'.$indexRow, $value['jugador_codigo'])
            ->setCellValue('H'.$indexRow, $value['jugador_nombre'])
            ->setCellValue('I'.$indexRow, $value['lesion_codigo'])
            ->setCellValue('J'.$indexRow, $value['tipo_estado_codigo'])
            ->setCellValue('K'.$indexRow, $value['tipo_estado_nombre_castellano'])
            ->setCellValue('L'.$indexRow, $value['lesion_fecha_alta'])
            ->setCellValue('M'.$indexRow, $value['lesion_fecha_retorno'])
            ->setCellValue('N'.$indexRow, $value['lesion_cirugia_nombre'])
            ->setCellValue('O'.$indexRow, $value['temperatura_numero'])
            ->setCellValue('P'.$indexRow, $value['lesion_observacion'])
            ->setCellValue('Q'.$indexRow, $value['tipo_clima_codigo'])
            ->setCellValue('R'.$indexRow, $value['tipo_clima_nombre_castellano'])
            ->setCellValue('S'.$indexRow, $value['tipo_distancia_codigo'])
            ->setCellValue('T'.$indexRow, $value['tipo_distancia_nombre_castellano'])
            ->setCellValue('U'.$indexRow, $value['tipo_traslado_codigo'])
            ->setCellValue('V'.$indexRow, $value['tipo_traslado_nombre_castellano'])
            ->setCellValue('W'.$indexRow, $value['tipo_posicion_codigo'])
            ->setCellValue('X'.$indexRow, $value['tipo_posicion_nombre_castellano'])
            ->setCellValue('Y'.$indexRow, $value['tipo_minuto_codigo'])
            ->setCellValue('Z'.$indexRow, $value['tipo_minuto_nombre_castellano'])
            ->setCellValue('AA'.$indexRow, $value['tipo_cuerpo_zona_codigo'])
            ->setCellValue('AB'.$indexRow, $value['tipo_cuerpo_zona_nombre_castellano'])
            ->setCellValue('AC'.$indexRow, $value['tipo_cuerpo_lugar_codigo'])
            ->setCellValue('AD'.$indexRow, $value['tipo_cuerpo_lugar_nombre_castellano'])
            ->setCellValue('AE'.$indexRow, $value['tipo_lesion_codigo'])
            ->setCellValue('AF'.$indexRow, $value['tipo_lesion_nombre_castellano'])
            ->setCellValue('AG'.$indexRow, $value['tipo_lesion_origen_codigo'])
            ->setCellValue('AH'.$indexRow, $value['tipo_lesion_origen_nombre_castellano'])
            ->setCellValue('AI'.$indexRow, $value['tipo_lesion_reincidencia_codigo'])
            ->setCellValue('AJ'.$indexRow, $value['tipo_lesion_reincidencia_nombre_castellano'])
            ->setCellValue('AK'.$indexRow, $value['tipo_lesion_retiro_codigo'])
            ->setCellValue('AL'.$indexRow, $value['tipo_lesion_retiro_nombre_castellano'])
            ->setCellValue('AM'.$indexRow, $value['tipo_lesion_examen1_codigo'])
            ->setCellValue('AN'.$indexRow, $value['tipo_lesion_examen1_nombre_castellano'])
            ->setCellValue('AO'.$indexRow, $value['tipo_lesion_examen2_codigo'])
            ->setCellValue('AP'.$indexRow, $value['tipo_lesion_examen2_nombre_castellano'])
            ->setCellValue('AQ'.$indexRow, $value['tipo_lesion_examen3_codigo'])
            ->setCellValue('AR'.$indexRow, $value['tipo_lesion_examen3_nombre_castellano'])
            ->setCellValue('AS'.$indexRow, $value['tipo_lesion_examen4_codigo'])
            ->setCellValue('AT'.$indexRow, $value['tipo_lesion_examen4_nombre_castellano'])
            ->setCellValue('AU'.$indexRow, $value['tipo_lesion_examen5_codigo'])
            ->setCellValue('AV'.$indexRow, $value['tipo_lesion_examen5_nombre_castellano'])
            ->setCellValue('AW'.$indexRow, $value['tipo_lesion_causa_codigo'])
            ->setCellValue('AX'.$indexRow, $value['tipo_lesion_causa_nombre_castellano'])
            ->setCellValue('AY'.$indexRow, $value['tipo_lesion_falta_codigo'])
            ->setCellValue('AZ'.$indexRow, $value['tipo_lesion_falta_nombre_castellano'])
            ->setCellValue('BA'.$indexRow, $value['tipo_diagnostico_codigo'])
            ->setCellValue('BB'.$indexRow, $value['tipo_diagnostico_nombre_castellano'])
            ->setCellValue('BC'.$indexRow, $value['tipo_diagnostico_retorno_codigo'])
            ->setCellValue('BD'.$indexRow, $value['tipo_diagnostico_retorno_nombre_castellano'])
            ->setCellValue('BE'.$indexRow, $value['tipo_diagnostico_retorno_observacion'])
            ->setCellValue('BF'.$indexRow, $value['tipo_diagnostico_retorno_tratamiento'])
            ->setCellValue('BG'.$indexRow, $value['tipo_diagnostico_recuperacion_codigo'])
            ->setCellValue('BH'.$indexRow, $value['tipo_diagnostico_recuperacion_nombre_castellano'])
            ->setCellValue('BI'.$indexRow, $value['tipo_diagnostico_recuperacion'])
            ->setCellValue('BJ'.$indexRow, $value['tipo_diagnostico_tiempo_codigo'])
            ->setCellValue('BK'.$indexRow, $value['tipo_diagnostico_tiempo_nombre_castellano']);
            $indexRow = $indexRow + 1;
        }
    }

    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;");
    header("Content-Disposition: attachment;filename=$fileName");
    header("Cache-Control: max-age=0");
    header("Cache-Control: max-age=1");
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Last-Modified: ".gmdate('D, d M Y H:i:s')." GMT");
    header("Cache-Control: cache, must-revalidate");
    header("Pragma: public");

    $writerXLS = IOFactory::createWriter($sheetXLS, 'Xls');
    $writerXLS->save('php://output');
    exit;
    ob_end_flush();
?>