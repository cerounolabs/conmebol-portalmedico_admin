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
    xHTTP.setRequestHeader('Authorization', 'Basic ' + autBASE);
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
    xHTTP.setRequestHeader('Authorization', 'Basic ' + autBASE);
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

function getDominio(codDom){
    if (localStorage.getItem('dominioJSON') === null){
        getJSON('dominioJSON', '000');
    }

    var xJSON = JSON.parse(localStorage.getItem('dominioJSON'));
    var xDATA = [];

    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if (element.tipo_dominio == codDom) {
                xDATA.push(element);
            }
        });
    }

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

function getMedico(codTipo){
    if (localStorage.getItem('medicoJSON') === null){
        getJSON('medicoJSON', '400');
    }

    var xJSON = JSON.parse(localStorage.getItem('medicoJSON'));
    var xDATA = [];
       
    if (xJSON['code'] == 200){
        xJSON['data'].forEach(element => {
            if (element.tipo_perfil_codigo == codTipo) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}

function getCompMedico(codPers, codTip){
    if (localStorage.getItem('competicionMedicoJSON') === null){
        getJSON('competicionMedicoJSON', '401/competicion');
    }

    var xJSON = JSON.parse(localStorage.getItem('competicionMedicoJSON'));
    var xDATA = [];
       
    if (xJSON['code'] == 200){
        xJSON['data'].forEach(element => {
            if (element.persona_codigo == codPers && element.tipo_modulo_codigo == codTip) {
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
        getJSON('jugadorJSON', '200/competicion/equipo/' + rowEqui + '/' + rowComp);
    }

    var xJSON = JSON.parse(localStorage.getItem('jugadorJSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            xDATA.push(element);
        });
    }

    return xDATA; 
}

function getExamenJugador(rowComp, rowEqui, rowTipo, rowEncu){
    localStorage.removeItem('examenJugadorJSON');

    if (localStorage.getItem('examenJugadorJSON') === null){
        getJSON('examenJugadorJSON', '200/competicion/equipo/alta/' + rowEqui + '/' + rowComp + '/' + rowTipo + '/' + rowEncu);
    }

    var xJSON = JSON.parse(localStorage.getItem('examenJugadorJSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            xDATA.push(element);
        });
    }

    return xDATA; 
}

function getEquipo(rowPerf, rowEqui){
    if (localStorage.getItem('equipoJSON') === null){
        getJSON('equipoJSON', '300');
    }

    var xJSON = JSON.parse(localStorage.getItem('jugadorJSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if (rowPerf != 157) {
                xDATA.push(element);
            } else {
                if (element.equipo_codigo == rowEqui) {
                    xDATA.push(element);
                } else {
                    
                }
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
    option.value    = 0;
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
    option.value    = 0;
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
    option.value    = 0;
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

function changeEquipo02(rowInput, rowDom) {
    var selDom  = document.getElementById(rowDom);
    var selItem = document.getElementById(rowInput);
    var xJSON   = getEquipo(selDom.value);

    while (selItem.length > 0) {
        selItem.remove(0);
    }

    var option      = document.createElement('option');
    option.value    = 0;
    option.text     = 'SELECCIONAR';
    option.selected = true;
    selItem.add(option, null);

    xJSON.forEach(element => {
        if (element.competicion_codigo == selComp.value) {
            var option      = document.createElement('option');
            option.value    = element.equipo_codigo;
            option.text     = element.equipo_nombre;
            selItem.add(option, null);
        }
    });
}

function selDominio(rowInput, rowDom){
    var selItem = document.getElementById(rowInput);
    var xJSON   = getDominio(rowDom);

    while (selItem.length > 0) {
        selItem.remove(0);
    }

    var option      = document.createElement('option');
    option.value    = 0;
    option.text     = 'SELECCIONAR';
    option.selected = true;
    selItem.add(option, null);

    xJSON.forEach(element => {
        if (element.tipo_dominio == rowDom) {
            var option      = document.createElement('option');
            option.value    = element.tipo_codigo;
            option.text     = element.tipo_nombre_castellano;
            selItem.add(option, null);
        }
    });
}

function getCovidControl(rowTipo, rowOrga, rowAnho, rowDisc, rowComp, rowEncu, rowEqui, rowPers){
    if (localStorage.getItem('covid19JSON') === null){
        getJSON('covid19JSON', '801/covid19/prueba/'+rowOrga);
    }

    var xJSON = JSON.parse(localStorage.getItem('covid19JSON'));
    var xDATA = [];
    
    if (xJSON['code'] == 200) {
        xJSON['data'].forEach(element => {
            if (element.competicion_anho == rowAnho && element.tipo_covid19_codigo == rowTipo){
                if (rowDisc == 0) {
                    if (rowComp == 0) {
                        if (rowEncu == 0) {
                            if (rowEqui == 0) {
                                if (rowPers == 0) {
                                    xDATA.push(element);
                                } else {
                                    if (element.jugador_codigo == rowPers){
                                        xDATA.push(element);
                                    }
                                }
                            } else {
                                if (element.equipo_codigo == rowEqui) {
                                    if (rowPers == 0) {
                                        xDATA.push(element);
                                    } else {
                                        if (element.jugador_codigo == rowPers){
                                            xDATA.push(element);
                                        }
                                    }
                                }
                            }
                        } else {
                            if (element.juego_codigo == rowEncu) {
                                if (rowEqui == 0) {
                                    if (rowPers == 0) {
                                        xDATA.push(element);
                                    } else {
                                        if (element.jugador_codigo == rowPers){
                                            xDATA.push(element);
                                        }
                                    }
                                } else {
                                    if (element.equipo_codigo == rowEqui) {
                                        if (rowPers == 0) {
                                            xDATA.push(element);
                                        } else {
                                            if (element.jugador_codigo == rowPers){
                                                xDATA.push(element);
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    } else {
                        if (element.competicion_codigo == rowComp) {
                            if (rowEncu == 0) {
                                if (rowEqui == 0) {
                                    if (rowPers == 0) {
                                        xDATA.push(element);
                                    } else {
                                        if (element.jugador_codigo == rowPers){
                                            xDATA.push(element);
                                        }
                                    }
                                } else {
                                    if (element.equipo_codigo == rowEqui) {
                                        if (rowPers == 0) {
                                            xDATA.push(element);
                                        } else {
                                            if (element.jugador_codigo == rowPers){
                                                xDATA.push(element);
                                            }
                                        }
                                    }
                                }
                            } else {
                                if (element.juego_codigo == rowEncu) {
                                    if (rowEqui == 0) {
                                        if (rowPers == 0) {
                                            xDATA.push(element);
                                        } else {
                                            if (element.jugador_codigo == rowPers){
                                                xDATA.push(element);
                                            }
                                        }
                                    } else {
                                        if (element.equipo_codigo == rowEqui) {
                                            if (rowPers == 0) {
                                                xDATA.push(element);
                                            } else {
                                                if (element.jugador_codigo == rowPers){
                                                    xDATA.push(element);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                } else {
                    if (element.disciplina_codigo == rowDisc) {
                        if (rowComp == 0) {
                            if (rowEncu == 0) {
                                if (rowEqui == 0) {
                                    if (rowPers == 0) {
                                        xDATA.push(element);
                                    } else {
                                        if (element.jugador_codigo == rowPers){
                                            xDATA.push(element);
                                        }
                                    }
                                } else {
                                    if (element.equipo_codigo == rowEqui) {
                                        if (rowPers == 0) {
                                            xDATA.push(element);
                                        } else {
                                            if (element.jugador_codigo == rowPers){
                                                xDATA.push(element);
                                            }
                                        }
                                    }
                                }
                            } else {
                                if (element.juego_codigo == rowEncu) {
                                    if (rowEqui == 0) {
                                        if (rowPers == 0) {
                                            xDATA.push(element);
                                        } else {
                                            if (element.jugador_codigo == rowPers){
                                                xDATA.push(element);
                                            }
                                        }
                                    } else {
                                        if (element.equipo_codigo == rowEqui) {
                                            if (rowPers == 0) {
                                                xDATA.push(element);
                                            } else {
                                                if (element.jugador_codigo == rowPers){
                                                    xDATA.push(element);
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } else {
                            if (element.competicion_codigo == rowComp) {
                                if (rowEncu == 0) {
                                    if (rowEqui == 0) {
                                        if (rowPers == 0) {
                                            xDATA.push(element);
                                        } else {
                                            if (element.jugador_codigo == rowPers){
                                                xDATA.push(element);
                                            }
                                        }
                                    } else {
                                        if (element.equipo_codigo == rowEqui) {
                                            if (rowPers == 0) {
                                                xDATA.push(element);
                                            } else {
                                                if (element.jugador_codigo == rowPers){
                                                    xDATA.push(element);
                                                }
                                            }
                                        }
                                    }
                                } else {
                                    if (element.juego_codigo == rowEncu) {
                                        if (rowEqui == 0) {
                                            if (rowPers == 0) {
                                                xDATA.push(element);
                                            } else {
                                                if (element.jugador_codigo == rowPers){
                                                    xDATA.push(element);
                                                }
                                            }
                                        } else {
                                            if (element.equipo_codigo == rowEqui) {
                                                if (rowPers == 0) {
                                                    xDATA.push(element);
                                                } else {
                                                    if (element.jugador_codigo == rowPers){
                                                        xDATA.push(element);
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }    
                    }
                }
            }
            
        });
    }

    return xDATA;
}

function selectJugador(codJud, inpPos, inpNro, codEqui, codComp){
    var elemJug = document.getElementById(codJud);
    var elemPos = document.getElementById(inpPos);
    var elemNro = document.getElementById(inpNro);
    var xJSON   = getJugador(codComp, codEqui);

    xJSON.forEach(element => {
        if (element.jugador_codigo == elemJug.value) {
            elemPos.value = element.jugador_posicion;
            elemNro.value = 'NRO. ' + element.jugador_numero;
        }
    });
}

function getExamenPrueba(codTipo, codEncu, codEqui) {
    if (localStorage.getItem('examenPruebaJSON') === null){
        getJSON('examenPruebaJSON', '801/examen/prueba/'+ codEqui +'/'+ codEncu);
    }

    var xJSON = JSON.parse(localStorage.getItem('examenPruebaJSON'));
    var xDATA = [];
       
    if (xJSON['code'] == 200){
        xJSON['data'].forEach(element => {
            if (element.tipo_examen_codigo == codTipo && element.encuentro_codigo == codEncu) {
                xDATA.push(element);
            }
        });
    }

    return xDATA; 
}