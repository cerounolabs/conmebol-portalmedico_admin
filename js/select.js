function selectEquipo(rowComp, rowEncu, rowEqui, rowTipo, rowPlay, rowPers) {
    var selEqui = document.getElementById(rowEqui);
    var selPers = document.getElementById(rowPers);
    var xJSON   = getExamenJugador(rowComp, selEqui.value, rowTipo, rowEncu, rowPlay);

    while (selPers.length > 0) {
        selPers.remove(0);
    }

    var option      = document.createElement('option');
    option.value    = 0;
    option.text     = 'SELECCIONAR...';
    option.selected = true;
    selPers.add(option, null);

    xJSON.forEach(element => {
        if (element.competicion_codigo == rowComp) {
            var option      = document.createElement('option');
            option.value    = element.jugador_codigo;
            option.text     = element.jugador_completo;
            selPers.add(option, null);
        }
    });
}

function selectJugador2(rowJud, inpPos, inpNro, rowEqui, rowComp, rowEncu, rowTipo, rowPlay){
    var elemJug = document.getElementById(rowJud);
    var elemEqu = '';
    var elemPos = document.getElementById(inpPos);
    var elemNro = document.getElementById(inpNro);

    if (rowEqui == 'var110') {
        elemEqu = document.getElementById(rowEqui).value;
    } else {
        elemEqu = rowEqui;
    }

    var xJSON   = getExamenJugador(rowComp, elemEqu, rowTipo, rowEncu, rowPlay);

    xJSON.forEach(element => {
        if (element.jugador_codigo == elemJug.value) {
            switch (rowPlay) {
                case 'T':
                    elemPos.value = element.jugador_rol_1;
                    elemNro.value = '';
                    break;
            
                case 'P':
                    elemPos.value = element.jugador_posicion;
                    elemNro.value = element.jugador_numero;
                    break;

                case 'O':
                    elemPos.value = element.jugador_posicion;
                    elemNro.value = '';
                    break;
            }
        }
    });
}
