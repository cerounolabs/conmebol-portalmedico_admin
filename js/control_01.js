$(document).ready(function() {
    var codigo	    = document.getElementById('tableCodigo').className;
    var xDATA       = getControl01(codigo);
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
                { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                { targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
                { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
                { targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] }
            ],
            columns		: [
                { data				: 'covid19_codigo', name : 'covid19_codigo'},
                { data				: 'covid19_fecha', name : 'covid19_fecha'},
                { data				: 'tipo_estado_nombre', name : 'tipo_estado_nombre'},
                { data				: 'disciplina_codigo', name : 'disciplina_codigo'},
                { data				: 'competicion_nombre', name : 'competicion_nombre'},
                { data				: 'juego_nombre', name : 'juego_nombre'},
                { data				: 'equipo_nombre', name : 'equipo_nombre'},
                { data				: 'jugador_nombre', name : 'jugador_nombre'},
                { data				: 'auditoria_usuario', name : 'auditoria_usuario'},
                { data				: 'auditoria_fecha_hora', name : 'auditoria_fecha_hora'},
            ]
        }
    );

    $('.form-group').change(function() {
        var xDATA = getControl01();
        tableData.clear().rows.add(xDATA).draw();
    });
});

