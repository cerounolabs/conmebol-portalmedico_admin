<?php
    function getUUID(){
        $data    = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    function getFechaHora(){
        $result = date("YmdHis");
        return $result;
    }

    function getImagenBase64($var01, $var02, $var03){
        $path   = '../imagen/competencia/img_'.$var02;
        $ext    = '';
        $imgFile= '';
        $result = '';

        if ($var01 === "image/png"){
            $result   = $path.'.png';
        } elseif ($var01 === 'image/jpeg') {
            $result   = $path.'.jpeg';
        } elseif ($var01 === 'image/jpg') {
            $result   = $path.'.jpg';
        } elseif ($var01 === 'image/gif') {
            $result   = $path.'.gif';
        }

        if (!file_exists($result)) {
            $bin        = base64_decode($var03);
            $size       = getImageSizeFromString($bin);
        
            if (empty($size['mime']) || strpos($size['mime'], 'image/') !== 0) {
                die();
            }
        
            $ext        = substr($size['mime'], 6);
        
            if (!in_array($ext, ['png', 'gif', 'jpeg', 'jpg'])) {
                die();
            }
        
            $result     = $path.'.'.$ext;
            file_put_contents($result, $bin);
        }

        return $result;
    }

    function getTitleDominio($var01){
        switch ($var01) {
            case 'CUERPOPARTE':
                $result = 'CUERPO PARTE';
                break;

            case 'CUERPOZONA':
                $result = 'CUERPO ZONA';
                break;
            
            case 'DIAGNOSTICOTIPO':
                $result = 'DIAGNÓSTICO TIPO';
                break;

            case 'DIAGNOSTICOGRUPO':
                $result = 'DIAGNÓSTICO GRUPO';
                break;

            case 'DIAGNOSTICOTIEMPO':
                $result = 'DIAGNÓSTICO TIEMPO';
                break;

            case 'DIAGNOSTICORECUPERACION':
                $result = 'DIAGNÓSTICO RECUPERACIÓN';
                break;

            case 'LESIONESTADO':
                $result = 'LESIÓN ESTADO';
                break;

            case 'LESIONTIPO':
                $result = 'LESIÓN TIPO';
                break;

            case 'LESIONCARACTERISTICA':
                $result = 'LESIÓN CARACTERISTICA';
                break;

            case 'LESIONREINCIDENCIA':
                $result = 'LESIÓN REINCIDENCIA';
                break;

            case 'LESIONCAUSA':
                $result = 'LESIÓN CAUSA';
                break;

            case 'LESIONFALTA':
                $result = 'LESIÓN FALTA';
                break;

            case 'CAMPOCLIMA':
                $result = 'CAMPO CLIMA';
                break;

            case 'CAMPODISTANCIA':
                $result = 'CAMPO DISTANCIA';
                break;

            case 'CAMPOTRASLADO':
                $result = 'CAMPO TRASLADO';
                break;

            case 'CAMPOTIPO':
                $result = 'CAMPO TIPO';
                break;

            case 'CAMPOPOSICION':
                $result = 'CAMPO POSICIÓN';
                break;
        }

        return $result;
    }

    function getTitleDominioSub($var01){
        switch ($var01) {
            case 'ZONACUERPO':
                $result = 'ZONA DEL CUERPO';
                break;

            case 'DIAGNOSTICO':
                $result = 'DIAGNÓSTICO';
                break;
        }

        return $result;
    }

    function getDominioSub($var01){
        switch ($var01) {
            case 'ZONACUERPO':
                $result = 'PARTECUERPO';
                break;

            case 'DIAGNOSTICO':
                $result = 'GRUPODIAGNOSTICO';
                break;
        }

        return $result;
    }
?>