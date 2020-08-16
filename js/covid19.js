$(document).ready(function() {
    var xDATA       = getExamenPrueba(174, _codEncu, _codEqui, _codPers);
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
                { targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
                { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                { targets			: [3],	visible : false,searchable : false,	orderData : [3, 0] },
                { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                { targets			: [5],	visible : false,searchable : false,	orderData : [5, 0] },
                { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                { targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
                { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
				{ targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
				{ targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] },
                { targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0] },
                { targets			: [12],	visible : false,searchable : false,	orderData : [12, 0] },
                { targets			: [13],	visible : false,searchable : false,	orderData : [13, 0] },
                { targets			: [14],	visible : false,searchable : false,	orderData : [14, 0] }
            ],
            columns		: [
                { data				: 'examen_codigo', name : 'examen_codigo'},
                { data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
                { data				: 'examen_fecha_1', name : 'examen_fecha_1'},
                { data				: 'competicion_nombre', name : 'competicion_nombre'},
                { data				: 'encuentro_nombre', name : 'encuentro_nombre'},
                { data				: 'equipo_nombre', name : 'equipo_nombre'},
                { data				: 'persona_nombre', name : 'persona_nombre'},
                { data				: 'examen_laboratorio_nombre', name : 'examen_laboratorio_nombre'},
                { data				: 'examen_laboratorio_fecha_envio', name : 'examen_laboratorio_fecha_envio'},
				{ data				: 'examen_laboratorio_fecha_recepcion', name : 'examen_laboratorio_fecha_recepcion'},
				{ data				: 'examen_laboratorio_test', name : 'examen_laboratorio_test'},
				{ render            : 
                    function (data, type, full, meta) {
                        var btnUPD  = '<button onclick="setExamenCovid('+ full.examen_codigo +', 3);" title="Laboratorio" type="button" class="btn btn-success btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-edit"></i></button>';
                        return (btnUPD + '&nbsp;');
                    }
                },
                { data				: 'auditoria_usuario', name : 'auditoria_usuario'},
                { data				: 'auditoria_fecha_hora', name : 'auditoria_fecha_hora'},
                { data				: 'auditoria_ip', name : 'auditoria_ip'},
            ]
        }
    );

    $('.form-group').change(function() {
        var xDATA       = getExamenPrueba(174, _codEncu, _codEqui, _codPers);
        tableData.clear().rows.add(xDATA).draw();
    });
});

function setExamenCovid(codElem, codAcc){
	var codDom		= document.getElementById('tableCodigo').className;
	var xJSON       = getExamenPrueba(174, _codEncu, _codEqui, _codPers);
	var aJSON       = getExamenPrueba(174, _codEncu, _codEqui, _codPers)
	var html        = '';
	var bodyCol     = '';
	var bodyTit     = '';
	var bodyMod     = '';
	var bodyOnl     = '';
	var bodyBot     = '';
	var selEstado   = '';
	var rowDominio	= '';

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
			bodyBot = '           <button type="submit" class="btn btn-success">Actualizar</button>';
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

		default:
			break;
	}

	switch (codAcc) {
		case 3:
			xJSON.forEach(element => {
				if (element.examen_codigo == codElem) {
					html = 
						'<div class="modal-content">'+
						'   <form id="form" data-parsley-validate method="post" action="">'+
						'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
						'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
						'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
						'	    </div>'+
						'	    <div class="modal-body" >'+
						'           <div class="form-group">'+
						'               <input id="workCodigo" name="workCodigo" value="'+ element.examen_codigo +'" class="form-control" type="hidden" required readonly>'+
						'               <input id="workModo" name="workModo" value="'+ bodyMod +'" class="form-control" type="hidden" required readonly>'+
						'               <input id="workPage" name="workPage" value="covid19.php?competicion='+ _codComp +'&encuentro='+ _codEncu +'&" class="form-control" type="hidden" required readonly>'+
						'           </div>'+
						'           <div class="row pt-3">'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var01">Recepción del test</label>'+
						'                       <input id="var01" name="var01" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Recepción del test" required>'+
						'                   </div>'+
						'               </div>'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var02">Resultado del test</label>'+
						'                       <select id="var02" name="var02" class="select2 form-control custom-select" onchange="inputSelect(this.id, var04); inputSelect(this.id, var05); inputValid(this.id, var06);" style="width:100%; height:40px;">'+
						'                           <optgroup label="Resultado">'+
						'                               <option value="NO">NEGATIVO</option>'+
						'                               <option value="SI">POSITIVO</option>'+
						'                           </optgroup>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var03">Adjuntar resultado</label>'+
						'                       <input id="var03" name="var03" class="form-control" type="file" style="text-transform:uppercase; height:40px;" placeholder="Resultado">'+
						'                   </div>'+
						'               </div>'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var04">Ingresa a cuarentena?</label>'+
						'                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;" disabled>'+
						'                           <optgroup label="Estado">'+
						'                               <option value="NO">NO</option>'+
						'                               <option value="SI">SI</option>'+
						'                           </optgroup>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var05">Nuevo test?</label>'+
						'                       <select id="var05" name="var05" class="select2 form-control custom-select" style="width:100%; height:40px;" disabled>'+
						'                           <optgroup label="Estado">'+
						'                               <option value="NO">NO</option>'+
						'                               <option value="SI">SI</option>'+
						'                           </optgroup>'+
						'                       </select>'+
						'                   </div>'+
						'               </div>'+
						'               <div class="col-sm-12 col-md-4">'+
						'                   <div class="form-group">'+
						'                       <label for="var06">Inicio de aislamiento</label>'+
						'                       <input id="var06" name="var06" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="Inicio de aislamiento" readonly>'+
						'                   </div>'+
						'               </div>'+
						'               <div class="col-sm-12">'+
						'                   <div class="form-group">'+
						'                       <label for="var07">Comentario</label>'+
						'                       <textarea id="var07" name="var07" class="form-control" rows="5" style="text-transform:uppercase;"></textarea>'+
						'                   </div>'+
						'               </div>'+
						'           </div>'+
						'	    </div>'+
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