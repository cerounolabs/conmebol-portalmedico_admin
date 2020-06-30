const urlBASE   = 'http://api.conmebol.com/portalmedico/public/v1';
const autBASE   = 'dXNlcl9zZmhvbG94Om5zM3JfNWZoMCEweA==';
const xHTTP	    = new XMLHttpRequest();

function getJSON(codJSON, codURL){
    var urlJSON = urlBASE + '/' + codURL;

    xHTTP.open('GET', urlJSON, false);
    xHTTP.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xJSON = JSON.parse(this.responseText);
            localStorage.removeItem(codJSON);
            localStorage.setItem(codJSON, JSON.stringify(xJSON)); 
        }
    };

    xHTTP.setRequestHeader('Accept', 'application/json;charset=UTF-8');
    xHTTP.setRequestHeader('Authorization', 'Basic ' + conBASE);
    xHTTP.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
    xHTTP.send();
}

function postJSON(codPAGE, codURL, codPARS) {
    var urlJSON = urlBASE + '/' + codURL;

    xHTTP.open('POST', urlJSON, true);
    xHTTP.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xJSON = JSON.parse(this.responseText);
            window.location.replace('../public/' + codPAGE + '.php?code='+ xJSON.code + '&msg=' + xJSON.message); 
        }
    };
    
    xHTTP.setRequestHeader('Accept', 'application/json;charset=UTF-8');
    xHTTP.setRequestHeader('Authorization', 'Basic ' + conBASE);
    xHTTP.setRequestHeader('Content-type', 'application/json;charset=UTF-8');
    xHTTP.send(codPARS);
}

function setChangeCont(codId, codEmail, codUser) {
    var html = 
    '<div class="modal-content">'+
    '   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_contrasenha.php">'+
    '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
    '		    <h4 class="modal-title" id="vcenter"> Reseteo de Contraseña </h4>'+
    '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
    '	    </div>'+
    '	    <div class="modal-body" >'+
    '           <div class="row pt-3">'+
    '               <div class="col-sm-12">'+
    '                   <div class="form-group">'+
    '                       <label for="var06">EMAIL</label>'+
    '                       <input id="var06" name="var06" value="'+codEmail+'" class="form-control" type="email" style="text-transform:lowercase; height:40px;" required readonly>'+
    '                   </div>'+
    '               </div>'+
    ''+
    '               <div class="col-sm-12">'+
    '                   <div class="form-group">'+
    '                       <label for="var07">USUARIO</label>'+
    '                       <input id="var07" name="var07" value="'+codUser+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
    '                   </div>'+
    '               </div>'+
    ''+
    '               <div class="col-sm-12">'+
    '                   <div class="form-group">'+
    '                       <label for="var08">CONTRASE&Ntilde;A</label>'+
    '                       <input id="var08" name="var08" class="form-control" type="password" style="text-transform:uppercase; height:40px;" required>'+
    '                   </div>'+
    '               </div>'+
    '           </div>'+
    '           <div class="form-group">'+
    '               <input id="workCodigo" name="workCodigo" value="'+codId+'" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
    '               <input id="workPage" name="workPage" value="home" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
    '           </div>'+
    '	    </div>'+
    '	    <div class="modal-footer">'+
    '           <button type="submit" class="btn btn-success">Confirmar</button>'+
    '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
    '	    </div>'+
    '   </form>'+
    '</div>';

    $("#modalcontent").empty();
    $("#modalcontent").append(html);
}

