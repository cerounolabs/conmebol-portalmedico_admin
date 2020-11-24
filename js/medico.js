$(document).ready(function() {
	var xJSON 	= getMedicoUsuario();
	var xJSON1	= getMedicoCompeticion(0, 0);
	var col03	= true;

	var tablePers	= $('#tableLoadCMed').DataTable({
		processing	: true,
		destroy		: true,
		searching	: true,
		paging		: true,
		lengthChange: true,
		info		: true,
		orderCellsTop: false,
		fixedHeader	: false,
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
		data		: xJSON,
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : false,searchable : false,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : col03,searchable : col03,	orderData : [3, 0] },
			{ targets			: [4],	visible : false,searchable : false,	orderData : [4, 0] },
			{ targets			: [5],	visible : false,searchable : false,	orderData : [5, 0] },
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] },
			{ targets			: [11],	visible : false,searchable : false,	orderData : [11, 0] },
			{ targets			: [12],	visible : false,searchable : false,	orderData : [12, 0] },
			{ targets			: [13],	visible : false,searchable : false,	orderData : [13, 0] },
			{ targets			: [14],	visible : false,searchable : false,	orderData : [14, 0] },
			{ targets			: [15],	visible : false,searchable : false,	orderData : [15, 0] }
		],
		columns		: [
			{ data				: 'persona_codigo', name : 'persona_codigo'},
			{ render			: function (data, type, full, meta) {
					return '<img src="http://portalmedico.conmebol.com/' + full.persona_path + '" height="50" />';
				}
			},
			{ render			: function (data, type, full, meta) {
					return '<button id="' + full.persona_codigo + '" value="' + full.persona_nombre + '" role="button" class="btn btn-primary" title="Competicion"><i class="ti-eye"></i>&nbsp;</button>';
				}
			},
			{ data				: 'equipo_nombre', name : 'equipo_nombre'},
			{ data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
			{ data				: 'tipo_acceso_nombre_castellano', name : 'tipo_acceso_nombre_castellano'},
			{ data				: 'tipo_perfil_nombre_castellano', name : 'tipo_perfil_nombre_castellano'},
			{ data				: 'tipo_categoria_nombre_castellano', name : 'tipo_categoria_nombre_castellano'},
			{ data				: 'persona_nombre', name : 'persona_nombre'},
			{ data				: 'persona_user', name : 'persona_user'},
			{ data				: 'persona_email', name : 'persona_email'},
			{ data				: 'persona_telefono', name : 'persona_telefono'},
			{ data				: 'persona_observacion', name : 'persona_observacion'},
			{ data				: 'persona_usuario', name : 'persona_usuario'},
			{ data				: 'persona_fecha_hora', name : 'persona_fecha_hora'},
			{ data				: 'persona_ip', name : 'persona_ip'},
		]
	});

	var tableComp   = $('#tableLoadCComp').DataTable({
		processing	: true,
		destroy		: true,
		searching	: true,
		paging		: true,
		lengthChange: true,
		info		: true,
		orderCellsTop: false,
		fixedHeader	: false,
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
		data		: xJSON1,
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : true, searchable : false,	orderData : [10, 0] },
			{ targets			: [11],	visible : true, searchable : false,	orderData : [11, 0] }

		],
		columns		: [
			{ data				: 'persona_codigo', name : 'persona_codigo'},
			{ render			: function (data, type, full, meta) {
					return '<img src="http://portalmedico.conmebol.com/' + full.competicion_imagen_path + '" height="50" />';
				}
			},
			{ data				: 'competicion_disciplina', name : 'competicion_disciplina'},
			{ data				: 'competicion_genero', name : 'competicion_genero'},
			{ data				: 'competicion_nombre', name : 'competicion_nombre'},
			{ data				: 'competicion_persona_observacion', name : 'competicion_persona_observacion'},
			{ data				: 'auditoria_usuario', name : 'auditoria_usuario'},
			{ data				: 'auditoria_fecha_hora', name : 'auditoria_fecha_hora'},
			{ data				: 'auditoria_ip', name : 'auditoria_ip'},
			{ data				: 'competicion_persona_rts', name : 'competicion_persona_rts'},
			{ render			: 
				function (data, type, full, meta) {
					var btnComp = '';
					if (full.competicion_persona_rts == 'S'){  
						btnComp	= `<input type="checkbox" checked data-on-color="success" data-off-color="info" data-on-text="SI" data-off-text="NO" onchange="setCompetenciaAsignada(${full.competicion_codigo}, ${full.persona_codigo}, ${full.tipo_modulo_parametro}, '${full.competicion_persona_observacion}', 'N');"> <script> $("input[type='checkbox']").bootstrapSwitch(); </script>`;
					} else{
						btnComp	= `<input type="checkbox" data-on-color="success" data-off-color="info"  data-on-text="SI" data-off-text="NO" onchange="setCompetenciaAsignada(${full.competicion_codigo}, ${full.persona_codigo}, ${full.tipo_modulo_parametro}, '${full.competicion_persona_observacion}', 'S');"> <script> $("input[type='checkbox']").bootstrapSwitch();</script>`;
					}
					return (btnComp);
				}
			},
			{ render			: 
				function (data, type, full, meta) {
					var btnDLT	= `<button onclick="setCompetenciaAsignadaDLT(${full.competicion_codigo},${full.persona_codigo},${full.tipo_modulo_parametro}, '${full.competicion_persona_observacion}', '${full.competicion_persona_rts}');" title="Elminar" type="button" class="btn btn-danger btn-icon btn-circle btn-md" data-toggle="modal" data-target="#modal-dialog"><i class="fa fa-eraser"></i></button>`;
					return (btnDLT);
				}
			},
		]
	});

	$('#tableLoadCMed tbody').on('click', 'tr', function(event) {
		var xMod	= document.getElementById('tableLoadDMed').className;
		var xPers	= event.target.id;
		var nPers	= event.target.value;
		var xJSON1	= getMedicoCompeticion(xPers, xMod);

		localStorage.removeItem('persona_codigo');
		localStorage.removeItem('persona_nombre');

		localStorage.setItem('persona_codigo', xPers);
		localStorage.setItem('persona_nombre', nPers);

		tableComp.clear().rows.add(xJSON1).draw();
	});
});

