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