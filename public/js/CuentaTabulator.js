var CuentaTabulator={
	example_tabulator : function (tableData){
		// var table = new Tabulator("#example-table-ajax", {
		// 	//data:tableData, //set initial table data
		// 	columns:[
		// 		{title:"COD", field:"COD", sorter:"string", width:100},
		// 		{title:"EMPRESA", field:"EMPRESA", sorter:"string", width:50},
		// 		{title:"ZONA", field:"ZONA", sorter:"string", width:150},
		// 		{title:"COD_VEN", field:"COD_VEN", sorter:"string", width:150},
		// 		{title:"VENDEDOR", field:"VENDEDOR", sorter:"string", width:100},
		// 		{title:"COD_CLIENTE", field:"COD_CLIENTE", sorter:"string", width:150},
		// 		{title:"CLIENTE", field:"CLIENTE", sorter:"string", width:100},
		// 		{title:"TD", field:"TD", sorter:"string", width:50},
		// 		{title:"DOCUMENTO", field:"DOCUMENTO", sorter:"string", width:150},
		// 		{title:"FECHA_EMISION", field:"FECHA_EMISION", sorter:"string", width:150},
		// 		{title:"FECHA_VENCIMIENTO", field:"FECHA_VENCIMIENTO", sorter:"string", width:150},
		// 		{title:"MES_EMI", field:"MES_EMI", sorter:"string", width:100},
		// 		{title:"ANIO_EMI", field:"ANIO_EMI", sorter:"number", width:100},
		// 		{title:"DIAS_PLAZO", field:"DIAS_PLAZO", sorter:"number", width:100},
		// 		{title:"MON", field:"MON", sorter:"string", width:100},
		// 		{title:"TIPCAMV", field:"TIPCAMV", sorter:"number", width:100},
		// 	],
		// 	layout:"fitColumns",
		// 	ajaxProgressiveLoad:"scroll",
		// 	placeholder:"No Data Set"
		// });
	}
}

// function ottieniDatiRicerca(url, config, params){
// 		//url - the url of the request
// 		//config - the ajaxConfig object
// 		//params - the ajaxParams object

// 		//return promise
// 	return new Promise(function(resolve, reject){
// 		//    $.ajax({
// 		// 		type: "GET",
// 		// 		dataType: 'html',
// 		// 		url: url + "?params=" + encodeURI(JSON.stringify(params)),
// 		// 		async: true,
// 		// 		success: function (response) {
// 		// 			resolve(JSON.parse(response));
// 		// 		},
// 		// 		error: function(XMLHttpRequest, textStatus, errorThrown) {
// 		// 			reject("Status: " + textStatus);
// 		// 		}
// 		// 	});
// 		// });

// 		$.ajax({
// 			url: '../Index/Consultar_Historico_Detalle',
// 			type:'GET',
// 			dataType:'json',
// 			data:{
// 				fchemini : vfchemini,
// 				fchemfin : vfchemfin,
// 				cod_cliente : vcod_cliente,
// 				empresa : vempresa,
// 				documentos : vdocumentos,
// 				//tabla : vtabla
// 			},
// 			beforeSend:function(){
				
// 			},
// 			success:function(obj){
// 				//table.setData(obj);
// 				//return obj;
// 				//result = obj;
// 				//$("#idjson").val(obj);
// 				//CuentaAJAX.callback(obj);

// 				// table.setData('../Index/Consultar_Historico_Detalle');
// 				// CuentaTabulator.example_tabulator(obj);
// 				resolve(JSON.parse(obj));

// 			},
// 			error:function(XMLHttpRequest, textStatus, errorThrown){
// 				reject("Status: " + textStatus);
// 			}
// 		});
// 	}
// }

var table = new Tabulator("#example-table-ajax", {
	//data:tableData, //set initial table data
	ajaxURL:"http://191.98.186.82:8080/SHEET/Index/Consultar_Historico_Detalle",
	ajaxConfig:"POST", //ajax HTTP request type
	ajaxContentType:"json",
	// movableCols: true,
    // movableRows: true,
	columns:[
		{title:"COD", field:"COD", sorter:"string", width:100},
		{title:"EMPRESA", field:"EMPRESA", sorter:"string", width:50},
		{title:"ZONA", field:"ZONA", sorter:"string", width:150},
		{title:"COD_VEN", field:"COD_VEN", sorter:"string", width:150},
		{title:"VENDEDOR", field:"VENDEDOR", sorter:"string", width:100},
		{title:"COD_CLIENTE", field:"COD_CLIENTE", sorter:"string", width:150},
		{title:"CLIENTE", field:"CLIENTE", sorter:"string", width:100},
		{title:"TD", field:"TD", sorter:"string", width:50},
		{title:"DOCUMENTO", field:"DOCUMENTO", sorter:"string", width:150},
		{title:"FECHA_EMISION", field:"FECHA_EMISION", sorter:"string", width:150},
		{title:"FECHA_VENCIMIENTO", field:"FECHA_VENCIMIENTO", sorter:"string", width:150},
		{title:"MES_EMI", field:"MES_EMI", sorter:"string", width:100},
		{title:"ANIO_EMI", field:"ANIO_EMI", sorter:"number", width:100},
		{title:"DIAS_PLAZO", field:"DIAS_PLAZO", sorter:"number", width:100},
		{title:"MON", field:"MON", sorter:"string", width:100},
		{title:"TIPCAMV", field:"TIPCAMV", sorter:"number", width:100},
	],
	// layout:"fitColumns",
	// ajaxProgressiveLoad:true,
	// placeholder:"No Data Set",
	// ajaxType: "GET",
	// pagination : "remote" , // habilita la paginación remota 
	// //ajaxURL : "http://191.98.186.82:8080/SHEET/Index/Consultar_Historico_Detalle" , // establece la url para la solicitud de ajax 
	// ajaxURL : "http://192.168.0.99:8080/SHEET/Index/Consultar_Historico_Detalle" , // establece la url para la solicitud de ajax 
    // ajaxParams : { token : "ABC123" }, // establece cualquier parámetro estándar para pasar con la solicitud 
    // paginationSize : 5 , // parámetro opcional para solicitar un cierto número de filas por página

	ajaxResponse:function(url, params, response){
		//url - the URL of the request
		//params - the parameters passed with the request
		//response - the JSON object returned in the body of the response.
  
		return response.data; //pass the data array into Tabulator
	 },
// 	ajaxError : function ( xhr , textStatus , errorThrown ) {
// 		// xhr - el objeto XHR 
// 	   // textStatus - tipo de error 
// 	   // errorThrown - porción de texto del estado HTTP
// 	   alert(errorThrown);
//    },
	// ajaxURL: Routing.generate('agente_ordine_nuovo_lista_ajax', {
	// 	codiceCliente:  $("#codiceClienteTxt").val()
	// }),
	// ajaxProgressiveLoad:"scroll",
	// ajaxProgressiveLoadScrollMargin:300,
	// ajaxFiltering:true,
	// ajaxSorting:true,
	// ajaxRequestFunc:ottieniDatiRicerca,
	// layout:"fitDataFill",
	// placeholder: "No data!",


});