function setChangePass(rowPersona){
    var xJSON   = JSON.parse(localStorage.getItem('personaJSON'))['data'];
    var codPer  = document.getElementById(rowPersona);
    var html    = '';

    xJSON.forEach(element => {
        if (codPer.id == element.persona_codigo) {
            html = 
            '<div class="modal-content">'+
            '   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_contrasenha.php">'+
            '	    <div class="modal-header" style="color:#fff; background:#163562;">'+
            '		    <h4 class="modal-title" id="vcenter"> Reseteo de Contraseña </h4>'+
            '		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
            '	    </div>'+
            '	    <div class="modal-body" >'+
            '           <div class="row pt-3">'+
            '               <div class="col-sm-12">'+
            '                   <div class="form-group">'+
            '                       <label for="var06">EMAIL</label>'+
            '                       <input id="var06" name="var06" value="'+element.persona_email+'" class="form-control" type="email" style="text-transform:lowercase; height:40px;" required readonly>'+
            '                   </div>'+
            '               </div>'+
            ''+
            '               <div class="col-sm-12">'+
            '                   <div class="form-group">'+
            '                       <label for="var07">USUARIO</label>'+
            '                       <input id="var07" name="var07" value="'+element.persona_user+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
            '                   </div>'+
            '               </div>'+
            ''+
            '               <div class="col-sm-12">'+
            '                   <div class="form-group">'+
            '                       <label for="var08">CONTRASE&Ntilde;A</label>'+
            '                       <input id="var08" name="var08" class="form-control" type="password" style="text-transform:uppercase; height:40px;" required>'+
            '                   </div>'+
            '               </div>'+
            '           </div>'+
            '           <div class="form-group">'+
            '               <input id="workCodigo" name="workCodigo" value="'+element.persona_codigo+'" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '               <input id="workPage" name="workPage" value="persona" class="form-control" type="hidden" placeholder="Codigo" required readonly>'+
            '           </div>'+
            '	    </div>'+
            '	    <div class="modal-footer">'+
            '           <button type="submit" class="btn btn-success">Confirmar</button>'+
            '		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
            '	    </div>'+
            '   </form>'+
            '</div>';
        }
    })

    $("#modalcontent").empty();
    $("#modalcontent").append(html);
}

function getDominio(codDominio){
    var xJSON = JSON.parse(localStorage.getItem('dominioJSON'))['data'];
    var xDATA = [];

    xJSON.forEach(element => {
        if (element.tipo_dominio == codDominio) {
            xDATA.push(element);
        }
    });

    return xDATA;
}

function getSubDominio(codDominio){
    var xJSON = JSON.parse(localStorage.getItem('subDominioJSON'))['data'];
    var xDATA = [];

    xJSON.forEach(element => {
        if (element.tipo_sub_dominio == codDominio) {
            xDATA.push(element);
        }
    });

    return xDATA;
}

