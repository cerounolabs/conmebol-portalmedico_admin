<?php 
    ob_start();

    require '../class/function/curl_api.php';
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
        ->setTitle('CONMEBOL - Sistema Lesión expor XLS')
        ->setSubject('CONMEBOL - Sistema Lesión expor XLS')
        ->setDescription('CONMEBOL - Sistema Lesión')
        ->setKeywords('CONMEBOL - Sistema Lesión export XLS')
        ->setCategory('CONMEBOL - Sistema Lesión export XLS');

//    $solDetalleJSON = get_curl('200/detalle/solicitud/'.$fileType);
    $fileName       = "planilla_lesion_".date('YmdHis').".xls";

    $sheetXLS->setActiveSheetIndex(0)
        ->setCellValue('A1', 'Company Name')
        ->setCellValue('B1', 'CONFEDERACION SUDAMERICANA DE FUTBOL')

        ->setCellValue('A2', 'Table Name')
        ->setCellValue('B2', 'A1A_PERM')

        ->setCellValue('A3', 'Table Description')
        ->setCellValue('B3', 'Permisos')

        ->setCellValue('A4', 'Fields Titles')
        ->setCellValue('B4', 'Codigo de empleado')
        ->setCellValue('C4', 'Fecha desde')
        ->setCellValue('D4', 'Fecha hasta')
        ->setCellValue('E4', 'Fecha desde aplicacion')
        ->setCellValue('F4', 'Fecha hasta aplicacion')
        ->setCellValue('G4', 'Cantidad de dias')
        ->setCellValue('H4', 'Tipo de permiso')
        ->setCellValue('I4', 'Cantidad diaria')
        ->setCellValue('J4', 'Unidad')
        ->setCellValue('K4', 'Clase')
        ->setCellValue('L4', 'Comentario')
        ->setCellValue('M4', 'Ingreso desde PeopleGate')
        ->setCellValue('N4', 'Cantidad convertida')

        ->setCellValue('A5', 'Fields Types')
        ->setCellValue('B5', 'Alpha-20')
        ->setCellValue('C5', 'Date-8')
        ->setCellValue('D5', 'Date-8')
        ->setCellValue('E5', 'Date-8')
        ->setCellValue('F5', 'Date-8')
        ->setCellValue('G5', 'Num-11')
        ->setCellValue('H5', 'Alpha-8')
        ->setCellValue('I5', 'Float-20')
        ->setCellValue('J5', 'Alpha-1')
        ->setCellValue('K5', 'Alpha-1')
        ->setCellValue('L5', 'Memo-64000')
        ->setCellValue('M5', 'Alpha-1')
        ->setCellValue('N5', 'Alpha-20')

        ->setCellValue('A6', 'Fields Valid Values')
        ->setCellValue('B6', '')

        ->setCellValue('A7', 'Default Value')
        ->setCellValue('B7', '')

        ->setCellValue('A8', 'Tablas relacionadas')
        ->setCellValue('H8', '@A1A_TIPE')

        ->setCellValue('A9', 'Fields Names')
        ->setCellValue('B9', 'U_codemp')
        ->setCellValue('C9', 'U_fecdes')
        ->setCellValue('D9', 'U_fechas')
        ->setCellValue('E9', 'U_fedesapl')
        ->setCellValue('F9', 'U_fehasapl')
        ->setCellValue('G9', 'U_canddia')
        ->setCellValue('H9', 'U_tipper')
        ->setCellValue('I9', 'U_cantdia')
        ->setCellValue('J9', 'U_idunidad')
        ->setCellValue('K9', 'U_clase')
        ->setCellValue('L9', 'U_coment')
        ->setCellValue('M9', 'U_PG')
        ->setCellValue('N9', 'U_hhmm');

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