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

    function getTitleDominio($var01){
        switch ($var01) {
            case 'PARTECUERPO':
                $result = 'Parte del Cuerpo';
                break;

            case 'GRUPODIAGNOSTICO':
                $result = 'Grupo Diagnostico';
                break;
            
            case 'TIPOLESION':
                $result = 'Tipo Lesión';
                break;
        }

        return $result;
    }

    function getTitleDominioSub($var01){
        switch ($var01) {
            case 'ZONACUERPO':
                $result = 'Zona del Cuerpo';
                break;

            case 'DIAGNOSTICO':
                $result = 'Diagnostico';
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