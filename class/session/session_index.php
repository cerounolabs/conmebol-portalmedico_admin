<?php
    if(!isset($_SESSION)){ 
        session_start(); 
    }

    require '../../class/function/curl_api.php';
    require '../../class/function/function.php';

    $val_01         = $_POST['val_01'];
    $val_02         = $_POST['val_02'];
    $val_03         = $_SERVER['REMOTE_ADDR'];

    if (isset($val_01) && isset($val_02)){
        $dataJSON           = json_encode(
            array(
                'usuario_var01' => $val_01,
                'usuario_var02' => $val_02,
                'usuario_var03' => $val_03,
                'usuario_var04'	=> $_SERVER['HTTP_HOST'],
                'usuario_var05'	=> $_SERVER['HTTP_USER_AGENT'],
                'usuario_var06'	=> $_SERVER['HTTP_REFERER']
            ));
        
        $resultJSON         = post_curl('login', $dataJSON);
        $resultJSON         = json_decode($resultJSON, true);

        if ($resultJSON['code'] === 200) {
            $_SESSION['log_01'] = $resultJSON['data'][0]['persona_user'];
            $_SESSION['log_02'] = $resultJSON['data'][0]['persona_email'];
            $_SESSION['log_03'] = $val_03;
            $_SESSION['log_04'] = $resultJSON['data'][0]['persona_codigo'];
    
            $_SESSION['usu_01'] = $resultJSON['data'][0]['persona_nombre'];
            $_SESSION['usu_02'] = $resultJSON['data'][0]['equipo_nombre'];
            $_SESSION['usu_03'] = $resultJSON['data'][0]['tipo_perfil_nombre'];
            $_SESSION['usu_04'] = $resultJSON['data'][0]['equipo_codigo'];
            $_SESSION['usu_05'] = $resultJSON['data'][0]['tipo_perfil_codigo'];
    
            $_SESSION['expire'] = time() + 600;

            switch ($_SESSION['usu_05']) {
                case '157':
                    header('Location: ../../examen/control_01.php');
                    break;
                
                default:
                    header('Location: ../../public/home.php');
                    break;
            }
        } else {
            $val_01             = NULL;
            $val_02             = NULL;
            $val_03             = NULL;
    
            header('Location: ../../index.php?code='.$resultJSON['code'].'&msg='.$resultJSON['message']);
        }
    }
?>