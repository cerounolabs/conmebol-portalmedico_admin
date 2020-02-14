$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'http://api.conmebol.com/portalmedico/public/v1/600/'+codigo;

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
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
			{ targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
			{ targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
			{ targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] }
		],
		columns		: [
			{ data				: 'lesion_codigo', name : 'lesion_codigo'},
			{ data				: 'lesion_fecha_alta', name : 'lesion_fecha_alta'},
			{ data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
			{ data				: 'juego_nombre', name : 'juego_nombre'},
			{ data				: 'jugador_nombre', name : 'jugador_nombre'},
			{ data				: 'tipo_lesion_nombre_castellano', name : 'tipo_lesion_nombre_castellano'},
			{ data				: 'tipo_cuerpo_zona_nombre_castellano', name : 'tipo_cuerpo_zona_nombre_castellano'},
			{ data				: 'tipo_diagnostico_nombre_castellano', name : 'tipo_diagnostico_nombre_castellano'},
			{ data				: 'tipo_diagnostico_recuperacion', name : 'tipo_diagnostico_recuperacion'},
			{ render			: function (data, type, full, meta) {return '<a href="#" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="#" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="#" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});