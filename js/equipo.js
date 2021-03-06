$(document).ready(function() {
	var xJSON = JSON.parse(localStorage.getItem('equipoJSON'))['data'];

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
		data		: xJSON,
		columnDefs	: [
			{ targets			: [0],	visible : true,	searchable : true,	orderData : [0, 0] },
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
			{ targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] },
			{ targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0] },
			{ targets			: [12],	visible : true,	searchable : true,	orderData : [12, 0] },
			{ targets			: [13],	visible : false,searchable : false,	orderData : [13, 0] }
		],
		columns		: [
			{ data				: 'equipo_codigo', name : 'equipo_codigo'},
			{ data				: 'equipo_estado', name : 'equipo_estado'},
			{ data				: 'equipo_naturaleza', name : 'equipo_naturaleza'},
			{ data				: 'equipo_nombre', name : 'equipo_nombre'},
			{ data				: 'equipo_nombre_corto', name : 'equipo_nombre_corto'},
			{ data				: 'equipo_pais', name : 'equipo_pais'},
			{ data				: 'equipo_region', name : 'equipo_region'},
			{ data				: 'equipo_ciudad', name : 'equipo_ciudad'},
			{ data				: 'equipo_postal_codigo', name : 'equipo_postal_codigo'},
			{ data				: 'organizacion_codigo', name : 'organizacion_codigo'},
			{ data				: 'organizacion_nombre', name : 'organizacion_nombre'},
			{ data				: 'organizacion_nombre_corto', name : 'organizacion_nombre_corto'},
			{ render			: function (data, type, full, meta) {return '<img src="../' + full.organizacion_imagen_path + '" height="50" />';}},
			{ data				: 'equipo_ultima_actualizacion', name : 'equipo_ultima_actualizacion'},
		]
	});
});