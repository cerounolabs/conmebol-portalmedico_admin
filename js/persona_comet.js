function setPersonaComet(codElem, codAcc){
	var xJSON		= '';
	var xJSON1		= getDominio('EXAMENMEDICODOCUMENTO');
	var html        = '';
	var bodyCol     = '';
	var bodyTit     = '';
	var bodyMod     = '';
	var bodyOnl     = '';
	var bodyBot     = '';
	var selTipo		= '';
	var selGenero	= '';
	var selTipoDoc	= '';
	var rowAuditoria= '';

	switch (codAcc) {
		case 1:
			bodyTit = 'NUEVO';
			bodyCol = '#163562;';
			bodyMod = 'C';
			bodyOnl = '';
			bodyBot = '           <button type="submit" class="btn btn-info">Agregar</button>';
			break;

		case 2:
			bodyTit = 'VER';
			bodyCol = '#6929d5;';
			bodyMod = 'R';
			bodyOnl = 'readonly';
			bodyBot = '';
			xJSON	= getPersona(codElem)
			break;

		case 3:
			bodyTit = 'EDITAR';
			bodyCol = '#007979;';
			bodyMod = 'U';
			bodyOnl = '';
			bodyBot = '           <button type="submit" class="btn btn-success">Actualizar</button>';
			xJSON	= getPersona(codElem)
			break;

		case 4:
			bodyTit = 'ELIMINAR';
			bodyCol = '#ff2924;';
			bodyMod = 'D';
			bodyOnl = 'readonly';
			bodyBot = '           <button type="submit" class="btn btn-danger">Eliminar</button>';
			xJSON	= getPersona(codElem)
			break;
	
		case 5:
			bodyTit = 'AUDITORIA';
			bodyCol = '#d38109;';
			bodyMod = 'A';
			bodyOnl = 'readonly';
			bodyBot = '';
			break;

		case 6:
			bodyTit = 'NUEVO';
			bodyCol = '#163562;';
			bodyMod = 'C';
			bodyOnl = '';
			bodyBot = '           <button type="submit" name="submit" class="btn  text-center text-white" style="background-color:'+ bodyCol +'">Agregar</button>';
			break;

		default:
			break;
	}

	if (codAcc == 1) {
        xJSON1.forEach(element1 => {
            if (element1.tipo_estado_codigo == 'A' ) {
				selTipoDoc     = selTipoDoc + '                               <option value="'+ element1.tipo_codigo +'">'+  element1.tipo_nombre_castellano +'</option>';
			}
        });

		html = 
			'<div class="modal-content">'+
			'   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_comet.php">'+
			'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
			'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
			'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
			'	    </div>'+
			''+
			'	    <div class="modal-body">'+
			'           <div class="form-group">'+
			'               <input class="form-control" type="hidden" id="workCodigo"	name="workCodigo"	value="0"  					required readonly>'+
			'               <input class="form-control" type="hidden" id="workModo" 	name="workModo"		value="'+ bodyMod +'" 		required readonly>'+
			'               <input class="form-control" type="hidden" id="workPage" 	name="workPage"		value="'+ _parm04BASE +'"	required readonly>'+
			'           </div>'+
			''+
			'           <div class="row">'+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var01">TIPO</label>'+
			'                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;" '+ bodyOnl +'>'+
			'                           <optgroup label="Tipo">'+
			'                               <option value="Z">ZONA 1</option>'+
			'                           </optgroup>'+
			'                       </select>'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var02">NOMBRE</label>'+
			'                       <input id="var02" name="var02" value="" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NOMBRE" '+ bodyOnl +' required >'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var03">APELLIDO</label>'+
			'                       <input id="var03" name="var03" value="" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="APELLIDO" '+ bodyOnl +' required >'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var04">GENERO</label>'+
			'                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;" '+ bodyOnl +'>'+
			'                           <optgroup label="Genero">'+
			'                               <option value="MALE">MALE</option>'+
			'                               <option value="FEMALE">FEMALE</option>'+
			'                           </optgroup>'+
			'                       </select>'+	
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var05">FECHA NACIMIENTO</label>'+
			'                       <input id="var05" name="var05" value="" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="FECHA NACIMIENTO" '+ bodyOnl +'>'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var06">POSICIÓN O FUNCIÓN</label>'+
			'                       <input id="var06" name="var06" value="" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="POSICIÓN O FUNCIÓN" '+ bodyOnl +'>'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var07">TIPO DOCUMENTO</label>'+
			'                       <select id="var07" name="var07" class="form-control" style="width:100%; height:40px;" '+ bodyOnl +'  required>'+
            '                           <optgroup label="TIPO DOCUMENTO">'+ selTipoDoc +
            '                           </optgroup>'+
			'                       </select>'+			
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var08">NÚMERO DOCUMENTO</label>'+
			'                       <input id="var08" name="var08" value="" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NÚMERO DOCUMENTO" '+ bodyOnl +' required>'+
			'                   </div>'+
			'               </div>'+
			'           </div>'+
			'	    </div>'+
			''+
			'	    <div class="modal-footer">'+ bodyBot +
			'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
			'	    </div>'+
			'   </form>'+
			'</div>';
	} else if (codAcc > 1 && codAcc < 5) {
		xJSON.forEach(element => {
			if (element.persona_codigo == codElem) {	
				switch (element.persona_tipo) {
					case 'P':
						selTipo = 
						'                               <option value="P" selected>JUGADOR</option>'+
						'                               <option value="T">CUERPO TÉCNICO </option>'+
						'                               <option value="Z">ZONA 1</option>';
						break;
				
					case 'T':
						selTipo = 
						'                               <option value="P">JUGADOR</option>'+
						'                               <option value="T" selected>CUERPO TÉCNICO</option>'+
						'                               <option value="Z">ZONA 1</option>';
						break;

					case 'Z':
						selTipo = 
						'                               <option value="P">JUGADOR</option>'+
						'                               <option value="T">CUERPO TÉCNICO</option>'+
						'                               <option value="Z" selected>ZONA 1</option>';
						break;
					
				}
				switch (element.persona_genero) {
					case 'MALE':
						selGenero = 
						'                               <option value="MALE" selected>MALE</option>'+
						'                               <option value="FEMALE">FEMALE</option>';
						break;
				
					case 'FEMALE':
						selGenero = 
						'                               <option value="MALE">MALE</option>'+
						'                               <option value="FEMALE" selected>FEMALE</option>';
						break;

				}

				selTipo = '                               <option value="Z" selected>ZONA 1</option>';
		
				xJSON1.forEach(element1 => {
					if(element.tipo_documento_codigo == element1.tipo_codigo){
						selTipoDoc   = selTipoDoc + '                               <option value="'+ element1.tipo_codigo +'" selected>' + element1.tipo_nombre_castellano +'</option>';
					} else {
						selTipoDoc   = selTipoDoc + '                               <option value="'+ element1.tipo_codigo +'">'+ element1.tipo_nombre_castellano +'</option>';
					}
				
				});
			
				html = 
				'<div class="modal-content">'+
				'   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_comet.php">'+
				'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
				'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
				'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
				'	    </div>'+
				''+
				'	    <div class="modal-body">'+
				'           <div class="form-group">'+
				'               <input class="form-control" type="hidden" id="workCodigo"	name="workCodigo"	value="'+ codElem +'"  		required readonly>'+
				'               <input class="form-control" type="hidden" id="workModo" 	name="workModo"		value="'+ bodyMod +'" 		required readonly>'+
				'               <input class="form-control" type="hidden" id="workPage" 	name="workPage"		value="'+ _parm04BASE +'" 	required readonly>'+
				'           </div>'+
				''+
				'           <div class="row">'+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var01">TIPO</label>'+
				'                       <select id="var01" name="var01" class="select2 form-control custom-select" style="width:100%; height:40px;" '+ bodyOnl +'>'+
				'                           <optgroup label="Tipo">'+selTipo +
				'                           </optgroup>'+
				'                       </select>'+
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var02">NOMBRE</label>'+
				'                       <input id="var02" name="var02" value="'+element.persona_nombre+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NOMBRE" '+ bodyOnl +' required >'+
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var03">APELLIDO</label>'+
				'                       <input id="var03" name="var03" value="'+element.persona_apellido+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="APELLIDO" '+ bodyOnl +' required >'+
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var04">GENERO</label>'+
				'                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;" '+ bodyOnl +'>'+
				'                           <optgroup label="Genero">'+selGenero+
				'                           </optgroup>'+
				'                       </select>'+	
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var05">FECHA NACIMIENTO</label>'+
				'                       <input id="var05" name="var05" value="'+ element.persona_fecha_nacimiento_1 +'" class="form-control" type="date" style="text-transform:uppercase; height:40px;" placeholder="FECHA NACIMIENTO" '+ bodyOnl +'>'+
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var06">POSICIÓN O FUNCIÓN</label>'+
				'                       <input id="var06" name="var06" value="'+element.persona_funcion+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="POSICIÓN O FUNCIÓN" '+ bodyOnl +'>'+
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var07">TIPO DOCUMENTO</label>'+
				'                       <select id="var07" name="var07" class="form-control" style="width:100%; height:40px;" '+ bodyOnl +'  required>'+
				'                           <optgroup label="TIPO DOCUMENTO">'+ selTipoDoc +
				'                           </optgroup>'+
				'                       </select>'+			
				'                   </div>'+
				'               </div>'+
				''+
				'               <div class="col-sm-12 col-md-4">'+
				'                   <div class="form-group">'+
				'                       <label for="var08">NÚMERO DOCUMENTO</label>'+
				'                       <input id="var08" name="var08" value="'+element.tipo_documento_numero+'" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="NÚMERO DOCUMENTO" '+ bodyOnl +' required>'+
				'                   </div>'+
				'               </div>'+
				'           </div>'+
				'	    </div>'+
				''+
				'	    <div class="modal-footer">'+ bodyBot +
				'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
				'	    </div>'+
				'   </form>'+
				'</div>';
				
			}
		});
			
	} else if (codAcc == 5) {
		aJSON.forEach(element => {
			rowAuditoria = rowAuditoria + 
			'					<tr class="bg-conmebol" style="text-align:center;">'+
			'						<td class="border-top-0">'+ element.auditoria_metodo +'</td>'+
			'						<td class="border-top-0">'+ element.auditoria_empresa_nombre +'</td>'+
			'						<td class="border-top-0">'+ element.auditoria_usuario +'</td>'+
			'						<td class="border-top-0">'+ element.auditoria_fecha_hora +'</td>'+
			'						<td class="border-top-0">'+ element.auditoria_ip +'</td>'+
			'						<td class="border-top-0">'+ element.tipo_orden +'</td>'+
			'						<td class="border-top-0">'+ element.tipo_path +'</td>'+
			'						<td class="border-top-0">'+ element.tipo_estado_nombre +'</td>'+
			'						<td class="border-top-0">'+ element.tipo_nombre +'</td>'+
			'						<td class="border-top-0">'+ element.tipo_observacion +'</td>'+
			'					</tr>';
		});

		html = 
		'<div class="modal-content">'+
		'   <form id="form" data-parsley-validate method="" action="">'+
		'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
		'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
		'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
		'	    </div>'+
		'	    <div class="modal-body" >'+
		'			<table id="tableLoad" class="table v-middle" style="width: 100%;">'+
		'				<thead id="tableAuditoria">'+
		'					<tr class="bg-conmebol" style="text-align:center;">'+
		'						<th class="border-top-0">M&Eacute;TODO</th>'+
		'						<th class="border-top-0">EMPRESA</th>'+
		'						<th class="border-top-0">USUARIO</th>'+
		'						<th class="border-top-0">FECHA HORA</th>'+
		'						<th class="border-top-0">IP</th>'+
		'						<th class="border-top-0">ORDEN</th>'+
		'						<th class="border-top-0">IMAGEN</th>'+
		'						<th class="border-top-0">ESTADO</th>'+
		'						<th class="border-top-0">TIPO</th>'+
		'						<th class="border-top-0">OBSERVACI&Oacute;N</th>'+
		'					</tr>'+
		'				</thead>'+
		'				<tbody>'+rowAuditoria+
		'				</tbody>'+
		'			</table>'+
		'	    </div>'+
		'	    <div class="modal-footer">'+ bodyBot +
		'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
		'	    </div>'+
		'   </form>'+
		'</div>';
	} else if(codAcc == 6){
		html = 
			'<div class="modal-content">'+
			'   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_comet_adjunto.php" enctype="multipart/form-data">'+
			'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
			'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
			'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
			'	    </div>'+
			''+
			'	    <div class="modal-body">'+
			'           <div class="row">'+
			'               <div class="col-sm-12">'+
			'               	<div class="row">'+
			'               		<div class="col-xl-12">'+
			'                   		<div class="form-group">'+
			'                       		<label for="var09" style="color:#163562; font-weight:bold;">Adjuntar Archivo</label>'+
			'                       		<input id="var09" name="var09" class="form-control" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" style="height:40px;" required>'+
			'                   		</div>'+
			'               		</div>'+
			'               	</div>'+
			'           	</div>'+
			'           </div>'+
			''+
			'           <div class="form-group">'+
			'               <input class="form-control" type="hidden" id="workCodigo"	name="workCodigo"	value="0"  					required readonly>'+
			'               <input class="form-control" type="hidden" id="workModo" 	name="workModo"		value="'+ bodyMod +'" 		required readonly>'+
			'               <input class="form-control" type="hidden" id="workPage" 	name="workPage"		value="'+ _parm04BASE +'"	required readonly>'+
			'           </div>'+
			'       </div>'+
			'	    <div class="modal-footer">'+ bodyBot +
			'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
			'	    </div>'+
			'   </form>'+
			'</div>';
	}

	$("#modal-content").empty();
	$("#modal-content").append(html);
}

