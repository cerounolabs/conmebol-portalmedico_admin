$(document).ready(function() {
	var xJSON = getLesion();
	
	var tableData   = $('#tableLoad').DataTable({
		processing	: true,
		destroy		: true,
		searching	: true,
		paging		: true,
		lengthChange: true,
		info		: true,
		order: [[ 1, "desc" ]],
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
			{ targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
			{ targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
			{ targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
			{ targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
			{ targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
			{ targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
			{ targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
			{ targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
			{ targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
			{ targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] }
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
			{ data				: 'lesion_fecha_retorno', name : 'lesion_fecha_retorno'},
			{ render			: function (data, type, full, meta) {
				return '<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-warning" title="Retorno" data-toggle="modal" data-target="#modaldiv" onclick="setRetorno(this.id, ' + full.tipo_estado_codigo + ');"><i class="ti-back-right"></i>&nbsp;</a>&nbsp;<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-success" title="Finalizar" data-toggle="modal" data-target="#modaldiv" onclick="setFinalizar(this.id, ' + full.tipo_estado_codigo + ');"><i class="ti-lock"></i>&nbsp;</a>&nbsp;<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-primary" title="Ver" data-toggle="modal" data-target="#modaldiv" onclick="getVisualizar(this.id);"><i class="ti-eye"></i>&nbsp;</a>&nbsp;<a href="javascript:void(0)" id="' + full.lesion_codigo + '" value="' + full.lesion_codigo + '" role="button" class="btn btn-danger" title="Anular" data-toggle="modal" data-target="#modaldiv" onclick="setAnular(this.id, ' + full.tipo_estado_codigo + ');"><i class="ti-trash"></i>&nbsp;</a>';
			}},
		]
	});

	$('.form-group').change(function() {
		var xDATA = getLesion();
		tableData.clear().rows.add(xDATA).draw();
	});
});