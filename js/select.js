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

    if (selEqui.value == 39393 && rowPlay == 'O' && rowTipo == 210) {
        xJSON.forEach(element => {
            var option      = document.createElement('option');
            option.value    = element.jugador_codigo;
            option.text     = element.jugador_completo;
            selPers.add(option, null);
        });
    } else {
        xJSON.forEach(element => {
            if (element.competicion_codigo == rowComp) {
                var option      = document.createElement('option');
                option.value    = element.jugador_codigo;
                option.text     = element.jugador_completo;
                selPers.add(option, null);
            }
        });
    }
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

function selectTipoExamen(rowInp) {
    var selInp  = document.getElementById(rowInp);
    var xJSON   = getDominio('EXAMENMEDICOTIPO');
    console.log(xJSON);

    while (selInp.length > 0) {
        selInp.remove(0);
    }

    var option      = document.createElement('option');
    option.value    = 0;
    option.text     = 'SELECCIONAR...';
    option.selected = true;
    selInp.add(option, null);

    xJSON.forEach(element => {
        if (element.tipo_estado_codigo == 'A') {
            var option      = document.createElement('option');
            option.value    = element.tipo_codigo;
            option.text     = element.tipo_nombre_castellano;
            selInp.add(option, null);
        }
    });
}

function selectCompetencias(rowOrg, rowDisc, rowAnho, rowInp){
    var selDisc     = document.getElementById(rowDisc);
    var selAnho     = document.getElementById(rowAnho);
    var selInp      = document.getElementById(rowInp);
    var xJSON       = getCompetencia(rowOrg, selDisc.value, selAnho.value)
            
    while (selInp.length > 0) {
        selInp.remove(0);
    }

    xJSON.forEach(element => {
        if (selDisc.value == element.competicion_disciplina && selAnho.value == element.competicion_anho) {
            var option      = document.createElement('option');
            option.value    = element.competicion_codigo;
            option.text     = element.competicion_nombre;
            selInp.add(option, null);
        }
    });
}