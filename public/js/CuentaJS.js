$(document).ready(function(){
	
	$("#fctajax").click(function(){
		CuentaAJAX.EnviandoPrueba();
	});

	$('#fchemiini').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});

	$('#fchemifin').datetimepicker({
        language:  'es',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
	});
	
	$('#cbo_empresa').multiselect({
		buttonWidth: '100%',
		nonSelectedText: 'Seleccionar',
		onChange: function(element, checked) {
			var brands = $('#cbo_empresa option:selected');
			var selected = [];
			$(brands).each(function(index, brand){
				selected.push([$(this).val()]);
			});
	
			//console.log(selected);
			$("#hdcbo_empresa").val(selected);
		}
	});

	$('#cbo_documentos').multiselect({
		buttonWidth: '100%',
		nonSelectedText: 'Seleccionar',
		onChange: function(element, checked) {
			var brands = $('#cbo_documentos option:selected');
			var selected = [];
			$(brands).each(function(index, brand){
				selected.push([$(this).val()]);
			});
	
			//console.log(selected);
			$("#hdcbo_documentos").val(selected);
		}
	});

	$('#btn_empresa-deselectAll-all').on('click', function() {
		$('#cbo_empresa').multiselect('deselectAll', true);
		$('#cbo_empresa').multiselect('updateButtonText');
	});

	$('#btn_documentos-deselectAll-all').on('click', function() {
		$('#cbo_documentos').multiselect('deselectAll', true);
		$('#cbo_documentos').multiselect('updateButtonText');
	});

	/*OBTENGO FECHA CON EL TIEMPO*/
	function addZero(i) {
		if (i < 10) {
			i = '0' + i;
		}
		return i;
	}
	
	function hoyFecha(){
		var hoy = new Date();
			var dd = hoy.getDate();
			var mm = hoy.getMonth()+1;
			var yyyy = hoy.getFullYear();
			var hours = hoy.getHours();
			var minu = hoy.getMinutes();
			var secon = hoy.getSeconds();
			var milise = hoy.getMilliseconds();
			
			dd = addZero(dd);
			mm = addZero(mm);
	
			//return dd+'/'+mm+'/'+yyyy+'/'+hh;
			return yyyy+mm+dd+'_'+hours+minu+secon+milise;
	
	}

	$("#txtfchemiini").keydown(function(e){
        e.preventDefault();
	});
	
	$("#txtfchemifin").keydown(function(e){
        e.preventDefault();
	});
	
	const ok = new Ok({
		vceldavacia: {
			msg: "No debe estar Vacio",
			fn: val => val.replace(/ /g, "") !== ""
		},
		validfecha: {
			msg: "Formato Incorrecto",
			fn: val => {
				var RegExPattern = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
				if ((val.match(RegExPattern)) && (val!='')) {
					  return true;
				} else {
					  return false;
				}
			}
		},
		// emailDe: {
		// 	msg: "Please input your .de email",
		// 	fn: val => val.endsWith(".de")
		// }
	});

	ok.bind(document.querySelector("#txtfchemiini"));
	ok.bind(document.querySelector("#txtfchemifin"));
	

	$("form").on("submit",function(e){

		//alert($(this).attr("data-tipo"));

		var fchemini = $("#fchemiini").find("input").val();
		var fchemfin = $("#fchemifin").find("input").val();
		var cod_cliente = $("#txtcod_cliente").val().substring(0, 11);
		//var empresa = $("#hdcbo_empresa").val();

		var empresa = "";

		if($("#hdcbo_empresa").val()==""){
			empresa = "0002,0003,0004,0016";				
		}else {
			empresa = $("#hdcbo_empresa").val();
		}

		// var documentos = $("#hdcbo_documentos").val();
		var documentos = "";
		if($("#hdcbo_documentos").val() == ""){				
			documentos = "FT,BV,NC";				
		}else{
			documentos = $("#hdcbo_documentos").val();
		}

		var tabla = 'TMP_DETALLE_DOC_'+hoyFecha().toString();

		if($(this).attr("data-tipo")=="desc"){
			if($("#extensiondwonload").text()==""){			
				$("#alerta_formato").modal();
			} else {
				$("#exampleModal").modal({backdrop: 'static', keyboard: false}); // Mostrando el Modal de ProgressBar
				$('#exampleModal .close').css('display', 'none'); // Ocultando el boton Close				

				$("#tmp_name_table").val(tabla);

				var formato = $("#extensiondwonload").text();
				
				CuentaAJAX.Exportar_DetalleCuenta(fchemini,fchemfin,cod_cliente,empresa,documentos,tabla,formato,function(obj){
					if (obj.rst) {
						if(obj.cant == 0){
							$('#exampleModal').modal('hide');									
							$('#alerta_formato_cero').modal('toggle');				
						}else{
							$('#total').text(obj.cant);
							$("#tituloDescarga").text("Procesando...");

							if(formato == ".xlsx"){
								CuentaAJAX.ProgressBarDetalleCuenta_xlsx(1, false, tabla);
							}

							if(formato == "Plain Text"){
								CuentaAJAX.ProgressBarDetalleCuenta_text(1, false, tabla);
							}
						}					
					}
				});	
			}

		} else if($(this).attr("data-tipo")=="cons") {
			if($("#txtcod_cliente").val()==""){				
				$('#alerta_formato_cliente').modal('toggle');	
			} else {
				//CuentaAJAX.Consultar_Historico_Detalle(fchemini,fchemfin,cod_cliente,empresa,documentos,tabla);
				CuentaAJAX.Consultar_Historico_Detalle(empresa,cod_cliente,documentos,fchemfin,fchemini);
			}
		}
			
			
	});

	$("#exampleModal").on("hidden.bs.modal", function () {

		$('#start_form').hide();
		$('#sending').show();
		$('#sended').text(0);
		$('.end-process').hide();

		$('#total').text(0);
		$('#done').text(0);
		$('#tituloDescarga').text("Explorando información");
		$(".execute-time").text("0 segundos");

		$('.progress-bar').css('width', '0%');
		$('.progress-bar').text('0%');
		$('.progress-bar').attr('data-progress', '0');

		$("#formatodescarga").text("");
		$("#extensiondwonload").text("");

		CuentaAJAX.ResetProgressBar(1);

	});



	// $('#exampleModal').keyup(function(e){  
	// 	text = $(this).val();
	// 	width = $(this).width();		
	// 	var cursorPosition = $(this).prop("selectionStart");		
	// 	txtBeforeCaret = text.substring(0, cursorPosition);
	// 	txtAfterCaret = text.substring(cursorPosition);
	// 	match1 = txtBeforeCaret.match(/\n/);		
	// 	if(txtAfterCaret!==null){match2=txtAfterCaret.match(/\n/g);}  	  
	//   });

	$("#FormatDownload").on('click','li a',function (){
		$("#formatodescarga").text($(this).text());
		$("#extensiondwonload").text($(this).text());
	});

	$('#txtcod_cliente').typeahead({
		limit: 10,
	    source:  function (query, process) {
			return $.get(
						'../Index/ObtenerCliente', 
						{ 
							query: query 
						}, 
						function (data) {
							console.log(data);
							data = $.parseJSON(data);
							return process(data);
						}
			);
	    }
	});


	
	  
	// $("#utopian-table").tabulator({     
	// 	layout:"fitColumns", //fit columns to width of table (optional)
	// 	tooltips:true, // set tooltips to true or false   
	// 	pagination:"local", //'local' or 'remote'. local loads all the data and then paginate while remote loads upon ajax call
	// 	paginationSize:7, // number of rows before applying pagination
	// 	movableColumns:true, // allows columns to be moved around
	// 	resizableRows:true, // allows rows to be resize'
	// 	initialSort:[
	// 	  {column:"Username", dir:"asc"},
	// 	],    
	// 	  columns:[ //Define Table Columns
	// 		  {title:"Username", field:"name", width:150},
	// 		  {title:"Contribution", field:"np"},
	// 		  {title:"Approval Rate", field:"apr", align:"left", formatter:"progress"},
	// 		  {title:"Total Reward ($)", field:"col"},
	// 		  {title:"Last Contribution", field:"lc", sorter:"date"},
	// 	  ],        
	//   });
	//   //define sample data
	//   var tabledata = [
	// 	  {id:1, name:"Aliyu-s", np:"23", apr:"40", col:"123", lc:"20/02/2018"},
	// 	  {id:2, name:"Crypto", np:"3", apr:"3", col:"67", lc:"14/05/2017"},
	// 	  {id:3, name:"Habbuyi", np:"5", apr:"42", col:"47", lc:"22/05/2017"},
	// 	  {id:4, name:"Bright123", np:"7", apr:"125", col:"372.12", lc:"01/08/2017"},
	// 	  {id:5, name:"Marmajuke", np:"9", apr:"12", col:"124.34", lc:"31/01/2018"},
	// 	  {id:8, name:"OliBoy", apr:"12", np:"14", col:"87.3", lc:"12/01/2018"},
	// 	  {id:9, name:"Maryie", apr:"2", np:"19", col:"36.12", lc:"14/05/2017"},
	// 	  {id:10, name:"Christy", np:"6", apr:"42", col:"26.2", lc:"22/10/2017"},
	// 	  {id:11, name:"Philips", np:"12", apr:"125", col:"12.9", lc:"01/08/2017"},
	// 	  {id:12, name:"Margret", np:"3", apr:"16", col:"19.6", lc:"31/01/2018"},
	//   ];
	//   //load sample data into the table
	// 	$("#utopian-table").tabulator("setData", tabledata);      
  
	// 	$("#download-button").on("click", function(){
	// 	  $("#utopian-table").tabulator("download", "csv", "Tabulator Sample Download.csv");
	//   });

	// var tableData = [
    //     {id:1, name:"Billy Bob", age:"12", gender:"male", height:1, col:"red", dob:"", cheese:1},
    //     {id:2, name:"Mary May", age:"1", gender:"female", height:2, col:"blue", dob:"14/05/1982", cheese:true},
    // ]

    // var table = new Tabulator("#example-table-ajax", {
    //   //data:tableData, //set initial table data
    //   columns:[
    //       {title:"COD", 		field:"name"},
    //       {title:"EMPRESA", 	field:"age"},
    //       {title:"ZONA", 		field:"gender"},
    //       {title:"COD_VEN", 	field:"height"},
    //       {title:"VENDEDOR", 	field:"col"},
    //       {title:"COD_CLIENTE", field:"dob"},
    //       {title:"CLIENTE", 	field:"cheese"},
    //   ],
	// });

	// //Build Tabulator

	// table.setData(tableData);

	// $("#ajax-trigger").click(function(){
	// 	table.setData('../Index/Consultar_Historico_Detalle');
	// });

	// function queryRealm(url, config, params){
	// 	//url - the url of the request
	// 	//config - the ajaxConfig object
	// 	//params - the ajaxParams object
	
	// 	//return promise
	// 	return new Promise(function(resolve, reject){
	// 		//do some async data retrieval then pass the array of row data back into Tabulator
	// 		resolve(data);
	
	// 		//if there is an error call this function and pass the error message or object into it
	// 		reject();
	// 	});
	// }

	// var table = new Tabulator("#utopian-table", {
	// 	// ajaxURL: "http://192.168.0.34:8080/SHEET/Index/Consultar_Historico_Detalle",
	// 	// height:"311px",
	// 	//ajaxRequestFunc:queryRealm,
	// 	// ajaxConfig:{
	// 	// 	method:"POST", //set request type to Position
	// 	// 	headers: {

	// 	// 		"Accept": "application/json", //tell the server we need JSON back
	// 	// 		"X-Requested-With": "XMLHttpRequest", //fix to help some frameworks respond correctly to request
	// 	// 		"Content-type": 'application/json; charset=utf-8', //set the character encoding of the request
	// 	// 		//"Access-Control-Allow-Origin": "http://yout-site.com", //the URL origin of the site making the request
	// 	// 	},
	// 	// },
	// 	ajaxConfig:"POST", //ajax HTTP request type
    // 	ajaxContentType:"json", // send parameters to the server as a JSON encoded string
	// 	ajaxURL: "../Index/Consultar_Historico_Detalle",  
	// 	height:100,
	// 	layout:"fitColumns",
	// 	placeholder:"Placeholder Data",
	// 	columns:[
	// 		{title:"Name", field:"name", sorter:"string", width:200},
	// 		{title:"Progress", field:"progress", sorter:"number", formatter:"progress"},
	// 		{title:"Gender", field:"gender", sorter:"string"},
	// 		{title:"Rating", field:"rating", formatter:"star", align:"center", width:100},
	// 		{title:"Favourite Color", field:"col", sorter:"string"},
	// 		{title:"Date Of Birth", field:"dob", sorter:"date", align:"center"},
	// 		{title:"Driver", field:"car", align:"center", formatter:"tickCross", sorter:"boolean"},
	// 	],
	// 	ajaxResponse:function(url, params, response){
	// 		//url - the URL of the request
	// 		//params - the parameters passed with the request
	// 		//response - the JSON object returned in the body of the response.
	// 		alert("hola");
	// 		return response.data; //pass the data array into Tabulator
	// 	 },
	// });
	

	// var example_table_ajax = new Tabulator("#example-table-ajax", {
	// 	height:"311px",
	// 	layout:"fitColumns",
	// 	placeholder:"No Data Set",
		
	// 	columns:[
	// 	  {title:"Name", field:"name", sorter:"string", width:200},
	// 	  {title:"Progress", field:"progress", sorter:"number", formatter:"progress"},
	// 	  {title:"Gender", field:"gender", sorter:"string"},
	// 	  {title:"Rating", field:"rating", formatter:"star", align:"center", width:100},
	// 	  {title:"Favourite Color", field:"col", sorter:"string", sortable:false},
	// 	  {title:"Date Of Birth", field:"dob", sorter:"date", align:"center"},
	// 	  {title:"Driver", field:"car", align:"center", formatter:"tickCross", sorter:"boolean"},
	// 	],
	// });

	// var ajaxConfig = {
	// 	method:"post", //set request type to Position
	// 	// headers: {
	// 	// 	"Content-type": 'application/json; charset=utf-8', //set specific content type
	// 	// },
	// };

	// $("#ajax-trigger").click(function(){
	// 	example_table_ajax.setData("<?php echo base_url(); ?>Index/Consultar_Historico_Detalle", {key1:"value1", key2:"value2"}, ajaxConfig);
	// })

	// ../Index/Consultar_Historico_Detalle
	// aplication/controllers/Index/Consultar_Historico_Detalle
	// $("#ajax-trigger").click(function(){
	// 	table.setData('../Index/Consultar_Historico_Detalle');
	// });

	// var tableData = [
    //     {id:1, name:"Billy Bob", age:"12", gender:"male", height:1, col:"red", dob:"", cheese:1},
    //     {id:2, name:"Mary May", age:"1", gender:"female", height:2, col:"blue", dob:"14/05/1982", cheese:true},
    // ]

    // var table = new Tabulator("#example-table-ajax", {
    //   //data:tableData, //set initial table data
    // 	columns:[
	// 		{title:"Name", field:"name", sorter:"string", width:200},
    //         {title:"Progress", field:"progress", sorter:"number", formatter:"progress"},
    //         {title:"Gender", field:"gender", sorter:"string"},
    //         {title:"Rating", field:"rating", formatter:"star", align:"center", width:100},
    //         {title:"Favourite Color", field:"col", sorter:"string", sortable:false},
    //         {title:"Date Of Birth", field:"dob", sorter:"date", align:"center"},
    //         {title:"Driver", field:"car", align:"center", formatter:"tickCross", sorter:"boolean"},
	// 	],
	// });

	//Build Tabulator

	// table.setData(tableData);

	$("#ajax-trigger").click(function(){
		//table.setData('http://191.98.186.82:8080/SHEET/Index/Consultar_Historico_Detalle');
		// CuentaAJAX.Consultar_Historico_Detalle(function(obj){
		// 	console.log(obj);
		// });

		// var ajaxConfig = {
		// 	method:"POST", //set request type to Position
		// 	headers: {
		// 		"Content-type": 'application/json; charset=utf-8', //set specific content type
		// 	},
		// };

		//table.tabulator("setData", "http://191.98.186.82:8080/SHEET/Index/Consultar_Historico_Detalle");
		// table.setData("../Index/Consultar_Historico_Detalle",{}, ajaxConfig);

		//var resultado = CuentaAJAX.Consultar_Historico_Detalle();
		//console.log(resultado);

		//console.log("hola");

		// fetch('http://191.98.186.82:8080/SHEET/Index/Consultar_Historico_Detalle')
		
        //.then(response => response.json())
		// .then(json => table.setData(json.recordset))
		// .then(function(data) {
		// 	console.log('Request succeeded with JSON response', data);
		// })
		// .then(function(response) {
		// 	// Do stuff with the response
		// 	console.log(response.json());
		// })
		// .then(function(responseAsJson) {
		// 	// Do stuff with the JSON
		// 	console.log(responseAsJson);
		// })
		// .catch(function(error) {
		// 	console.log('Looks like there was a problem: \n', error);
		// });
		
		// .then(res => res.json())//response type
		//.then(data => console.log(data)); //log the data;		
		// .then(data => table.setData(data)); //log the data;		

	});

	// function callback(response) {
	// 	//return_first = response;
	// 	//use return_first variable here
	// 	console.log(response);
	//   }

	// CuentaTabulator.example_tabulator([]);

});