function getMedico(codEquipo, codTipo){
    var xJSON = JSON.parse(localStorage.getItem('medicoJSON'));
    var xDATA = [];
       
    if (xJSON['code'] == 200){
        xJSON['data'].forEach(element => {
            if (element.tipo_perfil_codigo == 10) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function getCompMedico(codPersona){
    var xJSON = JSON.parse(localStorage.getItem('competicionMedicoJSON'));
    var xDATA = [];
       
    if (xJSON['code'] == 200){
        xJSON['data'].forEach(element => {
            if (element.persona_codigo == codPersona) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function getCompetencia(codOrg, codDis, codPer){
    if (localStorage.getItem('competenciaJSON') === null){
        getJSON('competenciaJSON', '200/disciplina/' + codOrg);
    }

    var xJSON = JSON.parse(localStorage.getItem('competenciaJSON'));
    var xDATA = [];

    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if (element.competicion_disciplina == codDis && element.competicion_anho == codPer) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function getJuego(codOrg, codPer, codCom){
    localStorage.removeItem('juegoJSON');

    if (localStorage.getItem('juegoJSON') === null){
        getJSON('juegoJSON', '200/juego/' + codCom + '/' + codOrg);
    }

    var xJSON = JSON.parse(localStorage.getItem('juegoJSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if ((element.competicion_codigo_padre == codCom || element.competicion_codigo == codCom) && element.competicion_anho == codPer) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function getEncuentro(codJue){
    var xJSON = JSON.parse(localStorage.getItem('juegoJSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if (element.juego_codigo == codJue) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function getJugador(rowComp, rowEqui){
    localStorage.removeItem('jugadorJSON');

    if (localStorage.getItem('jugadorJSON') === null){
        getJSON('jugadorJSON', '700/' + rowComp + '/' + rowEqui);
    }

    var xJSON = JSON.parse(localStorage.getItem('jugadorJSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if (element.competicion_codigo == rowComp) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function changeDisciplina(rowOrga, rowAnho, rowDisc, rowComp) {
    var selAnho = document.getElementById(rowAnho);
    var selDisc = document.getElementById(rowDisc);
    var selComp = document.getElementById(rowComp);
    var xJSON   = getCompetencia(rowOrga, selDisc.value, selAnho.value);
            
    while (selComp.length > 0) {
        selComp.remove(0);
    }

    var option      = document.createElement('option');
    option.text     = 'SELECCIONAR...';
    option.selected = true;
    selComp.add(option, null);

    xJSON.forEach(element => {
        if (element.competicion_disciplina == selDisc.value && element.competicion_anho == selAnho.value) {
            var option      = document.createElement('option');
            option.value    = element.competicion_codigo;
            option.text     = element.competicion_nombre;
            selComp.add(option, null);
        }
    });
}

function changeCompetencia(rowOrga, rowAnho, rowComp, rowPart) {
    var selAnho = document.getElementById(rowAnho);
    var selComp = document.getElementById(rowComp);
    var selPart = document.getElementById(rowPart);
    var xJSON   = getJuego(rowOrga, selAnho.value, selComp.value);
            
    while (selPart.length > 0) {
        selPart.remove(0);
    }

    var option      = document.createElement('option');
    option.text     = 'SELECCIONAR...';
    option.selected = true;
    selPart.add(option, null);

    xJSON.forEach(element => {
        if ((element.competicion_codigo_padre == selComp.value || element.competicion_codigo == selComp.value) && element.competicion_anho == selAnho.value) {
            var option      = document.createElement('option');
            option.value    = element.juego_codigo;
            option.text     = element.equipo_local_nombre + ' vs ' + element.equipo_visitante_nombre;
            selPart.add(option, null);
        }
    });
}

function changeJuego(rowPart, rowEqui) {
    var selPart = document.getElementById(rowPart);
    var selEqui = document.getElementById(rowEqui);
    var xJSON   = getEncuentro(selPart.value);
            
    while (selEqui.length > 0) {
        selEqui.remove(0);
    }

    var option      = document.createElement('option');
    option.text     = 'SELECCIONAR...';
    option.selected = true;
    selEqui.add(option, null);

    xJSON.forEach(element => {
        if (element.juego_codigo == selPart.value) {
            var option      = document.createElement('option');
            option.value    = element.equipo_local_codigo;
            option.text     = element.equipo_local_nombre;
            selEqui.add(option, null);

            var option      = document.createElement('option');
            option.value    = element.equipo_visitante_codigo;
            option.text     = element.equipo_visitante_nombre;
            selEqui.add(option, null);
        }
    });
}

function changeEquipo(rowComp, rowEqui, rowPers) {
    var selComp = document.getElementById(rowComp);
    var selEqui = document.getElementById(rowEqui);
    var selPers = document.getElementById(rowPers);
    var xJSON   = getJugador(selComp.value, selEqui.value);

    while (selPers.length > 0) {
        selPers.remove(0);
    }

    var option  = document.createElement('option');
    option.value    = 0;
    option.text     = 'TODOS';
    option.selected = true;
    selPers.add(option, null);

    xJSON.forEach(element => {
        if (element.competicion_codigo == selComp.value) {
            var option      = document.createElement('option');
            option.value    = element.jugador_codigo;
            option.text     = element.jugador_completo;
            selPers.add(option, null);
        }
    });
}