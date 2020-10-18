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
    $codEsta        = $_GET['cod05'];
    $infJSON        = get_curl('200/competicion/examen/'.$codComp.'/'.$codEncu.'/'.$codTipo.'/'.$codEsta);
    $fileName       = "planilla_examen_".date('YmdHis').".xls";
    $indexRow       = 1;

    $sheetXLS->setActiveSheetIndex(0)
        ->setCellValue('B1', 'CONFEDERACION SUDAMERICANA DE FUTBOL');

    $sheetXLS->setActiveSheetIndex(0)
        ->setCellValue('A'.$indexRow, 'TEST_CODIGO')
        ->setCellValue('B'.$indexRow, 'TEST_FECHA')
        ->setCellValue('C'.$indexRow, 'TIPO_ESTADO_CODIGO')
        ->setCellValue('D'.$indexRow, 'TIPO_ESTADO_NOMBRE')
        ->setCellValue('E'.$indexRow, 'TIPO_EXAMEN_CODIGO')
        ->setCellValue('F'.$indexRow, 'TIPO_EXAMEN_NOMBRE')
        ->setCellValue('G'.$indexRow, 'JUEGO_CODIGO')
        ->setCellValue('H'.$indexRow, 'EQUIPO_CODIGO')
        ->setCellValue('I'.$indexRow, 'EQUIPO_NOMBRE')
        ->setCellValue('J'.$indexRow, 'EQUIPO_LOCAL_CODIGO')
        ->setCellValue('K'.$indexRow, 'EQUIPO_LOCAL_NOMBRE')
        ->setCellValue('L'.$indexRow, 'EQUIPO_VISITANTE_CODIGO')
        ->setCellValue('M'.$indexRow, 'EQUIPO_VISITANTE_NOMBRE')
        ->setCellValue('N'.$indexRow, 'PERSONA_CODIGO')
        ->setCellValue('O'.$indexRow, 'PERSONA_NOMBRE')
        ->setCellValue('P'.$indexRow, 'PERSONA_APELLIDO')
        ->setCellValue('Q'.$indexRow, 'PERSONA_CONVOCADO')
        ->setCellValue('R'.$indexRow, 'PERSONA_POSICION_CARGO')
        ->setCellValue('S'.$indexRow, 'PERSONA_CAMISETA_DOCUMENTO')
        ->setCellValue('T'.$indexRow, 'LABORATORIO_NOMBRE')
        ->setCellValue('U'.$indexRow, 'LABORATORIO_FECHA_ENVIO')
        ->setCellValue('V'.$indexRow, 'LABORATORIO_FECHA_RECIBIDO')
        ->setCellValue('W'.$indexRow, 'LABORATORIO_RESULTADO')
        ->setCellValue('X'.$indexRow, 'LABORATORIO_CUARENTENA')
        ->setCellValue('Y'.$indexRow, 'LABORATORIO_ADJUNTO');

    if ($infJSON['code'] === 200) {
        $indexRow = $indexRow + 1;

        foreach ($infJSON['data'] as $key => $value) {
            if ($value['TIPO_EXAMEN_CODIGO'] == $codTipo){
                if ($codEncu == 0){
                    if($codEqui == 0){
                        $sheetXLS->setActiveSheetIndex(0)
                            ->setCellValue('A'.$indexRow, $value['TEST_CODIGO'])
                            ->setCellValue('B'.$indexRow, $value['TEST_FECHA'])
                            ->setCellValue('C'.$indexRow, $value['TIPO_ESTADO_CODIGO'])
                            ->setCellValue('D'.$indexRow, $value['TIPO_ESTADO_NOMBRE'])
                            ->setCellValue('E'.$indexRow, $value['TIPO_EXAMEN_CODIGO'])
                            ->setCellValue('F'.$indexRow, $value['TIPO_EXAMEN_NOMBRE'])
                            ->setCellValue('G'.$indexRow, $value['JUEGO_CODIGO'])
                            ->setCellValue('H'.$indexRow, $value['EQUIPO_CODIGO'])
                            ->setCellValue('I'.$indexRow, $value['EQUIPO_NOMBRE'])
                            ->setCellValue('J'.$indexRow, $value['EQUIPO_LOCAL_CODIGO'])
                            ->setCellValue('K'.$indexRow, $value['EQUIPO_LOCAL_NOMBRE'])
                            ->setCellValue('L'.$indexRow, $value['EQUIPO_VISITANTE_CODIGO'])
                            ->setCellValue('M'.$indexRow, $value['EQUIPO_VISITANTE_NOMBRE'])
                            ->setCellValue('N'.$indexRow, $value['PERSONA_CODIGO'])
                            ->setCellValue('O'.$indexRow, $value['PERSONA_NOMBRE'])
                            ->setCellValue('P'.$indexRow, $value['PERSONA_APELLIDO'])
                            ->setCellValue('Q'.$indexRow, $value['PERSONA_CONVOCADO'])
                            ->setCellValue('R'.$indexRow, $value['PERSONA_POSICION_CARGO'])
                            ->setCellValue('S'.$indexRow, $value['PERSONA_CAMISETA_DOCUMENTO'])
                            ->setCellValue('T'.$indexRow, $value['LABORATORIO_NOMBRE'])
                            ->setCellValue('U'.$indexRow, $value['LABORATORIO_FECHA_ENVIO'])
                            ->setCellValue('V'.$indexRow, $value['LABORATORIO_FECHA_RECIBIDO'])
                            ->setCellValue('W'.$indexRow, $value['LABORATORIO_RESULTADO'])
                            ->setCellValue('X'.$indexRow, $value['LABORATORIO_CUARENTENA'])
                            ->setCellValue('Y'.$indexRow, $value['LABORATORIO_ADJUNTO']);

                        $indexRow = $indexRow + 1;
                    } elseif ($value['EQUIPO_CODIGO'] == $codEqui) {
                        $sheetXLS->setActiveSheetIndex(0)
                            ->setCellValue('A'.$indexRow, $value['TEST_CODIGO'])
                            ->setCellValue('B'.$indexRow, $value['TEST_FECHA'])
                            ->setCellValue('C'.$indexRow, $value['TIPO_ESTADO_CODIGO'])
                            ->setCellValue('D'.$indexRow, $value['TIPO_ESTADO_NOMBRE'])
                            ->setCellValue('E'.$indexRow, $value['TIPO_EXAMEN_CODIGO'])
                            ->setCellValue('F'.$indexRow, $value['TIPO_EXAMEN_NOMBRE'])
                            ->setCellValue('G'.$indexRow, $value['JUEGO_CODIGO'])
                            ->setCellValue('H'.$indexRow, $value['EQUIPO_CODIGO'])
                            ->setCellValue('I'.$indexRow, $value['EQUIPO_NOMBRE'])
                            ->setCellValue('J'.$indexRow, $value['EQUIPO_LOCAL_CODIGO'])
                            ->setCellValue('K'.$indexRow, $value['EQUIPO_LOCAL_NOMBRE'])
                            ->setCellValue('L'.$indexRow, $value['EQUIPO_VISITANTE_CODIGO'])
                            ->setCellValue('M'.$indexRow, $value['EQUIPO_VISITANTE_NOMBRE'])
                            ->setCellValue('N'.$indexRow, $value['PERSONA_CODIGO'])
                            ->setCellValue('O'.$indexRow, $value['PERSONA_NOMBRE'])
                            ->setCellValue('P'.$indexRow, $value['PERSONA_APELLIDO'])
                            ->setCellValue('Q'.$indexRow, $value['PERSONA_CONVOCADO'])
                            ->setCellValue('R'.$indexRow, $value['PERSONA_POSICION_CARGO'])
                            ->setCellValue('S'.$indexRow, $value['PERSONA_CAMISETA_DOCUMENTO'])
                            ->setCellValue('T'.$indexRow, $value['LABORATORIO_NOMBRE'])
                            ->setCellValue('U'.$indexRow, $value['LABORATORIO_FECHA_ENVIO'])
                            ->setCellValue('V'.$indexRow, $value['LABORATORIO_FECHA_RECIBIDO'])
                            ->setCellValue('W'.$indexRow, $value['LABORATORIO_RESULTADO'])
                            ->setCellValue('X'.$indexRow, $value['LABORATORIO_CUARENTENA'])
                            ->setCellValue('Y'.$indexRow, $value['LABORATORIO_ADJUNTO']);
                            
                        $indexRow = $indexRow + 1;
                    }
                }elseif ($value['JUEGO_CODIGO'] == $codEncu){
                    if($codEqui == 0){
                        $sheetXLS->setActiveSheetIndex(0)
                            ->setCellValue('A'.$indexRow, $value['TEST_CODIGO'])
                            ->setCellValue('B'.$indexRow, $value['TEST_FECHA'])
                            ->setCellValue('C'.$indexRow, $value['TIPO_ESTADO_CODIGO'])
                            ->setCellValue('D'.$indexRow, $value['TIPO_ESTADO_NOMBRE'])
                            ->setCellValue('E'.$indexRow, $value['TIPO_EXAMEN_CODIGO'])
                            ->setCellValue('F'.$indexRow, $value['TIPO_EXAMEN_NOMBRE'])
                            ->setCellValue('G'.$indexRow, $value['JUEGO_CODIGO'])
                            ->setCellValue('H'.$indexRow, $value['EQUIPO_CODIGO'])
                            ->setCellValue('I'.$indexRow, $value['EQUIPO_NOMBRE'])
                            ->setCellValue('J'.$indexRow, $value['EQUIPO_LOCAL_CODIGO'])
                            ->setCellValue('K'.$indexRow, $value['EQUIPO_LOCAL_NOMBRE'])
                            ->setCellValue('L'.$indexRow, $value['EQUIPO_VISITANTE_CODIGO'])
                            ->setCellValue('M'.$indexRow, $value['EQUIPO_VISITANTE_NOMBRE'])
                            ->setCellValue('N'.$indexRow, $value['PERSONA_CODIGO'])
                            ->setCellValue('O'.$indexRow, $value['PERSONA_NOMBRE'])
                            ->setCellValue('P'.$indexRow, $value['PERSONA_APELLIDO'])
                            ->setCellValue('Q'.$indexRow, $value['PERSONA_CONVOCADO'])
                            ->setCellValue('R'.$indexRow, $value['PERSONA_POSICION_CARGO'])
                            ->setCellValue('S'.$indexRow, $value['PERSONA_CAMISETA_DOCUMENTO'])
                            ->setCellValue('T'.$indexRow, $value['LABORATORIO_NOMBRE'])
                            ->setCellValue('U'.$indexRow, $value['LABORATORIO_FECHA_ENVIO'])
                            ->setCellValue('V'.$indexRow, $value['LABORATORIO_FECHA_RECIBIDO'])
                            ->setCellValue('W'.$indexRow, $value['LABORATORIO_RESULTADO'])
                            ->setCellValue('X'.$indexRow, $value['LABORATORIO_CUARENTENA'])
                            ->setCellValue('Y'.$indexRow, $value['LABORATORIO_ADJUNTO']);

                        $indexRow = $indexRow + 1;
                    } elseif ($value['EQUIPO_CODIGO'] == $codEqui) {
                        $sheetXLS->setActiveSheetIndex(0)
                            ->setCellValue('A'.$indexRow, $value['TEST_CODIGO'])
                            ->setCellValue('B'.$indexRow, $value['TEST_FECHA'])
                            ->setCellValue('C'.$indexRow, $value['TIPO_ESTADO_CODIGO'])
                            ->setCellValue('D'.$indexRow, $value['TIPO_ESTADO_NOMBRE'])
                            ->setCellValue('E'.$indexRow, $value['TIPO_EXAMEN_CODIGO'])
                            ->setCellValue('F'.$indexRow, $value['TIPO_EXAMEN_NOMBRE'])
                            ->setCellValue('G'.$indexRow, $value['JUEGO_CODIGO'])
                            ->setCellValue('H'.$indexRow, $value['EQUIPO_CODIGO'])
                            ->setCellValue('I'.$indexRow, $value['EQUIPO_NOMBRE'])
                            ->setCellValue('J'.$indexRow, $value['EQUIPO_LOCAL_CODIGO'])
                            ->setCellValue('K'.$indexRow, $value['EQUIPO_LOCAL_NOMBRE'])
                            ->setCellValue('L'.$indexRow, $value['EQUIPO_VISITANTE_CODIGO'])
                            ->setCellValue('M'.$indexRow, $value['EQUIPO_VISITANTE_NOMBRE'])
                            ->setCellValue('N'.$indexRow, $value['PERSONA_CODIGO'])
                            ->setCellValue('O'.$indexRow, $value['PERSONA_NOMBRE'])
                            ->setCellValue('P'.$indexRow, $value['PERSONA_APELLIDO'])
                            ->setCellValue('Q'.$indexRow, $value['PERSONA_CONVOCADO'])
                            ->setCellValue('R'.$indexRow, $value['PERSONA_POSICION_CARGO'])
                            ->setCellValue('S'.$indexRow, $value['PERSONA_CAMISETA_DOCUMENTO'])
                            ->setCellValue('T'.$indexRow, $value['LABORATORIO_NOMBRE'])
                            ->setCellValue('U'.$indexRow, $value['LABORATORIO_FECHA_ENVIO'])
                            ->setCellValue('V'.$indexRow, $value['LABORATORIO_FECHA_RECIBIDO'])
                            ->setCellValue('W'.$indexRow, $value['LABORATORIO_RESULTADO'])
                            ->setCellValue('X'.$indexRow, $value['LABORATORIO_CUARENTENA'])
                            ->setCellValue('Y'.$indexRow, $value['LABORATORIO_ADJUNTO']);
                            
                        $indexRow = $indexRow + 1;
                    }
                }

            }
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