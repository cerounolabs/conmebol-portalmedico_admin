$(document).ready(function() {
	var codigo		= document.getElementById('tableCodigo').className;	
	var urlDominio	= 'http://api.conmebol.com/portalmedico/public/v1/100/dominio/'+codigo;
	
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
			{ targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
			{ targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
			{ targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
			{ targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
			{ targets			: [10],	visible : false,searchable : false,	orderData : [10, 0]},
			{ targets			: [11],	visible : false,searchable : false,	orderData : [11, 0]},
			{ targets			: [12],	visible : false,searchable : false,	orderData : [12, 0]},
			{ targets			: [13],	visible : false,searchable : false,	orderData : [13, 0]},
			{ targets			: [14],	visible : true,	searchable : true,	orderData : [14, 0]}
		],
		columns		: [
			{ data				: 'tipo_sub_codigo', name : 'tipo_sub_codigo'},
			{ data				: 'tipo_sub_orden', name : 'tipo_sub_orden'},
			{ data				: 'tipo_sub_estado_nombre', name : 'tipo_sub_estado_nombre'},
			{ data				: 'tipo_nombre_ingles', name : 'tipo_nombre_ingles'},
			{ data				: 'tipo_nombre_castellano', name : 'tipo_nombre_castellano'},
			{ data				: 'tipo_nombre_portugues', name : 'tipo_nombre_portugues'},
			{ data				: 'tipo_sub_nombre_ingles', name : 'tipo_sub_nombre_ingles'},
			{ data				: 'tipo_sub_nombre_castellano', name : 'tipo_sub_nombre_castellano'},
			{ data				: 'tipo_sub_nombre_portugues', name : 'tipo_sub_nombre_portugues'},
			{ data				: 'tipo_sub_dominio', name : 'tipo_sub_dominio'},
			{ data				: 'tipo_sub_observacion', name : 'tipo_sub_observacion'},
			{ data				: 'tipo_sub_usuario', name : 'tipo_sub_usuario'},
			{ data				: 'tipo_sub_fecha_hora', name : 'tipo_sub_fecha_hora'},
			{ data				: 'tipo_sub_ip', name : 'tipo_sub_ip'},
			{ render			: function (data, type, full, meta) {return '<a href="../public/subdominio_crud.php?dominio='+ full.tipo_sub_dominio +'&mode=R&codigo=' + full.tipo_sub_codigo + '" role="button" class="btn btn-primary"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="../public/subdominio_crud.php?dominio='+ full.tipo_sub_dominio +'&mode=U&codigo=' + full.tipo_sub_codigo + '" role="button" class="btn btn-success"><i class="ti-pencil"></i>&nbsp;</a></a>&nbsp;<a href="../public/subdominio_crud.php?dominio='+ full.tipo_sub_dominio +'&mode=D&codigo=' + full.tipo_sub_codigo + '" role="button" class="btn btn-danger"><i class="ti-trash"></i>&nbsp;</a>';}},
		]
	});
});