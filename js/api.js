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