function setCompetenciaPersona(){
	var xMod	= document.getElementById('tableLoadDMed').className;
	var codPers = localStorage.getItem('persona_codigo');
	var nomPers = localStorage.getItem('persona_nombre');
	var xJSON   = getCompetenciaListado();
	var selComp = '';
	var html='';

	xJSON.forEach(element => {
		selComp = selComp + '                               <option value="'+element.competicion_codigo+'">DISCIPLINA: '+ element.competicion_disciplina +' - COMPETICION: '+ element.competicion_nombre + ' - GENERO: ' + element.competicion_genero + ' - PERIODO: ' + element.competicion_anho +'</option>';
	});

		html    = 
			'<div class="modal-content">'+
			'   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_competencia.php">'+
			'	    <div class="modal-header" style="color:#fff; background:#163562;">'+
			'		    <h4 class="modal-title" id="vcenter"> Agregar Competencia </h4>'+
			'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
			'	    </div>'+
			''+
			'	    <div class="modal-body" >'+
			'           <div class="row pt-3">'+
			'               <div class="col-sm-12">'+
			'                   <div class="form-group">'+
			'                       <label for="var01_1">Médico</label>'+
			'                       <input id="var01_1" name="var01_1" class="form-control" type="text" value="'+nomPers+'" style="text-transform:uppercase; height:40px;" required readonly>'+
			'                       </select>'+
			'                    </div>'+
			'                </div>'+
			''+
			'               <div class="col-sm-12">'+
			'                   <div class="form-group">'+
			'                       <label for="var02">Competencia</label>'+
			'                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+selComp+
			'                       </select>'+
			'                    </div>'+
			'                </div>'+
			''+
			'                <div class="col-sm-12">'+
			'                    <div class="form-group">'+
			'                        <label for="var03">Comentario</label>'+
			'                        <textarea id="var03" name="var03" class="form-control" rows="3" style="text-transform:uppercase;"></textarea>'+
			'                    </div>'+
			'                </div>'+
			'           </div>'+
			''+
			'           <div class="form-group">'+
			'               <input type="hidden" class="form-control"	id="var01"			name="var01" 		value="'+codPers+'"						required readonly>'+
			'               <input type="hidden" class="form-control"	id="workModo"		name="workModo" 	value="C"								required readonly>'+
			'               <input type="hidden" class="form-control"	id="workCodigo" 	name="workCodigo" 	value="0"								required readonly>'+
			'               <input type="hidden" class="form-control"	id="workPage"		name="workPage" 	value="medico.php?codigo='+ xMod +'&"	required readonly>'+
			'               <input type="hidden" class="form-control"	id="workModulo"		name="workModulo" 	value="'+ xMod +'"						required readonly>'+
			'           </div>'+
			'	    </div>'+
			''+
			'	    <div class="modal-footer">'+
			'           <button type="submit" class="btn btn-info">Agregar</button>'+
			'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
			'	    </div>'+
			'   </form>'+
			'</div>';

	$("#modalcontent").empty();
	$("#modalcontent").append(html);
}

function setCompetenciaAsignada(codElem, codPer, TipPAr,comObs,codRts ){
	var xPAGE	= _parm04BASE;
	var xURL	= '200/competicion/medico/' + codElem +'/'+ codPer;
	var xPARS   = JSON.stringify({
		'tipo_modulo_codigo': TipPAr,
		'competicion_persona_observacion': comObs,
		'competicion_persona_rts': codRts,
		'auditoria_usuario': _parm01BASE,
		'auditoria_fecha_hora': _parm02BASE,
		'auditoria_ip': _parm03BASE
	});
	
	putJSON(xPAGE, xURL, xPARS);
}

function setCompetenciaAsignadaDLT(codElem, codPer, TipPAr,comObs,codRts ){
	var xPAGE	= _parm04BASE;
	var xURL	= '200/competicion/medico/' + codElem +'/'+ codPer;
	var xPARS   = JSON.stringify({
		'competicion_codigo' : codElem,
		'persona_codigo': codPer,
		'tipo_modulo_codigo': TipPAr,
		'competicion_persona_observacion': comObs,
		'competicion_persona_rts': codRts,
		'auditoria_usuario': _parm01BASE,
		'auditoria_fecha_hora': _parm02BASE,
		'auditoria_ip': _parm03BASE
	});

	delJSON(xPAGE, xURL, xPARS);
}