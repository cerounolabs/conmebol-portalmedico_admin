$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'http://api.conmebol.com/portalmedico/public/v1/000/dominio/'+codigo;
	
	$('#tableLoad').DataTable({
		processing	: true,
		destroy		: true,
		searching	: true,
		paging		: true,
		lengthChange: true,
		info		: true,
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
			{ targets			: [6],	visible : false,searchable : false,	orderData : [6, 0] },
			{ targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
			{ targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : false,searchable : false,	orderData : [10, 0]},
			{ targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0]}
		],
		columns		: [
			{ data				: 'tipo_codigo', name : 'tipo_codigo'},
			{ data				: 'tipo_orden', name : 'tipo_orden'},
			{ data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
			{ data				: 'tipo_nombre_ingles', name : 'tipo_nombre_ingles'},
			{ data				: 'tipo_nombre_castellano', name : 'tipo_nombre_castellano'},
			{ data				: 'tipo_nombre_portugues', name : 'tipo_nombre_portugues'},
			{ data				: 'tipo_dominio', name : 'tipo_dominio'},
			{ data				: 'tipo_observacion', name : 'tipo_observacion'},
			{ data				: 'tipo_usuario', name : 'tipo_usuario'},
			{ data				: 'tipo_fecha_hora', name : 'tipo_fecha_hora'},
			{ data				: 'tipo_ip', name : 'tipo_ip'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/dominio_crud.php?dominio='+ full.tipo_dominio +'&mode=R&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/dominio_crud.php?dominio='+ full.tipo_dominio +'&mode=U&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/dominio_crud.php?dominio='+ full.tipo_dominio +'&mode=D&codigo=' + full.tipo_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});