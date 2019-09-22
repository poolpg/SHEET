<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    
    public function __construct() {
		parent::__construct();
		//$this->load->library('excel');
		$this->layout->setLayout('template_index');
		$this->load->model('Cuenta_model');
		$this->mssql = $this->load->database('default', TRUE );
		

    }

	public function index() {
		// COMO NO DETALLO EL TEMPLATE ENTOCNES ME CARGARA POR DEFECTO EL TEMPALTE FIRST

		// DEFINIENDO CABECERAS DEL HTML
        $this->layout->setTitle("Sistema de Reportes");
        $this->layout->setKeywords("mas keywords");
        $this->layout->setDescripcion("meta descripción");
		
		// CARGANDO ESTILOS CSS
		$this->layout->css(array(base_url()."public/css/normalize.css"));

		// CARGANDO BOOTSTRAP
		$this->layout->css(array(base_url()."public/Librerias/bootstrap-4.3.1-dist/css/bootstrap.min.css"));
		$this->layout->js(array(base_url()."public/Librerias/JQuery-3.3.1/jquery-3.3.1.min.js"));
		// CARGANDO POPPER
		$this->layout->js(array(base_url()."public/Librerias/popper.js-1.14.7/package/dist/umd/popper.min.js"));
		$this->layout->js(array(base_url()."public/Librerias/bootstrap-4.3.1-dist/js/bootstrap.min.js"));

		$saludo="hola saludando ando coriendo desnudo por la casa";
		
		echo "XXXY";

		$this->layout->view('index',compact('saludo'));
		//$this->load->view("historico_detalle_cuenta", $data);

	}

	public function login(){
		// COMO NO DETALLO EL TEMPLATE ENTOCNES ME CARGARA POR DEFECTO EL TEMPALTE FIRST
		$this->layout->setLayout('template_login');
		// DEFINIENDO CABECERAS DEL HTML
        $this->layout->setTitle("Sistema de Reportes");
        $this->layout->setKeywords("mas keywords");
        $this->layout->setDescripcion("meta descripción");
		
		// CARGANDO ESTILOS CSS
		$this->layout->css(array(base_url()."public/css/normalize.css"));

		// CARGANDO BOOTSTRAP
		$this->layout->css(array(base_url()."public/Librerias/bootstrap-4.3.1-dist/css/bootstrap.min.css"));
		$this->layout->js(array(base_url()."public/Librerias/JQuery-3.3.1/jquery-3.3.1.min.js"));
		// CARGANDO POPPER
		$this->layout->js(array(base_url()."public/Librerias/popper.js-1.14.7/package/dist/umd/popper.min.js"));
		$this->layout->js(array(base_url()."public/Librerias/bootstrap-4.3.1-dist/js/bootstrap.min.js"));

        $this->layout->view('login');

	}

	public function principal(){
		// COMO NO DETALLO EL TEMPLATE ENTOCNES ME CARGARA POR DEFECTO EL TEMPALTE FIRST
		$this->layout->setLayout('template_principal');
		// DEFINIENDO CABECERAS DEL HTML
        $this->layout->setTitle("Sistema de Reportes");
        $this->layout->setKeywords("mas keywords");
        $this->layout->setDescripcion("meta descripción");
		
		#######
		# CSS #
		#######

		$this->layout->css(array(base_url()."public/css/normalize.css"));

		// Bootstrap
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/bootstrap/css/bootstrap.css"));

		// Icons Font Awesome
		$this->layout->css(array(base_url()."public/Librerias/fontawesome-5.9.0/css/fontawesome.css"));
		$this->layout->css(array(base_url()."public/Librerias/fontawesome-5.9.0/css/brands.css"));
		$this->layout->css(array(base_url()."public/Librerias/fontawesome-5.9.0/css/solid.css"));

		// Metis core stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/css/main.css"));

		// metisMenu stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/metismenu/metisMenu.css"));

		// onoffcanvas stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/onoffcanvas/onoffcanvas.css"));

		// animate.css stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/animate.css/animate.css"));

		// For Development Only. Not required
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/css/style-switcher.css"));
		// $this->layout->less(array(base_url()."public/Librerias/Metis/assets/less/theme.less"));
		
		#######
		# JS  #
		#######

		// jQuery
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/jquery/jquery.js"));
		//$this->layout->js(array(base_url()."public/Librerias/JQuery-3.3.1/jquery-3.3.1.min.js"));

		// Bootstrap		
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/bootstrap/js/bootstrap.js"));

		// MetisMenu
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/metismenu/metisMenu.js"));

		// onoffcanvas
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/onoffcanvas/onoffcanvas.js"));

		// Screenfull
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/screenfull/screenfull.js"));

		// Metis core scripts
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/js/core.js"));

		// Metis demo scripts
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/js/app.js"));

		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/js/style-switcher.js"));


        $this->layout->view('principal');
	}

	public function historico_detalle_cuenta(){
		// COMO NO DETALLO EL TEMPLATE ENTOCNES ME CARGARA POR DEFECTO EL TEMPALTE FIRST
		$this->layout->setLayout('template_principal');
		// DEFINIENDO CABECERAS DEL HTML
        $this->layout->setTitle("Sistema de Reportes");
        $this->layout->setKeywords("mas keywords");
        $this->layout->setDescripcion("meta descripción");
		
		#######
		# CSS #
		#######

		// Bootstrap
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/bootstrap/css/bootstrap.css"));
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/bootstrap/css/bootstrap-theme.min.css"));
	  
		$this->layout->css(array(base_url()."public/Librerias/jquery-ui-1.12.1/jquery-ui.min.css"));
		//$this->layout->css(array("https://cdnjs.cloudflare.com/ajax/libs/tabulator/4.4.0/css/tabulator.min.css"));
		//$this->layout->css(array("https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.4.2/css/tabulator.min.css"));
		$this->layout->css(array(base_url()."public/Librerias/Tabulator V4.4.0/css/tabulator.min.css"));

		// Icons Font Awesome
		$this->layout->css(array(base_url()."public/Librerias/fontawesome-5.9.0/css/fontawesome.css"));
		$this->layout->css(array(base_url()."public/Librerias/fontawesome-5.9.0/css/brands.css"));
		$this->layout->css(array(base_url()."public/Librerias/fontawesome-5.9.0/css/solid.css"));

		// Metis core stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/css/main.css"));

		// metisMenu stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/metismenu/metisMenu.css"));

		// onoffcanvas stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/onoffcanvas/onoffcanvas.css"));

		// animate.css stylesheet
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/lib/animate.css/animate.css"));

		// For Development Only. Not required
		$this->layout->css(array(base_url()."public/Librerias/Metis/assets/css/style-switcher.css"));
		// $this->layout->less(array(base_url()."public/Librerias/Metis/assets/less/theme.less"));

		$this->layout->css(array(base_url()."public/css/estilos.css"));
		
		#######
		# JS  #
		#######
		
		// jQuery
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/jquery/jquery.js"));
		//$this->layout->js(array("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"));
		//$this->layout->js(array("https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"));
		//$this->layout->js(array(base_url()."public/Librerias/JQuery-3.3.1/jquery-3.3.1.min.js"));

		//$this->layout->js(array(base_url()."public/Librerias/JQuery-3.3.1/jquery-3.3.1.min.js"));
		// CARGANDO POPPER
		$this->layout->js(array(base_url()."public/Librerias/popper.js-1.14.7/package/dist/umd/popper.min.js"));
		//$this->layout->js(array(base_url()."public/Librerias/bootstrap-4.3.1-dist/js/bootstrap.min.js"));

		// Bootstrap		
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/bootstrap/js/bootstrap.js"));

		$this->layout->js(array(base_url()."public/Librerias/jquery-ui-1.12.1/jquery-ui.min.js"));

		//$this->layout->js(array("https://cdnjs.cloudflare.com/ajax/libs/tabulator/3.4.2/js/tabulator.min.js"));
		//$this->layout->js(array("https://cdnjs.cloudflare.com/ajax/libs/tabulator/4.4.0/js/tabulator.min.js"));

		$this->layout->js(array("https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.4/fetch.min.js"));
		$this->layout->js(array("https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"));

		// $this->layout->js(array(base_url()."public/Librerias/fetch-master/fetch.js"));
		// $this->layout->js(array(base_url()."public/Librerias/promise-polyfill-master/dist/polyfill.js"));

		$this->layout->js(array(base_url()."public/Librerias/Tabulator V4.4.0/js/tabulator.min.js"));



$this->layout->js(array(base_url()."public/Librerias/Tabulator V4.4.0/js/tabulator_core.min.js"));
$this->layout->js(array(base_url()."public/Librerias/Tabulator V4.4.0/js/modules/ajax.min.js"));
$this->layout->js(array(base_url()."public/Librerias/Tabulator V4.4.0/js/modules/format.min.js"));


		$this->layout->js(array(base_url()."public/Librerias/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"));
		$this->layout->js(array(base_url()."public/Librerias/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js"));
		$this->layout->css(array(base_url()."public/Librerias/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css"));

		$this->layout->js(array(base_url()."public/Librerias/bootstrap-multiselect/js/bootstrap-multiselect.js"));
		$this->layout->css(array(base_url()."public/Librerias/bootstrap-multiselect/css/bootstrap-multiselect.css"));



		// MetisMenu
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/metismenu/metisMenu.js"));

		// onoffcanvas
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/onoffcanvas/onoffcanvas.js"));

		// Screenfull
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/lib/screenfull/screenfull.js"));

		// Metis core scripts
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/js/core.js"));

		// Metis demo scripts
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/js/app.js"));
		$this->layout->js(array(base_url()."public/Librerias/Metis/assets/js/style-switcher.js"));

		// Estilos para el Modal(Info, Warning, Error, Default)
		$this->layout->css(array(base_url()."public/Librerias/contextual-modals.css"));

		$this->layout->js(array(base_url()."public/Librerias/bootstrap3-typeahead.min.js"));		
		
		// Libreria Validetta
		// $this->layout->js(array(base_url()."public/Librerias//Validetta-1.0.1/validetta.min.css"));
		// $this->layout->js(array(base_url()."public/Librerias/Validetta-1.0.1/validetta.min.js"));

		// Libreria Ok Validaciones
		$this->layout->js(array(base_url()."public/Librerias/Ok/ok.min.js"));

		$this->layout->js(array(base_url()."public/js/CuentaJS.js"));
		$this->layout->js(array(base_url()."public/js/CuentaAJAX.js"));
		$this->layout->js(array(base_url()."public/js/CuentaTabulator.js"));

        $this->layout->view('historico_detalle_cuenta');
	}

	public function administrador(){
		//$this->layout->view('index');
		$this->layout->setLayout('template_second');

        $this->layout->setTitle("Sistema de Reportes");
        $this->layout->setKeywords("mas keywords");
        $this->layout->setDescripcion("meta descripción");

        $saludo="hola saludando ando coriendo desnudo por la casa";
        $this->layout->view('administrador',compact('saludo'));

	}

	public function Operadores(){
		$are = $this->Cuenta_model->welcome_check();
		echo print_r($are);
	}

	public function Exportar_DetalleCuenta(){

		

		//$vop = 2;
		$vcod = $_POST['empresa'];
		$vcod_cliente = $_POST['cod_cliente'];
		$vtd = $_POST['documentos'];
		$vemini = $_POST['fchemini'];
		$vemifin = $_POST['fchemfin'];
		$vtbl = $_POST['tabla'];	
		$vformato = $_POST['formato'];

		$RegDetCu = $this->Cuenta_model->Contar_Registros_DetalleCuenta(2, $vcod, $vcod_cliente, $vtd, $vemini, $vemifin, $vtbl);
		$Cantidad = $RegDetCu[0]['CANT'];


		if($Cantidad > 0) {

			// $RutaRaiz = FCPATH;
			// $output = Shell_Exec('powershell -InputFormat none -ExecutionPolicy ByPass -NoProfile -Command "'.$RutaRaiz.'documents\tareas\exportar_docdet_plaintext.ps1 -OP 1   -COD \''.$vcod.'\'   -COD_CLIENTE '.$vcod_cliente.'   -TD \''.$vtd.'\'   -EMIINI '.$vemini.'   -EMIFIN '.$vemifin.'  -RUTARAIZ '.$RutaRaiz.' -FILENAME '.$vtbl.' "  ');
			// echo $output;

			// $mystring = $output;
			// $findme   = 'rows copied';
			// $pos = strpos($mystring, $findme);

			// if ($pos === false) {
			// 	echo json_encode(array('rst' => false, 'msg' => 'Error al generar el PlainText verificar la conexion a la BD ó si fueron ingresados todos los filtros de busqueda'));
			// } else {
			// 	echo json_encode(array('rst' => true, 'msg' => 'Se genero exitosamente el PlainText'));
			// }	

			$updProcessDetcu = " UPDATE PROGRESSBAR SET EXECUTED=0,TOTAL=$Cantidad, PERCENTAGE=0,EXECUTE_TIME='',DATE_ADD= GETDATE(),DATE_UPD= GETDATE() WHERE ID_PROCESS = 1 ";
			$ProcessDetcu = $this->mssql->query($updProcessDetcu);
			$this->Cuenta_model->Listar_Registros_DetalleCuenta(1, $vcod, $vcod_cliente, $vtd, $vemini, $vemifin, $vtbl, $RegDetCu[0]['CANT'] );	

			if($vformato == ".xlsx"){

				$this->load->library("excel");
				$xls = new PHPExcel();

				$columna=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ");

				$font_header = array(
					'font'  => array(
						'bold'  => true,
						'color' => array('rgb' => 'E8E8EA'),
						'size'  => 8,
						'name'  => 'Verdana'
				));
				$font_amarrillo = array(
					'font'  => array(
						'bold'  => true,
						'color' => array('rgb' => 'FFFF17'),
						'size'  => 8,
						'name'  => 'Verdana'
				));
				$font_verde = array(
					'font'  => array(
						'bold'  => true,
						'color' => array('rgb' => '92D050'),
						'size'  => 8,
						'name'  => 'Verdana'
				));
				$fondo_oscuro = array(
					'fill' => array(
						'type' => PHPExcel_Style_Fill::FILL_SOLID,
						'color' => array('rgb' => '303238')
					)
				);
				

				$xls->setActiveSheetIndex(0)->setTitle("HISTORICO DOCUMENTO DET.");
				$cabecera = array('COD','EMPRESA','ZONA','COD_VEN','VENDEDOR','COD_CLIENTE','CLIENTE','TD','DOCUMENTO','FECHA_EMISION','FECHA_VENCIMIENTO','MES_EMI','ANIO_EMI','DIAS_PLAZO','MON','TIPCAMV','TIPCAMC','IMPORTEDOC','CODAGE','AGENCIA','ITEM','PRODUCTO','PRESENTACION','UNID_KG/L','TOT_VOLUMEN','CODIGO','DESCRI','CANTI','PRECIO','UNID','VALORVTA','IGV','PRECIOVTA','VALORVTA_US','VALORVTA_MN','PRECIOVTA_US','PRECIOVTA_MN');
				
				$fil =1;
				$col = 0;
				foreach($cabecera as $field) {
					$xls->getActiveSheet()->setCellValueByColumnAndRow($col, $fil, $field);
					$xls->getActiveSheet()->getStyle($columna[$col].$fil)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

					$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($fondo_oscuro);

					if($columna[$col].$fil == "AE1" || $columna[$col].$fil == "AH1" || $columna[$col].$fil == "AI1"){ # AMARILLO -> VALORVTA, VALORVTA_US, VALORVTA_MN
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_amarrillo);
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_amarrillo);
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_amarrillo);

					}else if($columna[$col].$fil == "AG1" || $columna[$col].$fil == "AJ1" || $columna[$col].$fil == "AK1"){ # VERDE -> PRECIOVTA, PRECIOVTA_US, PRECIOVTA_MN
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_verde);
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_verde);
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_verde);

					}else{ # NEGRO -> TODO EL RESTO
						$xls->getActiveSheet()->getStyle($columna[$col].$fil)->applyFromArray($font_header);						
					}

					$col++;
				}

				$xls->getActiveSheet()->getColumnDimensionByColumn(0)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(1)->setWidth(10);

				$xls->getActiveSheet()->getColumnDimensionByColumn(2)->setWidth(10);

				$xls->getActiveSheet()->getColumnDimensionByColumn(3)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(4)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(5)->setWidth(15);
				$xls->getActiveSheet()->getColumnDimensionByColumn(6)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(7)->setWidth(10);



				$xls->getActiveSheet()->getColumnDimensionByColumn(8)->setWidth(15);
				$xls->getActiveSheet()->getColumnDimensionByColumn(9)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(10)->setWidth(19);


				$xls->getActiveSheet()->getColumnDimensionByColumn(13)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(14)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(15)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(16)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(17)->setWidth(15);
				$xls->getActiveSheet()->getColumnDimensionByColumn(18)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(19)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(20)->setWidth(10);

				$xls->getActiveSheet()->getColumnDimensionByColumn(21)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(22)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(23)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(24)->setWidth(20);

				$xls->getActiveSheet()->getColumnDimensionByColumn(25)->setWidth(15);
				$xls->getActiveSheet()->getColumnDimensionByColumn(26)->setWidth(20);
				$xls->getActiveSheet()->getColumnDimensionByColumn(27)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(28)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(29)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(30)->setWidth(10);
				$xls->getActiveSheet()->getColumnDimensionByColumn(31)->setWidth(15);
				$xls->getActiveSheet()->getColumnDimensionByColumn(32)->setWidth(15);
				$xls->getActiveSheet()->getColumnDimensionByColumn(33)->setWidth(18);
				$xls->getActiveSheet()->getColumnDimensionByColumn(34)->setWidth(18);
				$xls->getActiveSheet()->getColumnDimensionByColumn(35)->setWidth(18);
				$xls->getActiveSheet()->getColumnDimensionByColumn(36)->setWidth(18);


				$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
				$objWriter->save('./documents/files/excel/'.$vtbl.'.xlsx');

			}

			if($vformato == "Plain Text"){
				$RutaRaiz = FCPATH;
				$file = fopen($RutaRaiz.'documents\files\txt\\'.$vtbl.'.txt', "w");

				$contenido = 
						'COD'."\t".
						'EMPRESA'."\t".
						'ZONA'."\t".
						'COD_VEN'."\t".
						'VENDEDOR'."\t".
						'COD_CLIENTE'."\t".
						'CLIENTE'."\t".
						'TD'."\t".
						'DOCUMENTO'."\t".
						'FECHA_EMISION'."\t".
						'FECHA_VENCIMIENTO'."\t".
						'MES_EMI'."\t".
						'ANIO_EMI'."\t".
						'DIAS_PLAZO'."\t".
						'MON'."\t".
						'TIPCAMV'."\t".
						'TIPCAMC'."\t".
						'IMPORTEDOC'."\t".
						'CODAGE'."\t".
						'AGENCIA'."\t".
						'ITEM'."\t".
						'PRODUCTO'."\t".
						'PRESENTACION'."\t".
						'UNID_KG/L'."\t".
						'TOT_VOLUMEN'."\t".
						'CODIGO'."\t".
						'DESCRI'."\t".
						'CANTI'."\t".
						'PRECIO'."\t".
						'UNID'."\t".
						'VALORVTA'."\t".
						'IGV'."\t".
						'PRECIOVTA'."\t".
						'VALORVTA_US'."\t".
						'VALORVTA_MN'."\t".
						'PRECIOVTA_US'."\t".
						'PRECIOVTA_MN'."\n";

				fwrite($file, $contenido); // SE CREA EL ARCHIVO AL INSERTARLE CONTENIDO EN ESTE CASO LE INSERTO VACIO
				fclose($file);
			}

		} else {
			echo json_encode(array('rst' => true, 'msg' => 'Se Proceso Exitosamente', 'cant'=> 0 ));
		}


	}

	public function ProgressBarDetalleCuenta_xlsx() {

		$RutaRaiz = FCPATH;

		$this->load->library("excel");
		$columna=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ");
		
		$voffset = $_POST['offset'];
		$vbatch  = $_POST['batch'];
		$vtabla  = $_POST['tabla'];

		$font = array(
			'font'  => array(
				'bold'  => false,
				'color' => array('rgb' => '000000'),
				'size'  => 8,
				'name'  => 'Verdana'
		));

		$recorrer = " 	SELECT 
						COD,EMPRESA,ZONA,COD_VEN,VENDEDOR,COD_CLIENTE,CLIENTE,TD,DOCUMENTO,FECHA_EMISION,FECHA_VENCIMIENTO,MES_EMI,ANIO_EMI,DIAS_PLAZO,MON,TIPCAMV,TIPCAMC,IMPORTEDOC,CODAGE,AGENCIA,ITEM,PRODUCTO,PRESENTACION,UNID_KG_LT,TOT_VOLUMEN,CODIGO,DESCRI,CANTI,PRECIO,UNID,VALORVTA,IGV,PRECIOVTA,VALORVTA_US,VALORVTA_MN,PRECIOVTA_US,PRECIOVTA_MN,ID
						FROM $vtabla 
						WHERE ID BETWEEN $voffset AND $voffset 
						ORDER BY ID; ";

		$recorrer = $this->mssql->query($recorrer);		

		$xls = PHPExcel_IOFactory::createReader('Excel2007');
		$xls = $xls->load($RutaRaiz.'documents\files\excel\\'.$vtabla.'.xlsx'); // Empty Sheet
		$xls->setActiveSheetIndex(0);

		$fila = 0;
		$col = 0;
		foreach ($recorrer->result() as $rows) {
			$fila = $voffset + 1;

			$xls->getActiveSheet()->setCellValueExplicit($columna[$col+0].$fila, $rows->COD,PHPExcel_Cell_DataType::TYPE_STRING)->getStyle($columna[$col+0].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+1].$fila, $rows->EMPRESA)->getStyle($columna[$col+1].$fila)->applyFromArray($font); // 1
			$xls->getActiveSheet()->SetCellValue($columna[$col+2].$fila, $rows->ZONA)->getStyle($columna[$col+2].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+3].$fila, $rows->COD_VEN)->getStyle($columna[$col+3].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // 2
			$xls->getActiveSheet()->SetCellValue($columna[$col+4].$fila, $rows->VENDEDOR)->getStyle($columna[$col+4].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->setCellValueExplicit($columna[$col+5].$fila, $rows->COD_CLIENTE,PHPExcel_Cell_DataType::TYPE_STRING)->getStyle($columna[$col+5].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+6].$fila, $rows->CLIENTE)->getStyle($columna[$col+6].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+7].$fila, $rows->TD)->getStyle($columna[$col+7].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->setCellValueExplicit($columna[$col+8].$fila, $rows->DOCUMENTO,PHPExcel_Cell_DataType::TYPE_STRING)->getStyle($columna[$col+8].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+9].$fila, $rows->FECHA_EMISION)->getStyle($columna[$col+9].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+10].$fila, $rows->FECHA_VENCIMIENTO)->getStyle($columna[$col+10].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+11].$fila, $rows->MES_EMI)->getStyle($columna[$col+11].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+12].$fila, $rows->ANIO_EMI)->getStyle($columna[$col+12].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+13].$fila, $rows->DIAS_PLAZO)->getStyle($columna[$col+13].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+14].$fila, $rows->MON)->getStyle($columna[$col+14].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+15].$fila, $rows->TIPCAMV)->getStyle($columna[$col+15].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+16].$fila, $rows->TIPCAMC)->getStyle($columna[$col+16].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+17].$fila, $rows->IMPORTEDOC)->getStyle($columna[$col+17].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->setCellValueExplicit($columna[$col+18].$fila, $rows->CODAGE,PHPExcel_Cell_DataType::TYPE_STRING)->getStyle($columna[$col+18].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+19].$fila, $rows->AGENCIA)->getStyle($columna[$col+19].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+20].$fila, $rows->ITEM)->getStyle($columna[$col+20].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+21].$fila, $rows->PRODUCTO)->getStyle($columna[$col+21].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+22].$fila, $rows->PRESENTACION)->getStyle($columna[$col+22].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+23].$fila, $rows->UNID_KG_LT)->getStyle($columna[$col+23].$fila)->applyFromArray($font)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$xls->getActiveSheet()->SetCellValue($columna[$col+24].$fila, $rows->TOT_VOLUMEN)->getStyle($columna[$col+24].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->setCellValueExplicit($columna[$col+25].$fila, $rows->CODIGO,PHPExcel_Cell_DataType::TYPE_STRING)->getStyle($columna[$col+25].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+26].$fila, $rows->DESCRI)->getStyle($columna[$col+26].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+27].$fila, $rows->CANTI)->getStyle($columna[$col+27].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+28].$fila, $rows->PRECIO)->getStyle($columna[$col+28].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+29].$fila, $rows->UNID)->getStyle($columna[$col+29].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+30].$fila, $rows->VALORVTA)->getStyle($columna[$col+30].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+31].$fila, $rows->IGV)->getStyle($columna[$col+31].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+32].$fila, $rows->PRECIOVTA)->getStyle($columna[$col+32].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+33].$fila, $rows->VALORVTA_US)->getStyle($columna[$col+33].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+34].$fila, $rows->VALORVTA_MN)->getStyle($columna[$col+34].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+35].$fila, $rows->PRECIOVTA_US)->getStyle($columna[$col+35].$fila)->applyFromArray($font);
			$xls->getActiveSheet()->SetCellValue($columna[$col+36].$fila, $rows->PRECIOVTA_MN)->getStyle($columna[$col+36].$fila)->applyFromArray($font);

			$updAvanProcessDetcu = " UPDATE $vtabla SET AVANCE= 1 WHERE ID = $voffset ";
			$AvanProcessDetcu = $this->mssql->query($updAvanProcessDetcu);

			$updProcessDetcu = " UPDATE PROGRESSBAR SET EXECUTED= EXECUTED + 1, DATE_UPD= GETDATE() WHERE ID_PROCESS = 1 ";
			$ProcessDetcu = $this->mssql->query($updProcessDetcu);
		}

		$objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel2007');
		$objWriter->save($RutaRaiz.'documents\files\excel\\'.$vtabla.'.xlsx');

		$sqlProgress = " SELECT EXECUTED,TOTAL, DATE_ADD,DATE_UPD FROM PROGRESSBAR WHERE ID_PROCESS = 1 ";
		$rslProgress = $this->mssql->query($sqlProgress);
		$arrProgressDetcu = $rslProgress->result_array();

		//echo print_r($arr);

		$percentage = round(($arrProgressDetcu[0]['EXECUTED'] * 100) / $arrProgressDetcu[0]['TOTAL'], strlen($arrProgressDetcu[0]['TOTAL']));

		$date_add = new DateTime($arrProgressDetcu[0]['DATE_ADD']);
		$date_upd = new DateTime($arrProgressDetcu[0]['DATE_UPD']);
		$diff = $date_add->diff($date_upd);

		$execute_time = '';

		if ($diff->days > 0) {
			$execute_time .= $diff->days.' dias';
		}
		if ($diff->h > 0) {
			$execute_time .= ' '.$diff->h.' horas';
		}
		if ($diff->i > 0) {
			$execute_time .= ' '.$diff->i.' minutos';
		}

		if ($diff->s > 1) {
			$execute_time .= ' '.$diff->s.' segundos';
		} else {
			$execute_time .= ' 1 segundo';
		}

		$updProcessDetcu2 = " UPDATE PROGRESSBAR SET DATE_UPD= GETDATE(),PERCENTAGE= ".$percentage.", EXECUTE_TIME = '".(string)$execute_time."' WHERE ID_PROCESS = 1 ";
		$ProcessDetcu2 = $this->mssql->query($updProcessDetcu2);

		$row = array(
			'executed' => $arrProgressDetcu[0]['EXECUTED'],
			'total' => $arrProgressDetcu[0]['TOTAL'],
			//'percentage' => round($percentage, 0),
			'percentage' => $percentage,
			'execute_time' => $execute_time,
			//'datos' => $voffset.'--'.$row->COD,
			'dias' => $diff->days
		);
		
		echo json_encode($row);

	}

	public function ResetProgressBar(){
		$id = $_POST['id'];
		$rst = $this->Cuenta_model->ResetProgressBar($id);
		echo $rst;
	}

	public function ProgressBarDetalleCuenta_text(){

		$RutaRaiz = FCPATH;

		$voffset = $_POST['offset'];
		$vbatch  = $_POST['batch'];
		$vtabla  = $_POST['tabla'];

		$file = fopen($RutaRaiz.'documents\files\txt\\'.$vtabla.'.txt', "a");

		$recorrer = " 	SELECT 
						COD,EMPRESA,ZONA,COD_VEN,VENDEDOR,COD_CLIENTE,CLIENTE,TD,DOCUMENTO,FECHA_EMISION,FECHA_VENCIMIENTO,MES_EMI,ANIO_EMI,DIAS_PLAZO,MON,TIPCAMV,TIPCAMC,IMPORTEDOC,CODAGE,AGENCIA,ITEM,PRODUCTO,PRESENTACION,UNID_KG_LT,TOT_VOLUMEN,CODIGO,DESCRI,CANTI,PRECIO,UNID,VALORVTA,IGV,PRECIOVTA,VALORVTA_US,VALORVTA_MN,PRECIOVTA_US,PRECIOVTA_MN,ID
						FROM $vtabla 
						WHERE ID BETWEEN $voffset AND $voffset 
						ORDER BY ID; ";

		$recorrer = $this->mssql->query($recorrer);	

		foreach ($recorrer->result() as $rows) {
			
			fwrite($file,
							$rows->COD."\t".
							$rows->EMPRESA."\t".
							$rows->ZONA."\t".
							$rows->COD_VEN."\t".
							$rows->VENDEDOR."\t".
							$rows->COD_CLIENTE."\t".
							$rows->CLIENTE."\t".
							$rows->TD."\t".
							$rows->DOCUMENTO."\t".
							$rows->FECHA_EMISION."\t".
							$rows->FECHA_VENCIMIENTO."\t".
							$rows->MES_EMI."\t".
							$rows->ANIO_EMI."\t".
							$rows->DIAS_PLAZO."\t".
							$rows->MON."\t".
							$rows->TIPCAMV."\t".
							$rows->TIPCAMC."\t".
							$rows->IMPORTEDOC."\t".
							$rows->CODAGE."\t".
							$rows->AGENCIA."\t".
							$rows->ITEM."\t".
							$rows->PRODUCTO."\t".
							$rows->PRESENTACION."\t".
							$rows->UNID_KG_LT."\t".
							$rows->TOT_VOLUMEN."\t".
							$rows->CODIGO."\t".
							$rows->DESCRI."\t".
							$rows->CANTI."\t".
							$rows->PRECIO."\t".
							$rows->UNID."\t".
							$rows->VALORVTA."\t".
							$rows->IGV."\t".
							$rows->PRECIOVTA."\t".
							$rows->VALORVTA_US."\t".
							$rows->VALORVTA_MN."\t".
							$rows->PRECIOVTA_US."\t".
							$rows->PRECIOVTA_MN."\t". PHP_EOL);

							//fwrite($file, "Añadimos línea ".$voffset . PHP_EOL);

			$updAvanProcessDetcu = " UPDATE $vtabla SET AVANCE= 1 WHERE ID = $voffset ";
			$AvanProcessDetcu = $this->mssql->query($updAvanProcessDetcu);

			$updProcessDetcu = " UPDATE PROGRESSBAR SET EXECUTED= EXECUTED + 1, DATE_UPD= GETDATE() WHERE ID_PROCESS = 1 ";
			$ProcessDetcu = $this->mssql->query($updProcessDetcu);
		}	

		fclose($file);

		$sqlProgress = " SELECT EXECUTED,TOTAL, DATE_ADD,DATE_UPD FROM PROGRESSBAR WHERE ID_PROCESS = 1 ";
		$rslProgress = $this->mssql->query($sqlProgress);
		$arrProgressDetcu = $rslProgress->result_array();

		//echo print_r($arr);

		$percentage = round(($arrProgressDetcu[0]['EXECUTED'] * 100) / $arrProgressDetcu[0]['TOTAL'], strlen($arrProgressDetcu[0]['TOTAL']));

		$date_add = new DateTime($arrProgressDetcu[0]['DATE_ADD']);
		$date_upd = new DateTime($arrProgressDetcu[0]['DATE_UPD']);
		$diff = $date_add->diff($date_upd);

		$execute_time = '';

		if ($diff->days > 0) {
			$execute_time .= $diff->days.' dias';
		}
		if ($diff->h > 0) {
			$execute_time .= ' '.$diff->h.' horas';
		}
		if ($diff->i > 0) {
			$execute_time .= ' '.$diff->i.' minutos';
		}

		if ($diff->s > 1) {
			$execute_time .= ' '.$diff->s.' segundos';
		} else {
			$execute_time .= ' 1 segundo';
		}

		$updProcessDetcu2 = " UPDATE PROGRESSBAR SET DATE_UPD= GETDATE(),PERCENTAGE= ".$percentage.", EXECUTE_TIME = '".(string)$execute_time."' WHERE ID_PROCESS = 1 ";
		$ProcessDetcu2 = $this->mssql->query($updProcessDetcu2);

		$row = array(
			'executed' => $arrProgressDetcu[0]['EXECUTED'],
			'total' => $arrProgressDetcu[0]['TOTAL'],
			//'percentage' => round($percentage, 0),
			'percentage' => $percentage,
			'execute_time' => $execute_time,
			//'datos' => $voffset.'--'.$row->COD,
			'dias' => $diff->days
		);
		
		echo json_encode($row);

	}

	public function DownloadPlainText(){
		$this->load->helper('download');

		$RutaRaiz = FCPATH;

		$archivo = $_POST['file'];
		
		$arch = $RutaRaiz.'documents\files\txt\\'.$archivo.'.txt';
		// $arch = $ruta."Documento_0001FTF0040000022-588fffd0bfa20".".pdf";
		header('Content-Description: File Transfer');
		header('Content-Type: text/html');
		header('Content-Disposition: inline; filename='.basename($arch));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($arch));
		ob_clean();
		flush();
		readfile($arch);

		echo $RutaRaiz.'documents\files\txt\\'.$archivo.'.txt';

		//force_download($RutaRaiz.'documents\files\txt\\'.$archivo.'.txt', NULL);

	}

	public function DeleteTableTMP(){
		$this->Cuenta_model->DeleteTableTMP($_POST['file']);

	}

	public function ObtenerCliente(){ // Consulta para usar el input txt desplegable
		$result = $this->Cuenta_model->ObtenerCliente($_GET['query']);
	}

	public function Consultar_Historico_Detalle(){
		//build data array
		// $data = [
		// 	["id"=>1, "name"=>"Billy Bob", "progress"=>"12", "gender"=>"male", "height"=>1, "col"=>"red", "dob"=>"", "driver"=>1],
		// 	["id"=>2, "name"=>"Mary May", "progress"=>"1", "gender"=>"female", "height"=>2, "col"=>"blue", "dob"=>"14/05/1982", "driver"=>true],
		// 	["id"=>3, "name"=>"Christine Lobowski", "progress"=>"42", "height"=>0, "col"=>"green", "dob"=>"22/05/1982", "driver"=>"true"],
		// 	["id"=>4, "name"=>"Brendon Philips", "progress"=>"125", "gender"=>"male", "height"=>1, "col"=>"orange", "dob"=>"01/08/1980"],
		// 	["id"=>5, "name"=>"Margret Marmajuke", "progress"=>"16", "gender"=>"female", "height"=>5, "col"=>"yellow", "dob"=>"31/01/1999"],
		// ];

		$data = [
			["COD"=>"0002","EMPRESA"=>"CAISAC","ZONA"=>"TRUJILLO-PAIJAN-VIRU-CHAO (CADENA TIENDA","COD_VEN"=>"313-3","VENDEDOR"=>"CARLOS FEIJO ORTIZ","COD_CLIENTE"=>"20133417452","CLIENTE"=>"AGROPECUARIA CHIMU SRL","TD"=>"FT","DOCUMENTO"=>"F0040008363","FECHA_EMISION"=>"09\/01\/2019","FECHA_VENCIMIENTO"=>"10\/03\/2019","MES_EMI"=>"Enero","ANIO_EMI"=>"2019","DIAS_PLAZO"=>60,"MON"=>"US","TIPCAMV"=>"3.350","TIPCAMC"=>"3.347","IMPORTEDOC"=>"2301.35","CODAGE"=>"0001","AGENCIA"=>"LIMA","ITEM"=>"0001","PRODUCTO"=>"SANIX","PRESENTACION"=>"20.000","UNID_KG_LT"=>"KG","TOT_VOLUMEN"=>"360.000000","CODIGO"=>"2110090003","DESCRI"=>"SANIX (BALDE X 20 KG) FITOCICATRIZANTE","CANTI"=>"18.000","PRECIO"=>"108.35","UNID"=>"UND","VALORVTA"=>"1950.30","IGV"=>"351.05","PRECIOVTA"=>"2301.35","VALORVTA_US"=>"1950.3000000000000000000","VALORVTA_MN"=>"6527.65410","PRECIOVTA_US"=>"2301.3500000000000000000","PRECIOVTA_MN"=>"7702.61845"],
			["COD"=>"0002","EMPRESA"=>"CAISAC","ZONA"=>"TRUJILLO-PAIJAN-VIRU-CHAO (CADENA TIENDA","COD_VEN"=>"313-3","VENDEDOR"=>"CARLOS FEIJO ORTIZ","COD_CLIENTE"=>"20133417452","CLIENTE"=>"AGROPECUARIA CHIMU SRL","TD"=>"FT","DOCUMENTO"=>"F0040008410","FECHA_EMISION"=>"11\/01\/2019","FECHA_VENCIMIENTO"=>"12\/03\/2019","MES_EMI"=>"Enero","ANIO_EMI"=>"2019","DIAS_PLAZO"=>60,"MON"=>"US","TIPCAMV"=>"3.343","TIPCAMC"=>"3.341","IMPORTEDOC"=>"2812.77","CODAGE"=>"0001","AGENCIA"=>"LIMA","ITEM"=>"0001","PRODUCTO"=>"SANIX","PRESENTACION"=>"20.000","UNID_KG_LT"=>"KG","TOT_VOLUMEN"=>"440.000000","CODIGO"=>"2110090003","DESCRI"=>"SANIX (BALDE X 20 KG) FITOCICATRIZANTE","CANTI"=>"22.000","PRECIO"=>"108.35","UNID"=>"UND","VALORVTA"=>"2383.70","IGV"=>"429.07","PRECIOVTA"=>"2812.77","VALORVTA_US"=>"2383.7000000000000000000","VALORVTA_MN"=>"7963.94170","PRECIOVTA_US"=>"2812.7700000000000000000","PRECIOVTA_MN"=>"9397.46457"]
		];
		
		// return JSON formatted data
		echo(json_encode($data));
		//echo(json_encode(["last_page"=>10, "data"=>$data]));

		// $fchemini = $_POST['fchemini'];
		// $fchemfin = $_POST['fchemfin'];
		// $cod_cliente = $_POST['cod_cliente'];
		// $empresa = $_POST['empresa'];
		// $documentos = $_POST['documentos'];

		// $fchemini = '01/01/2019';
		// $fchemfin = '19/09/2019';
		// $cod_cliente = '20133417452';
		// $empresa = '0002,0003,0004,0016';
		// $documentos = 'FT';

		// $this->Cuenta_model->Consultar_Historico_Detalle($empresa, $cod_cliente, $documentos, $fchemini, $fchemfin);

	}

}
