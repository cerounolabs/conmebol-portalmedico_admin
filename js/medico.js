$(document).ready(function() {
	var codigo	= document.getElementById('tableLoadDMed').className;
	var xJSON 	= getMedico(1, codigo);
	var xJSON1	= getCompMedico(0);
	var col03	= true;

	switch (codigo) {
		case '10':
			col03 = true;
			break;
	
		case '157':
			col03 = false;
			break;
	}

	$('#tableLoadCMed').DataTable({
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
			{ render			: function (data, type, full, meta) {return '<img src="../' + full.persona_path + '" height="50" />';}},
			{ render			: function (data, type, full, meta) {
				return '<button id="' + full.persona_codigo + '" value="' + full.persona_nombre + '" role="button" class="btn btn-primary" title="Competencia"><i class="ti-eye"></i>&nbsp;</button>';
			}},
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

	var tableData   = $('#tableLoadCComp').DataTable({
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
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] }
		],
		columns		: [
			{ data				: 'persona_codigo', name : 'persona_codigo'},
			{ render			: function (data, type, full, meta) {return '<img src="../' + full.competicion_imagen_path + '" height="50" />';}},
			{ data				: 'competicion_disciplina', name : 'competicion_disciplina'},
			{ data				: 'competicion_genero', name : 'competicion_genero'},
			{ data				: 'competicion_nombre', name : 'competicion_nombre'},
			{ data				: 'competicion_persona_observacion', name : 'competicion_persona_observacion'},
			{ data				: 'auditoria_usuario', name : 'auditoria_usuario'},
			{ data				: 'auditoria_fecha_hora', name : 'auditoria_fecha_hora'},
			{ data				: 'auditoria_ip', name : 'auditoria_ip'},
		]
	});

	$('button').click(function() {
		var xPers	= $(this).attr('id');
		var nPers	= $(this).attr('value');
		var xJSON1	= getCompMedico(xPers);
		localStorage.removeItem('persona_codigo');
		localStorage.removeItem('persona_nombre');
		localStorage.setItem('persona_codigo', xPers);
		localStorage.setItem('persona_nombre', nPers);
		tableData.clear().rows.add(xJSON1).draw();
	});
});