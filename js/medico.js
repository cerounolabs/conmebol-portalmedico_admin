$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'http://api.conmebol.com/portalmedico/public/v1/400/equipo/'+codigo;

	$('#tableLoad').DataTable({
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
		ajax		: {
			type				: 'GET',
			cache				: false,
			crossDomain			: true,
			crossOrigin			: true,
			contentType			: 'application/json; charset=utf-8',
			dataType			: 'json',
			url				: urlDominio,
			dataSrc				: 'data'
		},
		columnDefs	: [
			{ targets			: [0],	visible : false,searchable : false,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : false,searchable : false,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : false,searchable : false,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
			{ targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
			{ targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
			{ targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
			{ targets			: [10],	visible : false,searchable : false,	orderData : [10, 0] },
			{ targets			: [11],	visible : false,searchable : false,	orderData : [11, 0] },
			{ targets			: [12],	visible : false,searchable : false,	orderData : [12, 0] },
			{ targets			: [13],	visible : false,searchable : false,	orderData : [13, 0] },
			{ targets			: [14],	visible : false,searchable : false,	orderData : [14, 0] }
		],
		columns		: [
			{ data				: 'persona_codigo', name : 'persona_codigo'},
			{ render			: function (data, type, full, meta) {return '<img src="../' + full.persona_path + '" height="50" />';}},
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
});