function setPersonaComet2(codElem, codAcc){
	var xJSON		= getCompetenciaListado();
	var html        = '';
	var bodyCol     = '';
	var bodyTit     = '';
	var bodyMod     = '';
	var bodyOnl     = '';
	var bodyBot     = '';
	var selComp		= '';
	var inp02		= "'"+'var02'+"'";
	var inp01		= "'"+'var01'+"'";

	switch (codAcc) {
		case 1:
			bodyTit = 'ALTA DE PERSONA COMET';
			bodyCol = '#163562;';
			bodyMod = 'C';
			bodyOnl = '';
			bodyBot = '           <button type="submit" class="btn btn-info">Agregar</button>';
			break;
	}

	if (codAcc == 1) {
        xJSON.forEach(element => {
			selComp = selComp + '                               <option value="'+element.competicion_codigo+'">DISCIPLINA: '+ element.competicion_disciplina +' - COMPETICION: '+ element.competicion_nombre + ' - GENERO: ' + element.competicion_genero + ' - PERIODO: ' + element.competicion_anho +'</option>';
		});

		

		html = 
			'<div class="modal-content">'+
			'   <form id="form" data-parsley-validate method="post" action="../class/crud/persona_comet_2.php">'+
			'	    <div class="modal-header" style="color:#fff; background:'+ bodyCol +'">'+
			'		    <h4 class="modal-title" id="vcenter"> '+ bodyTit +' </h4>'+
			'		    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>'+
			'	    </div>'+
			''+
			'	    <div class="modal-body">'+
			'           <div class="form-group">'+
			'               <input class="form-control" type="hidden" id="workCodigo"	name="workCodigo"	value="0"  					required readonly>'+
			'               <input class="form-control" type="hidden" id="workModo" 	name="workModo"		value="'+ bodyMod +'" 		required readonly>'+
			'               <input class="form-control" type="hidden" id="workPage" 	name="workPage"		value="'+ _parm04BASE +'" 	required readonly>'+
			'           </div>'+
			''+
			'			<div class="row">'+
			'               <div class="col-sm-12">'+
			'                   <div class="form-group">'+
			'                       <label for="var01">Competencia</label>'+
			'                       <select id="var01" name="var01" class="select2 form-control custom-select" onchange="selectEquiposAll('+ inp01 +', '+ inp02 +')" style="width:100%; height:40px;" required>'+selComp+
			'                       </select>'+
			'                    </div>'+
			'                </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var02">Equipo</label>'+
			'                       <select id="var02" name="var02" class="select2 form-control custom-select" style="width:100%; height:40px;" required>'+
			'                       </select>'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var03">Persona Comet</label>'+
			'                       <input id="var03" name="var03" value="" class="form-control" type="text" style="text-transform:uppercase; height:40px;" placeholder="PERSONA COMET" '+ bodyOnl +' required >'+
			'                   </div>'+
			'               </div>'+
			''+
			'               <div class="col-sm-12 col-md-4">'+
			'                   <div class="form-group">'+
			'                       <label for="var04">Tipo</label>'+
			'                       <select id="var04" name="var04" class="select2 form-control custom-select" style="width:100%; height:40px;" '+ bodyOnl +'>'+
			'                           <optgroup label="Tipo">'+
			'                               <option value="P">JUGADOR</option>'+
			'                               <option value="T">CUERPO TECNICO</option>'+
			'								<option value="O">OFICIAL</option>'+
			'                           </optgroup>'+
			'                       </select>'+	
			'                   </div>'+
			'               </div>'+
			'            </div>'+
			''+
			'	    <div class="modal-footer">'+ bodyBot +
			'		    <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>'+
			'	    </div>'+
			'   </form>'+
			'</div>';
	}
	$("#modal-content").empty();
	$("#modal-content").append(html);
}