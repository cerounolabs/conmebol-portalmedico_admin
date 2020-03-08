const urlBASE   =  'http://api.conmebol.com/portalmedico/public/v1';
const xHTTP	    = new XMLHttpRequest();

function getJSON(codJSON, codURL) {
    var urlJSON = urlBASE + '/' + codURL;

    $.ajax({
        'async': false,
        'type': "GET",
        'global': false,
        'dataType': 'json',
        'url': urlJSON,
        'success': function (data) {
            localStorage.removeItem(codJSON);
            localStorage.setItem(codJSON, JSON.stringify(data));
        }
    });
}

function postJSON(codPAGE, codURL, codPARS) {
    var urlJSON = urlBASE + '/' + codURL;

    xHTTP.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var xJSON = JSON.parse(this.responseText);
            window.location.replace('../public/' + codPAGE + '.php?code='+ xJSON.code + '&msg=' + xJSON.message); 
        }
    };
    
    xHTTP.open('POST', urlJSON);
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