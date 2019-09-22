var CuentaAJAX={	
	Exportar_DetalleCuenta : function(vfchemini,vfchemfin,vcod_cliente,vempresa,vdocumentos,vtabla,vformato,f_success){
		$.ajax({
			url: '../Index/Exportar_DetalleCuenta',
			type:'POST',
			dataType:'json',
			data:{
				fchemini : vfchemini,
				fchemfin : vfchemfin,
				cod_cliente : vcod_cliente,
				empresa : vempresa,
				documentos : vdocumentos,
				tabla : vtabla,
				formato : vformato
			},
			beforeSend:function(){
				
			},
			success:function(obj){

				f_success(obj);

			},
			error:function(){

			}
		});
	},
	ProgressBarDetalleCuenta_xlsx : function(offset, batch = 1, vtabla){

		batch = 1;

		$.ajax({
			url: '../Index/ProgressBarDetalleCuenta_xlsx',
			type:'POST',
			dataType:'json',
			data:{
				offset: offset,
				batch: batch,
				tabla: vtabla //,
				//cant: vcant
			},
			beforeSend:function(){

			},
			success:function(response){
				$('.progress-bar').css('width', response.percentage+'%');
				$('.progress-bar').text(response.percentage+'%');
				$('.progress-bar').attr('data-progress', response.percentage);
				
				$('#done').text(response.executed);
				$('.execute-time').text(response.execute_time);

				//insert text in textarea
				$("#rstdetcu").append('EJECUTADOS: '+response.executed+' \n');
				$("#rstdetcu").append('PORCENTAJE: '+response.percentage+'% \n');
				$("#rstdetcu").append('TOTAL: '+$("#total").val()+' \n');
				$("#rstdetcu").append('TIEMPO DE EJECUCI&Oacute;N: '+response.execute_time+' \n');
				$("#rstdetcu").append('----------------------------------------------------------------------------------------------------------------------------------------------------- \n');
				
				if (response.percentage == 100) {

					$('#exampleModal .close').css('display', ''); // hibilitando close del modal
					$("#tituloDescarga").text("Descarga el archivo"); // cambiando titulo del modal
					$('.end-process').show();

					var base_url = window.location.origin;

					// if(formato==".xlsx"){
						$("#msjdownload").html('Proceso completado.&nbsp;&nbsp;&nbsp;<button onclick="window.location.href=\''+base_url+'/SHEET/documents/files/excel/'+vtabla+'.xlsx\'" type="button" class="btn sample btn-lg btn-sm btn-excel-xlsx" ><i class="fa fa-file-excel"></i><span class="link-title">&nbsp;.xlsx</span></button>');
					// }

					// if(formato=="Plain Text"){
						// $("#msjdownload").html('Proceso completado.&nbsp;&nbsp;&nbsp;<button onclick="window.location.href=\''+base_url+'/SHEET/documents/files/excel/'+vtabla+'.xlsx\'" type="button" class="btn sample btn-lg btn-sm btn-excel-xlsx" ><i class="fa fa-file-excel"></i><span class="link-title">&nbsp;.xlsx</span></button>');
					// }
					
					CuentaAJAX.DeleteTableTMP();
				} else {
					var newOffset = offset + batch;					
					CuentaAJAX.ProgressBarDetalleCuenta_xlsx(newOffset, batch, vtabla);
				}
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				if (textStatus == 'parsererror') {
					textStatus = 'Technical error: Unexpected response returned by server. Sending stopped.';
				}
				alert(textStatus);
			}
		});
	},
	ResetProgressBar : function(vid){
		$.ajax({
			url: '../Index/ResetProgressBar',
			type:'POST',
			dataType:'json',
			data:{
				id : vid
			},
			beforeSend:function(){
				
			},
			success:function(obj){

			},
			error:function(){

			}
		});
	},
	ProgressBarDetalleCuenta_text : function(offset, batch = 1, vtabla){
		batch = 1;

		$.ajax({
			url: '../Index/ProgressBarDetalleCuenta_text',
			type:'POST',
			dataType:'json',
			data:{
				offset: offset,
				batch: batch,
				tabla: vtabla //,
				//cant: vcant
			},
			beforeSend:function(){

			},
			success:function(response){
				$('.progress-bar').css('width', response.percentage+'%');
				$('.progress-bar').text(response.percentage+'%');
				$('.progress-bar').attr('data-progress', response.percentage);
				
				$('#done').text(response.executed);
				$('.execute-time').text(response.execute_time);

				//insert text in textarea
				$("#rstdetcu").append('EJECUTADOS: '+response.executed+' \n');
				$("#rstdetcu").append('PORCENTAJE: '+response.percentage+'% \n');
				$("#rstdetcu").append('TOTAL: '+$("#total").val()+' \n');
				$("#rstdetcu").append('TIEMPO DE EJECUCI&Oacute;N: '+response.execute_time+' \n');
				$("#rstdetcu").append('----------------------------------------------------------------------------------------------------------------------------------------------------- \n');
				
				if (response.percentage == 100) {

					$('#exampleModal .close').css('display', ''); // hibilitando close del modal
					$("#tituloDescarga").text("Descarga el archivo"); // cambiando titulo del modal
					$('.end-process').show();

					var base_url = window.location.origin;

					// if(formato==".xlsx"){
					// 	$("#msjdownload").html('Proceso completado.&nbsp;&nbsp;&nbsp;<button onclick="window.location.href=\''+base_url+'/SHEET/documents/files/excel/'+vtabla+'.xlsx\'" type="button" class="btn sample btn-lg btn-sm btn-txt" ><i class="fa fa-file"></i><span class="link-title">&nbsp;.txt</span></button>');
					// }

					// if(formato=="Plain Text"){
						//$("#msjdownload").html('Proceso completado.&nbsp;&nbsp;&nbsp;<button onClick = "window.open(\'http://127.0.0.1:8080/SHEET/documents/files/txt/TMP_DETALLE_DOC_20190808_8395914.txt\',\'MyWindow\',\'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=300\')" id="donwloadarchivplano" type="button" class="btn sample btn-lg btn-sm btn-txt" ><i class="fa fa-file"></i><span class="link-title">&nbsp;.txt</span></button>');

						$("#msjdownload").html('Proceso completado.&nbsp;&nbsp;&nbsp;<button onclick="window.open(\''+base_url+'/SHEET/documents/files/txt/'+vtabla+'.txt\',\'MyWindow\', \'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=300\');" id="donwloadarchivplano" type="button" class="btn sample btn-lg btn-sm btn-txt" ><i class="fa fa-file"></i><span class="link-title">&nbsp;.txt</span></button>');
					
					
					// }
						//$("#donwloadarchivplano").on('click', function (){	
							//CuentaAJAX.DownloadPlainText();
							//window.open("http://localhost/SHEET/Index/DownloadPlainText&file="+url,'MyWindow'+doc,'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=300');
							//alert("hola");
							//window.open('http://127.0.0.1:8080/SHEET/documents/files/txt/TMP_DETALLE_DOC_20190808_8395914.txt','MyWindow', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,width=600,height=300');
						//});

						CuentaAJAX.DeleteTableTMP();

				} else {
					var newOffset = offset + batch;					
					CuentaAJAX.ProgressBarDetalleCuenta_text(newOffset, batch, vtabla);
				}
			},
			error:function(XMLHttpRequest, textStatus, errorThrown){
				if (textStatus == 'parsererror') {
					textStatus = 'Technical error: Unexpected response returned by server. Sending stopped.';
				}
				alert(textStatus);
			}
		});
	},
	DownloadPlainText: function() {
		$.ajax({
			url: '../Index/DownloadPlainText',
			type:'POST',
			dataType:'json',
			data:{
				file : $("#tmp_name_table").val()
			},
			beforeSend:function(){
				
			},
			success:function(obj){

			},
			error:function(){

			}
		});
	},
	DeleteTableTMP: function() {
		$.ajax({
			url: '../Index/DeleteTableTMP',
			type:'POST',
			dataType:'json',
			data:{
				file : $("#tmp_name_table").val()
			},
			beforeSend:function(){
				
			},
			success:function(obj){

			},
			error:function(){

			}
		});
	},
	// Consultar_Historico_Detalle : function(f_success){
	// 	$.ajax({
	// 		url: '../Index/Consultar_Historico_Detalle',
	// 		type:'POST',
	// 		dataType:'json',
	// 		data:{
	// 			file : "xxx"
	// 		},
	// 		beforeSend:function(){
				
	// 		},
	// 		success:function(obj){
	// 			//table.setData(obj);
	// 			f_success(obj);
	// 		},
	// 		error:function(){

	// 		}
	// 	});
	// },
	Consultar_Historico_Detalle : function(vempresa,vcod_cliente,vdocumentos,vfchemfin,vfchemini){
		$.ajax({
			url: '../Index/Consultar_Historico_Detalle',
			type:'POST',
			dataType:'json',
			data:{
				fchemini : vfchemini,
				fchemfin : vfchemfin,
				cod_cliente : vcod_cliente,
				empresa : vempresa,
				documentos : vdocumentos,
				//tabla : vtabla
			},
			beforeSend:function(){
				
			},
			success:function(obj){
				//table.setData(obj);
				//return obj;
				//result = obj;
				//$("#idjson").val(obj);
				//CuentaAJAX.callback(obj);

				// table.setData('../Index/Consultar_Historico_Detalle');
				// CuentaTabulator.example_tabulator(obj);

			},
			error:function(){

			}
		});
	},
	// callback : function(response){
	// 	return response;
	// 	//console.log(response);
	// }
}
