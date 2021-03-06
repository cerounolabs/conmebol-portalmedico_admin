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
        $path   = '../imagen/competicion/img_'.$var02;
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
            case 'COMPETICIONCATEGORIA':
                $result = 'COMPETICION CATEGORIA';
                break;

            case 'EXAMENMEDICOTIPO':
                $result = 'EXAMEN MÉDICO TIPO';
                break;
            
            case 'EXAMENMEDICODOCUMENTO':
                $result = 'EXAMEN MÉDICO TIPO DOCUMENTO';
                break;

            case 'EXAMENMEDICOANTMEDICOESTADO':
                $result = 'EXAMEN MÉDICO ANTECEDENTES M&Eacute;DICOS ESTADO';

            case 'EXAMENMEDICOANTMEDICO':
                $result = 'EXAMEN MÉDICO ANTECEDENTES M&Eacute;DICOS TIPO';
                break;

            case 'EXAMENMEDICOCOVID19ESTADO':
                $result = 'EXAMEN MÉDICO COVID19 ESTADO';
                break;

            case 'EXAMENMEDICOCOVID19CARGO':
                $result = 'EXAMEN MÉDICO COVID19 CARGO';
                break;

            case 'EXAMENMEDICOCOVID19SEROLOGIA':
                $result = 'EXAMEN MÉDICO COVID19 SEROLOGÍA';
                break;

            case 'EXAMENMEDICOCOVID19SINTOMA':
                $result = 'EXAMEN MÉDICO COVID19 SÍNTOMAS';
                break;

            case 'CUERPOPARTE':
                $result = 'CUERPO PARTE';
                break;

            case 'CUERPOZONA':
                $result = 'CUERPO ZONA';
                break;

            case 'CUERPOLUGAR':
                $result = 'CUERPO LUGAR';
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

            case 'LESIONEXAMEN':
                $result = 'LESIÓN EXAMEN';
                break;

            case 'LESIONTIPO':
                $result = 'LESIÓN TIPO';
                break;

            case 'LESIONORIGEN':
                $result = 'LESIÓN ORIGEN';
                break;

            case 'LESIONREINCIDENCIA':
                $result = 'LESIÓN REINCIDENCIA';
                break;

            case 'LESIONRETIRO':
                $result = 'LESIÓN RETIRO';
                break;

            case 'LESIONCAUSA':
                $result = 'LESIÓN CAUSA';
                break;

            case 'LESIONFALTA':
                $result = 'LESIÓN FALTA';
                break;

            case 'CONCUSIONCUESTIONARIO':
                $result = 'CONCUSIÓN CUESTIONARIO';
                break;

            case 'CONCUSIONTIPO':
                $result = 'CONCUSIÓN TIPO';
                break;

            case 'CONCUSIONSIGNO':
                $result = 'CONCUSIÓN SIGNO';
                break;

            case 'CONCUSIONMEMORIA':
                $result = 'CONCUSIÓN MEMORIA';
                break;

            case 'CONCUSIONSEGUIMIENTO':
                $result = 'CONCUSIÓN SEGUIMIENTO';
                break;

            case 'CAMPOCLIMA':
                $result = 'CAMPO CLIMA';
                break;

            case 'CAMPODISTANCIA':
                $result = 'CAMPO DISTANCIA';
                break;

            case 'CAMPOMINUTO':
                $result = 'CAMPO MINUTO';
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

            case 'USUARIOESTADO':
                $result = 'USUARIO ESTADO';
                break;

            case 'USUARIOACCESO':
                $result = 'USUARIO ACCESO';
                break;

            case 'USUARIOMODULO':
                $result = 'USUARIO MÓDULO';
                break;

            case 'USUARIOROL':
                $result = 'USUARIO ROL';
                break;
        }

        return $result;
    }

    function getTitleDominioSub($var01){
        switch ($var01) {
            case 'CUERPOZONA':
                $result = 'CUERPO ZONA';
                break;

            case 'DIAGNOSTICOTIPO':
                $result = 'DIAGNÓSTICO TIPO';
                break;
        }

        return $result;
    }

    function getDominioSub($var01){
        switch ($var01) {
            case 'CUERPOZONA':
                $result = 'CUERPOPARTE';
                break;

            case 'DIAGNOSTICOTIPO':
                $result = 'DIAGNOSTICOGRUPO';
                break;
        }

        return $result;
    }

    function getTitlePersona($var01){
        switch ($var01) {
            case 'USUARIO':
                $result = 'USUARIOS';
                break;

            case 'MEDICO':
                $result = 'MÉDICOS';
                break;
        }

        return $result;
    }
?>