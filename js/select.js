function selectEquipo(rowComp, rowEncu, rowEqui, rowTipo, rowPlay, rowPers) {
    var selEqui = document.getElementById(rowEqui);
    var selPers = document.getElementById(rowPers);
    var xJSON   = '';

    if (rowPlay == 'Z') {
        xJSON   = getExamenPersona(rowComp, rowTipo, rowEncu);
    } else {
        xJSON   = getExamenJugador(rowComp, selEqui.value, rowTipo, rowEncu, rowPlay);
    }

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
    var elemPos = '';
    var elemNro = '';

    if (rowEqui == 'var110') {
        elemEqu = document.getElementById(rowEqui).value;
    } else {
        elemEqu = rowEqui;
    }
    
    var xJSON   = '';

    if (rowPlay == 'Z') {
        xJSON   = getExamenPersona(rowComp, rowTipo, rowEncu);
    } else {
        xJSON   = getExamenJugador(rowComp, elemEqu, rowTipo, rowEncu, rowPlay);
    }

    xJSON.forEach(element => {
        if (element.jugador_codigo == elemJug.value) {
            switch (rowPlay) {
                case 'T':
                    elemPos         = document.getElementById(inpPos);
                    elemPos.value   = element.jugador_rol_1;
                    break;
            
                case 'P':
                    elemPos         = document.getElementById(inpPos);
                    elemNro         = document.getElementById(inpNro);
                    elemPos.value   = element.jugador_posicion;
                    elemNro.value   = element.jugador_numero;
                    break;

                case 'Z':
                    elemPos         = document.getElementById(inpPos);
                    elemNro         = document.getElementById(inpNro);
                    elemPos.value   = element.jugador_posicion;
                    elemNro.value   = element.tipo_documento_nombre_castellano + ' - ' + element.tipo_documento_numero;
                    break;

                case 'O':
                    elemPos         = document.getElementById(inpPos);
                    elemPos.value   = element.jugador_posicion;
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

function selectEncuentros(rowOrg, rowComp, rowAnho, rowTip, rowInp){
    var selComp     = document.getElementById(rowComp);
    var selAnho     = document.getElementById(rowAnho);
    var selInp      = document.getElementById(rowInp);
    var xJSON       = getJuego(rowOrg, selAnho.value, selComp.value)
            
    while (selInp.length > 0) {
        selInp.remove(0);
    }

    switch (rowTip) {
        case 1:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'SELECCIONAR';
            option.selected = true;
            selInp.add(option, null);
            break;
    
        case 2:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'TODOS';
            option.selected = true;
            selInp.add(option, null);
            break;
    }

    xJSON.forEach(element => {
        var option      = document.createElement('option');
        option.value    = element.juego_codigo;
        option.text     = element.equipo_local_nombre + ' vs ' + element.equipo_visitante_nombre;
        selInp.add(option, null);
    });

    switch (rowTip) {
        case 3:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'SELECCIONAR';
            option.selected = false;
            selInp.add(option, null);
            break;
    
        case 4:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'TODOS';
            option.selected = false;
            selInp.add(option, null);
            break;
    }
}

function selectEquipos(rowComp, rowEncu, rowTip, rowInp){
    var selComp     = document.getElementById(rowComp);
    var selEncu     = document.getElementById(rowEncu);
    var selInp      = document.getElementById(rowInp);

    while (selInp.length > 0) {
        selInp.remove(0);
    }

    switch (rowTip) {
        case 1:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'SELECCIONAR';
            option.selected = true;
            selInp.add(option, null);
            break;
    
        case 2:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'TODOS';
            option.selected = true;
            selInp.add(option, null);
            break;
    }

    if (selEncu.value == 0) {
        var xJSON       = getCompetenciaParticipante(selComp.value);

        xJSON.forEach(element => {
            var option      = document.createElement('option');
            option.value    = element.equipo_codigo;
            option.text     = element.equipo_nombre;
            selInp.add(option, null);
        });

        var option      = document.createElement('option');
        option.value    = 39393;
        option.text     = 'CONMEBOL';
        selInp.add(option, null);
    } else {
        var xJSON       = getEncuentro(selEncu.value);
        
        xJSON.forEach(element => {
            if (element.juego_codigo == selEncu.value) {
                var option      = document.createElement('option');
                option.value    = element.equipo_local_codigo;
                option.text     = element.equipo_local_nombre;
                selInp.add(option, null);
    
                var option      = document.createElement('option');
                option.value    = element.equipo_visitante_codigo;
                option.text     = element.equipo_visitante_nombre;
                selInp.add(option, null);

                var option      = document.createElement('option');
                option.value    = 39393;
                option.text     = 'CONMEBOL';
                selInp.add(option, null);
            }
        });
    }
}

function selectDominio(rowDom, rowTip, rowInp){
    var selInp = document.getElementById(rowInp);
    var xJSON   = getDominio(rowDom);

    while (selInp.length > 0) {
        selInp.remove(0);
    }

    switch (rowTip) {
        case 1:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'SELECCIONAR';
            option.selected = true;
            selInp.add(option, null);
            break;
    
        case 2:
            var option      = document.createElement('option');
            option.value    = 0;
            option.text     = 'TODOS';
            option.selected = true;
            selInp.add(option, null);
            break;
    }

    xJSON.forEach(element => {
        if (element.tipo_dominio == rowDom) {
            var option      = document.createElement('option');
            option.value    = element.tipo_codigo;
            option.text     = element.tipo_nombre_castellano;
            selInp.add(option, null);
        }
    });
}

function selectEquiposAll(rowComp, rowInp){
    var selComp     = document.getElementById(rowComp);
    var selInp      = document.getElementById(rowInp);
    console.log(selComp.value);
    var xJSON       = getCompetenciaParticipante(selComp.value);

    while (selInp.length > 0) {
        selInp.remove(0);
    }

        xJSON.forEach(element => {
            var option      = document.createElement('option');
            option.value    = element.equipo_codigo;
            option.text     = element.equipo_nombre;
            selInp.add(option, null);
        });

        var option      = document.createElement('option');
        option.value    = 39393;
        option.text     = 'CONMEBOL';
        selInp.add(option, null);
    
}