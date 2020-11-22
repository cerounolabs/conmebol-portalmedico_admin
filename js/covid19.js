$(document).ready(function() {
	var xDATA       = getExamenPrueba(174, _codEncu, _codEqui);
    var tableData   = $('#tableLoad').DataTable(
        {
            processing	: true,
            destroy		: true,
            searching	: true,
            paging		: true,
            lengthChange: true,
            info		: true,
            orderCellsTop: true,
            fixedHeader	: true,
            language	: {
                lengthMenu: "Mostrar _MENU_ registros por pagina",
                zeroRecords: "Nothing found - sorry",
                info: "Mostrando pagina _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles.",
                infoFiltered: "(Filtrado de _MAX_ registros totales)",
                sZeroRecords: "No se encontraron resultados",
                sSearch: "buscar",
                oPaginate: {
                    sFirst:    "Primero",
                    sLast:     "Último",
                    sNext:     "Siguiente",
                    sPrevious: "Anterior"
                },
            },
            data : xDATA,
            columnDefs	: [
                { targets			: [0],	visible : true,	searchable : true,	orderData : [0, 0] },
                { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                { targets			: [3],	visible : true,searchable : true,	orderData : [3, 0] },
                { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                { targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
                { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
				{ targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
				{ targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] },
				{ targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0] },
				{ targets			: [12],	visible : true,	searchable : true,	orderData : [12, 0] },
                { targets			: [13],	visible : false,searchable : false,	orderData : [13, 0] },
                { targets			: [14],	visible : false,searchable : false,	orderData : [14, 0] },
                { targets			: [15],	visible : false,searchable : false,	orderData : [15, 0] }
            ],
            columns		: [
                { data				: 'examen_codigo', name : 'examen_codigo'},
                { data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
                { data				: 'examen_fecha_1', name : 'examen_fecha_1'},
                { data				: 'competicion_nombre', name : 'competicion_nombre'},
                { data				: 'encuentro_nombre', name : 'encuentro_nombre'},
                { data				: 'equipo_nombre', name : 'equipo_nombre'},
				{ data				: 'persona_nombre', name : 'persona_nombre'},
				{ data				: 'examen_persona_posicion', name : 'examen_persona_posicion'},
                { data				: 'examen_laboratorio_nombre', name : 'examen_laboratorio_nombre'},
                { data				: 'examen_laboratorio_fecha_envio', name : 'examen_laboratorio_fecha_envio'},
				{ data				: 'examen_laboratorio_fecha_recepcion', name : 'examen_laboratorio_fecha_recepcion'},
				{ data				: 'examen_laboratorio_resultado', name : 'examen_laboratorio_resultado'},
				{ render            : 
                    function (data, type, full, meta) {
						var btnUPD	= '';
						var btnIMG  = '';
						var btnNEW  = '';
						var btnDSP = '<button onclick="setExamenCovid('+ full.examen_codigo +', 2);" type="button" class="btn btn-primary btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv" title="Ver"><i class="ti-eye"></i></button>';
						if (full.tipo_estado_codigo == 207) {
							btnUPD  = '<button onclick="setExamenCovid('+ full.examen_codigo +', 3);" title="Laboratorio" type="button" class="btn btn-success btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-edit"></i></button>';
						}

						if (full.examen_laboratorio_adjunto != '') {
							btnIMG  = '<a href="http://portalmedico.conmebol.com/'+ full.examen_laboratorio_adjunto +'" target="_blank" title="Adjunto" type="button" class="btn btn-warning btn-icon btn-circle"><i class="fa fa-image"></i></a>';
						}

						if (full.tipo_estado_codigo == 208 && full.examen_bandera != 'S' && (_codRts == 'S' || full.equipo_codigo == 74168)) {
							btnNEW  = '<button onclick="setExamenCovid('+ full.examen_codigo +', 6);" title="Nuevo Test" type="button" class="btn btn-info btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-edit"></i></button>';
						}

                        return (btnUPD + '&nbsp;' + btnIMG + '&nbsp;' + btnNEW + '&nbsp;' + btnDSP);
                    }
                },
                { data				: 'auditoria_usuario', name : 'auditoria_usuario'},
                { data				: 'auditoria_fecha_hora', name : 'auditoria_fecha_hora'},
                { data				: 'auditoria_ip', name : 'auditoria_ip'},
            ],
			createdRow : function( row, data, dataIndex ) {
				if (data['examen_laboratorio_resultado'] == 'SI' ) {        
					$(row).addClass('bg-danger text-white');
				}
			}
        }
    );

    $('.form-group').change(function() {
        var xDATA       = getExamenPrueba(174, _codEncu, _codEqui);
        tableData.clear().rows.add(xDATA).draw();
    });
});

function setExamenCovid(codElem, codAcc){
	var xJSON       = getExamenPrueba(174, _codEncu, _codEqui);
	var xJSON1		= getDominio('EXAMENMEDICOCOVID19SEROLOGIA');
	var xJSON2		= getExamenPrueba(174, _codEncu, _codEqui);
	var html        = '';
	var bodyCol     = '';
	var bodyTit     = '';
	var bodyMod     = '';
	var bodyOnl     = '';
	var bodyBot     = '';
	var selTest		= '';
	var selTest1	= '';
	var indTest		= 0;
	var indTest1	= 0;
	

	switch (codAcc) {
		case 1:
			bodyTit = 'NUEVO';
			bodyCol = '#163562;';
			bodyMod = 'C';
			bodyOnl = '';
			bodyBot = '           <button type="submit" class="btn btn-info">Agregar</button>';
			break;

		case 2:
			bodyTit = 'VER';
			bodyCol = '#6929d5;';
			bodyMod = 'R';
			bodyOnl = 'readonly';
			bodyBot = '';
			break;

		case 3:
			bodyTit = 'RESULTADO DEL LABORATORIO';
			bodyCol = '#007979;';
			bodyMod = 'U';
			bodyOnl = '';
			bodyBot = '           <button type="submit" id="submit" name="submit" class="btn btn-success">Actualizar</button>';
			break;

		case 4:
			bodyTit = 'ELIMINAR';
			bodyCol = '#ff2924;';
			bodyMod = 'D';
			bodyOnl = 'readonly';
			bodyBot = '           <button type="submit" class="btn btn-danger">Eliminar</button>';
			break;
	
		case 5:
			bodyTit = 'AUDITORIA';
			bodyCol = '#d38109;';
			bodyMod = 'A';
			bodyOnl = 'readonly';
			bodyBot = '';
			break;

		case 6:
			bodyTit = 'RE CONTROL DE TEST';
			bodyCol = '#163562;';
			bodyMod = 'C';
			bodyOnl = '';
			bodyBot = '           <button type="submit" class="btn btn-info">Agregar</button>';
			break;

		default:
			break;
	}

	switch (codAcc) {
		case 2:
			
			xJSON1.forEach(element1 => {
				if (element1.tipo_estado_codigo == 'A'){
					
					selTest1 = selTest1 +
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<input id="var09_'+ indTest1 +'" name="var09_'+ indTest1 +'" value="'+ element1.tipo_codigo +'" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
						'						<label for="var10_'+ indTest1 +'"> TEST  '+ element1.tipo_nombre_castellano +'</label>'+
						'						<select id="var10_'+ indTest1 +'" name="var10_'+ indTest1 +'" onchange="inputValid(this.id, var11_'+ indTest1 +');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
						'							<optgroup label="Presento">'+
						'								<option value="NO">NO</option>'+
						'								<option value="SI">SI</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+
						''+
						'				<div class="col-sm-12 col-md-8">'+
						'					<div class="form-group">'+
						'						<label for="var11_'+ indTest1 +'">Comentario</label>'+
						'						<input id="var11_'+ indTest1 +'" name="var11_'+ indTest1 +'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>'+
						'					</div>'+
						'				</div>'+
						'';
					
					indTest1 = indTest1 + 1;
				}
			});

			xJSON2.forEach(element => {
				if (element.examen_codigo == codElem) {
					html = 
						'<div class="modal-content">'+
						'   <form id="form" data-parsley-validate method="post" enctype="multipart/form-data" action="">'+
						'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
						'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
						'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
						'	    </div>'+
						''+
						'	    <div class="modal-body" >'+
						'           <div class="form-group">'+
						'               <input class="form-control" type="hidden" id="workCodigo"		name="workCodigo"		value="0" required readonly>'+
						'               <input class="form-control" type="hidden" id="workModo"			name="workModo"			value="'+ bodyMod +'" 														required readonly>'+
						'               <input class="form-control" type="hidden" id="workPage"			name="workPage"			value="covid19.php?competicion='+ _codComp +'&encuentro='+ _codEncu +'&" 	required readonly>'+
						'               <input class="form-control" type="hidden" id="workTest"			name="workTest"			value="'+ indTest1 +'" 														required readonly>'+
						'               <input class="form-control" type="hidden" id="workCompeticion"	name="workCompeticion"	value="'+ element.competicion_codigo +'" 									required readonly>'+
						'               <input class="form-control" type="hidden" id="workEncuentro"	name="workEncuentro"	value="'+ element.encuentro_codigo +'" 										required readonly>'+
						'               <input class="form-control" type="hidden" id="workEquipo"		name="workEquipo"		value="'+ element.equipo_codigo +'" 										required readonly>'+
						'               <input class="form-control" type="hidden" id="workAntExamen"	name="workAntExamen"	value="'+ element.examen_codigo +'"											required readonly>'+
						'               <input class="form-control" type="hidden" id="workEstado"		name="workEstado"		value="207" 																required readonly>'+
						'               <input class="form-control" type="hidden" id="workTipo"			name="workTipo"			value="174" 																required readonly>'+
						'           </div>'+
						''+
						'           <div class="row">'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var01">Persona</label>'+
						'                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;" readonly>'+
						'                       	<option value="'+ element.persona_codigo +'" selected>'+ element.persona_nombre + '</option>'+ 
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var02">Posición / Cargo</label>'+
						'                       <input id="var02" name="var02" value="'+ element.examen_persona_posicion +'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var03">Camiseta Nro.</label>'+
						'                       <input id="var03" name="var03" value="'+ element.examen_persona_camiseta +'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var04">Fecha realización de test</label>'+
						'                       <input id="var04" name="var04" value="'+element.examen_fecha_2+'"class="form-control" type="date" style="text-transform:uppercase; height:40px;" required readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var05">Laboratorio de test</label>'+
						'                       <input id="var05" name="var05" value="'+element.examen_laboratorio_nombre+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                   </div>'+
						'               </div>'+
						''+
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<label for="var06">Personas adultas</label>'+
						'						<select id="var06" name="var06" class="select2 form-control custom-select" style="width:100%; height:40px;" required readonly>'+
						'							<optgroup label="Cantidad">'+
						'								<option value="0">Vive solo</option>'+
						'								<option value="1">1 Persona</option>'+
						'								<option value="2">2 Persona</option>'+
						'								<option value="3">3 Persona</option>'+
						'								<option value="4">4 Persona</option>'+
						'								<option value="5">5 Persona</option>'+
						'								<option value="6">6 Persona</option>'+
						'								<option value="7">7 Persona</option>'+
						'								<option value="8">8 Persona</option>'+
						'								<option value="9">9 Persona</option>'+
						'								<option value="10">10 Persona</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+
						''+
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<label for="var07">Personas menores</label>'+
						'						<select id="var07" name="var07" class="select2 form-control custom-select" style="width:100%; height:40px;" required readonly>'+
						'							<optgroup label="Cantidad">'+
						'								<option value="0">Vive solo</option>'+
						'								<option value="1">1 Persona</option>'+
						'								<option value="2">2 Persona</option>'+
						'								<option value="3">3 Persona</option>'+
						'								<option value="4">4 Persona</option>'+
						'								<option value="5">5 Persona</option>'+
						'								<option value="6">6 Persona</option>'+
						'								<option value="7">7 Persona</option>'+
						'								<option value="8">8 Persona</option>'+
						'								<option value="9">9 Persona</option>'+
						'								<option value="10">10 Persona</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+
						''+
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<label for="var08">Convocado</label>'+
						'						<select id="var08" name="var08" class="select2 form-control custom-select" style="width:100%; height:40px;" required readonly>'+
						'							<optgroup label="Convocado">'+
						'								<option value="NO">NO</option>'+
						'								<option value="SI">SI</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+ selTest1 +
						''+
						'	    <div class="modal-footer">'+ bodyBot +
						'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
						'	    </div>'+
						'   </form>'+
						'</div>';
				}
			});
			break;

		case 3:
			xJSON.forEach(element => {
				if (element.examen_codigo == codElem) {
					html = 
						'<div class="modal-content">'+
						'   <form id="form" data-parsley-validate method="post" enctype="multipart/form-data" action="../class/crud/covid19_estado_crud.php">'+
						'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
						'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
						'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
						'	    </div>'+
						''+
						'	    <div class="modal-body" >'+
						'           <div class="form-group">'+
						'               <input class="form-control" type="hidden" id="workCodigo"	name="workCodigo"	value="'+ codElem +'" required readonly>'+
						'               <input class="form-control" type="hidden" id="workModo"		name="workModo"		value="'+ bodyMod +'" required readonly>'+
						'               <input class="form-control" type="hidden" id="workPage"		name="workPage"		value="covid19.php?competicion='+ _codComp +'&encuentro='+ _codEncu +'&" required readonly>'+
						'               <input class="form-control" type="hidden" id="workEstado"	name="workEstado"	value="208" required readonly>'+
						'           </div>'+
						''+
						'           <div class="row pt-3">'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var100">Recepción del test</label>'+
						'                       <input id="var100" name="var100" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Recepción del test" required>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var101">Resultado del test</label>'+
						'                       <select id="var101" name="var101" class="select2 form-control custom-select" onchange="inputSelect(this.id, var103); inputSelect(this.id, var104); inputValid(this.id, var105);" style="width:100%; height:40px;" required>'+
						'                           <optgroup label="Resultado">'+
						'                               <option value="NO" selected>NEGATIVO</option>'+
						'                               <option value="SI">POSITIVO</option>'+
						'                           </optgroup>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var102">Adjuntar resultado</label>'+
						'                       <input id="var102" name="var102" class="form-control" type="file" style="text-transform:uppercase; height:40px;" placeholder="Resultado" required>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-3">'+
						'                   <div class="form-group">'+
						'                       <label for="var103">Ingresa a cuarentena?</label>'+
						'                       <select id="var103" name="var103" class="select2 form-control custom-select" style="width:100%; height:40px;" disabled>'+
						'                           <optgroup label="Estado">'+
						'                               <option value="NO" selected>NO</option>'+
						'                               <option value="SI">SI</option>'+
						'                           </optgroup>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-3">'+
						'                   <div class="form-group">'+
						'                       <label for="var104">Nuevo test?</label>'+
						'                       <select id="var104" name="var104" class="select2 form-control custom-select" style="width:100%; height:40px;" disabled>'+
						'                           <optgroup label="Estado">'+
						'                               <option value="NO" selected>NO</option>'+
						'                               <option value="SI">SI</option>'+
						'                           </optgroup>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-3">'+
						'                   <div class="form-group">'+
						'                       <label for="var105">Inicio de aislamiento</label>'+
						'                       <input id="var105" name="var105" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Inicio de aislamiento" readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-3">'+
						'                   <div class="form-group">'+
						'                       <label for="var106">Fin de aislamiento</label>'+
						'                       <input id="var106" name="var106" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Fin de aislamiento" readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12">'+
						'                   <div class="form-group">'+
						'                       <label for="var107">Comentario</label>'+
						'                       <textarea id="var107" name="var107" class="form-control" rows="5" style="text-transform:uppercase;"></textarea>'+
						'                   </div>'+
						'               </div>'+
						'           </div>'+
						'	    </div>'+
						''+
						'	    <div class="modal-footer">'+ bodyBot +
						'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
						'	    </div>'+
						'   </form>'+
						'</div>';
				}
			});
			break;
	
		case 6:
			xJSON1.forEach(element1 => {
				if (element1.tipo_estado_codigo == 'A'){
					selTest = selTest +
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<input id="var2091_'+ indTest +'" name="var2091_'+ indTest +'" value="'+ element1.tipo_codigo +'" class="form-control" type="hidden" placeholder="Modo" required readonly>'+
						'						<label for="var2092_'+ indTest +'"> TEST  '+ element1.tipo_nombre_castellano +'</label>'+
						'						<select id="var2092_'+ indTest +'" name="var2092_'+ indTest +'" onchange="inputValid(this.id, var2093_'+ indTest +');" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
						'							<optgroup label="Presento">'+
						'								<option value="NO">NO</option>'+
						'								<option value="SI">SI</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+
						''+
						'				<div class="col-sm-12 col-md-8">'+
						'					<div class="form-group">'+
						'						<label for="var2093_'+ indTest +'">Comentario</label>'+
						'						<input id="var2093_'+ indTest +'" name="var2093_'+ indTest +'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" readonly>'+
						'					</div>'+
						'				</div>'+
						'';
					
					indTest = indTest + 1;
				}
			});

			xJSON.forEach(element => {
				if (element.examen_codigo == codElem) {
					html = 
						'<div class="modal-content">'+
						'   <form id="form" data-parsley-validate method="post" enctype="multipart/form-data" action="../class/crud/covid19_nuevo_crud.php">'+
						'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
						'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
						'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
						'	    </div>'+
						''+
						'	    <div class="modal-body" >'+
						'           <div class="form-group">'+
						'               <input class="form-control" type="hidden" id="workCodigo"		name="workCodigo"		value="0" required readonly>'+
						'               <input class="form-control" type="hidden" id="workModo"			name="workModo"			value="'+ bodyMod +'" 														required readonly>'+
						'               <input class="form-control" type="hidden" id="workPage"			name="workPage"			value="covid19.php?competicion='+ _codComp +'&encuentro='+ _codEncu +'&" 	required readonly>'+
						'               <input class="form-control" type="hidden" id="workTest"			name="workTest"			value="'+ indTest +'" 														required readonly>'+
						'               <input class="form-control" type="hidden" id="workCompeticion"	name="workCompeticion"	value="'+ element.competicion_codigo +'" 									required readonly>'+
						'               <input class="form-control" type="hidden" id="workEncuentro"	name="workEncuentro"	value="'+ element.encuentro_codigo +'" 										required readonly>'+
						'               <input class="form-control" type="hidden" id="workEquipo"		name="workEquipo"		value="'+ element.equipo_codigo +'" 										required readonly>'+
						'               <input class="form-control" type="hidden" id="workAntExamen"	name="workAntExamen"	value="'+ element.examen_codigo +'"											required readonly>'+
						'               <input class="form-control" type="hidden" id="workEstado"		name="workEstado"		value="207" 																required readonly>'+
						'               <input class="form-control" type="hidden" id="workTipo"			name="workTipo"			value="174" 																required readonly>'+
						'           </div>'+
						''+
						'           <div class="row">'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var200">Persona</label>'+
						'                       <select id="var200" name="var200" class="select2 form-control custom-select" style="width:100%; height:40px;">'+
						'                       	<option value="'+ element.persona_codigo +'" selected>'+ element.persona_nombre +'</option>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var201">Posición / Cargo</label>'+
						'                       <input id="var201" name="var201" value="'+ element.examen_persona_posicion +'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var202">Camiseta Nro.</label>'+
						'                       <input id="var202" name="var202" value="'+ element.examen_persona_camiseta +'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required readonly>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var203">Fecha realización de test</label>'+
						'                       <input id="var203" name="var203" class="form-control" type="date" style="text-transform:uppercase; height:40px;" required>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var204">Laboratorio de test</label>'+
						'                       <input id="var204" name="var204" class="form-control" type="text" style="text-transform:uppercase; height:40px;" required>'+
						'                   </div>'+
						'               </div>'+
						''+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                   </div>'+
						'               </div>'+
						''+
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<label for="var206">Personas adultas</label>'+
						'						<select id="var206" name="var206" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
						'							<optgroup label="Cantidad">'+
						'								<option value="0">Vive solo</option>'+
						'								<option value="1">1 Persona</option>'+
						'								<option value="2">2 Persona</option>'+
						'								<option value="3">3 Persona</option>'+
						'								<option value="4">4 Persona</option>'+
						'								<option value="5">5 Persona</option>'+
						'								<option value="6">6 Persona</option>'+
						'								<option value="7">7 Persona</option>'+
						'								<option value="8">8 Persona</option>'+
						'								<option value="9">9 Persona</option>'+
						'								<option value="10">10 Persona</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+
						''+
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<label for="var207">Personas menores</label>'+
						'						<select id="var207" name="var207" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
						'							<optgroup label="Cantidad">'+
						'								<option value="0">Vive solo</option>'+
						'								<option value="1">1 Persona</option>'+
						'								<option value="2">2 Persona</option>'+
						'								<option value="3">3 Persona</option>'+
						'								<option value="4">4 Persona</option>'+
						'								<option value="5">5 Persona</option>'+
						'								<option value="6">6 Persona</option>'+
						'								<option value="7">7 Persona</option>'+
						'								<option value="8">8 Persona</option>'+
						'								<option value="9">9 Persona</option>'+
						'								<option value="10">10 Persona</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+
						''+
						'				<div class="col-sm-12 col-md-4">'+
						'					<div class="form-group">'+
						'						<label for="var208">Convocado</label>'+
						'						<select id="var208" name="var208" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
						'							<optgroup label="Convocado">'+
						'								<option value="NO">NO</option>'+
						'								<option value="SI">SI</option>'+
						'							</optgroup>'+
						'						</select>'+
						'					</div>'+
						'				</div>'+ selTest +
						'           </div>'+
						'	    </div>'+
						''+
						'	    <div class="modal-footer">'+ bodyBot +
						'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
						'	    </div>'+
						'   </form>'+
						'</div>';
				}
			});
			break;

		default:
			break;
	}

	$("#modalcontent").empty();
	$("#modalcontent").append(html);
}