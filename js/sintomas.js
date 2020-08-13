$(document).ready(function() {
    var xDATA       = getExamenPrueba(206, _codEncu, _codEqui);
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
                { targets			: [5],	visible : false,searchable : false,	orderData : [5, 0] },
                { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                { targets			: [7],	visible : false,searchable : false,	orderData : [7, 0] },
                { targets			: [8],	visible : false,searchable : false,	orderData : [8, 0] },
                { targets			: [9],	visible : false,searchable : false,	orderData : [9, 0] },
                { targets			: [10],	visible : true, searchable : true,	orderData : [10, 0] }
            ],
            columns		: [
                { data				: 'examen_codigo', name : 'examen_codigo'},
                { data				: 'tipo_estado_nombre_castellano', name : 'tipo_estado_nombre_castellano'},
                { data				: 'examen_fecha_1', name : 'examen_fecha_1'},
                { data				: 'competicion_nombre', name : 'competicion_nombre'},
                { data				: 'encuentro_nombre', name : 'encuentro_nombre'},
                { data				: 'equipo_nombre', name : 'equipo_nombre'},
                { data				: 'jugador_nombre', name : 'jugador_nombre'},
                { data				: 'auditoria_usuario', name : 'auditoria_usuario'},
                { data				: 'auditoria_fecha_hora', name : 'auditoria_fecha_hora'},
                { data				: 'auditoria_ip', name : 'auditoria_ip'},
                { render            : 
                    function (data, type, full, meta) {
                        var btnDSP  = '<button onclick="" title="Ver" type="button" class="btn btn-primary btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-eye"></i></button>';
                        var btnUPD  = '<button onclick="" title="Editar" type="button" class="btn btn-success btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-edit"></i></button>';
                        var btnDLT  = '<button onclick="" title="Eliminar" type="button" class="btn btn-danger btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-eraser"></i></button>';
                        var btnAUD  = '<button onclick="" title="Auditoria" type="button" class="btn btn-warning btn-icon btn-circle" data-toggle="modal" data-target="#modaldiv"><i class="fa fa-user-secret"></i></button>';
                        return (btnDSP + '&nbsp;' + btnUPD + '&nbsp;' + btnAUD);
                    }
                },
            ]
        }
    );

    $('.form-group').change(function() {
        var xDATA       = getExamenPrueba(206, _codEncu, _codEqui);
        tableData.clear().rows.add(xDATA).draw();
    });
});
