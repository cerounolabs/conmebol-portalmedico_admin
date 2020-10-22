$(document).ready(function() {
    var codTipo     = document.getElementById('var02').value;
    var codComp     = document.getElementById('var04').value;
    var codEncu     = document.getElementById('var05').value;
    var codEqui     = document.getElementById('var06').value;
    var codEsta     = document.getElementById('var07').value;
    var codCate     = document.getElementById('var08').value;
    var xDATA       = getCompetenciaExamen(codTipo, codComp, codEncu, codEqui, codEsta, codCate);
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
                { targets			: [0],	visible : true, searchable : true,	orderData : [0, 0] },
                { targets			: [1],	visible : true,	searchable : true,	orderData : [1, 0] },
                { targets			: [2],	visible : true,	searchable : true,	orderData : [2, 0] },
                { targets			: [3],	visible : true,	searchable : true,	orderData : [3, 0] },
                { targets			: [4],	visible : true,	searchable : true,	orderData : [4, 0] },
                { targets			: [5],	visible : true,	searchable : true,	orderData : [5, 0] },
                { targets			: [6],	visible : true,	searchable : true,	orderData : [6, 0] },
                { targets			: [7],	visible : true,	searchable : true,	orderData : [7, 0] },
                { targets			: [8],	visible : true,	searchable : true,	orderData : [8, 0] },
                { targets			: [9],	visible : true,	searchable : true,	orderData : [9, 0] },
                { targets			: [10],	visible : true,	searchable : true,	orderData : [10, 0] },
                { targets			: [11],	visible : true,	searchable : true,	orderData : [11, 0] },
                { targets			: [12],	visible : true,	searchable : true,	orderData : [12, 0] },
                { targets			: [13],	visible : true,	searchable : true,	orderData : [13, 0] },
                { targets			: [14],	visible : true,	searchable : true,	orderData : [14, 0] },
                { targets			: [15],	visible : true,	searchable : true,	orderData : [15, 0] },
                { targets			: [16],	visible : true,	searchable : true,	orderData : [16, 0] },
            ],
            columns		: [
                { render            : 
                    function (data, type, full, meta) {
						var btnIMG  = '';

						if (full.LABORATORIO_ADJUNTO != '') {
							btnIMG  = '<a href="'+ full.LABORATORIO_ADJUNTO +'" target="_blank" title="Adjunto" type="button" class="btn btn-warning btn-icon btn-circle"><i class="fa fa-image"></i></a>';
						}

                        return btnIMG;
                    }
                },
                { data				: 'TEST_CODIGO', name : 'TEST_CODIGO'},
                { data				: 'TIPO_ESTADO_NOMBRE', name : 'TIPO_ESTADO_NOMBRE'},
                { data				: 'TEST_FECHA', name : 'TEST_FECHA'},

                { data				: 'EQUIPO_NOMBRE', name : 'EQUIPO_NOMBRE'},
                { data				: 'EQUIPO_LOCAL_NOMBRE', name : 'EQUIPO_LOCAL_NOMBRE'},
                { data				: 'EQUIPO_VISITANTE_NOMBRE', name : 'EQUIPO_VISITANTE_NOMBRE'},

                { data				: 'PERSONA_NOMBRE', name : 'PERSONA_NOMBRE'},
                { data				: 'PERSONA_APELLIDO', name : 'PERSONA_APELLIDO'},
                { data				: 'PERSONA_CONVOCADO', name : 'PERSONA_CONVOCADO'},
                { data				: 'PERSONA_TIPO', name : 'PERSONA_TIPO'},
                { data				: 'PERSONA_POSICION_CARGO', name : 'PERSONA_POSICION_CARGO'},
                { data				: 'PERSONA_CAMISETA_DOCUMENTO', name : 'PERSONA_CAMISETA_DOCUMENTO'},
                
                { data				: 'LABORATORIO_NOMBRE', name : 'LABORATORIO_NOMBRE'},
                { data				: 'LABORATORIO_RESULTADO', name : 'LABORATORIO_RESULTADO'},
                { data				: 'LABORATORIO_FECHA_ENVIO', name : 'LABORATORIO_FECHA_ENVIO'},
                { data				: 'LABORATORIO_FECHA_RECIBIDO', name : 'LABORATORIO_FECHA_RECIBIDO'},
            ],
			createdRow : function( row, data, dataIndex ) {
				if (data['LABORATORIO_RESULTADO'] == 'POSITIVO' ) {        
					$(row).addClass('bg-danger text-white');
				}
            }
        }
    );

    $('.form-group').change(function() {
        var codTipo     = document.getElementById('var02').value;
        var codComp     = document.getElementById('var04').value;
        var codEncu     = document.getElementById('var05').value;
        var codEqui     = document.getElementById('var06').value;
        var codEsta     = document.getElementById('var07').value;
        var codCate     = document.getElementById('var08').value;
        var xDATA       = getCompetenciaExamen(codTipo, codComp, codEncu, codEqui, codEsta, codCate);
        tableData.clear().rows.add(xDATA).draw();
    });
});