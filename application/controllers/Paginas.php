<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    // public function index() {
	// 	$this->load->view('welcome_message');
    // }
    
	public function ver($pagina = 'inicio') {
        //$this->load->view('welcome_message');
        
        // if (!file_exists(APPPATH.'views/paginas/'.$pagina.'.php')){
        // // Cáspita ... no tenemos una pagina para esto!
        //     show_404();
        // }

        // $datos['título'] = ucfirst($pagina); // Capitaliza la primera letra
        // $this->load->view('plantillas/cabecera', $datos);
        // $this->load->view('paginas/'.$pagina, $datos);
        // $this->load->view('plantillas/pie', $datos); 
        
        //$this->load->view('paginas/inicio.php');

        //$this->load->view('index');

        // header("Content-type: application/vnd.ms-excel");
        // header("Content-Disposition: attachment; filename=gestion_llamadas.xls");
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0,pre-check=0");

        // header('Content-type: application/vnd.ms-excel');
        // header("Content-Disposition: attachment; filename=nombre_del_archivo.xls");
        // header("Pragma: no-cache");
        // header("Expires: 0");

        // header('Content-Type: application/vnd.ms-excel'); 
        // $filename = "Reports".date("dmY-His").".xls"; 
        // header('Content-Disposition: attachment;filename='.$filename .' '); 
        // header('Cache-Control: max-age=0'); 
        // $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
        // $objWriter->save('php://output'); 

        // echo "<table>";
        // for($i=0;$i<=0;$i++){
        //     echo "<tr>";
        //     echo "<td align=\"center\" style=\"background-color:blue;color:white;\">".$i."</td>";
        //     echo "</tr>";
        // }
        // echo "</table>";

        //header ( "Content-type: application/vnd.ms-excel" );
        //header ( "Content-Disposition: attachment; filename=foo_bar.xls" );

        // header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        // header("Content-Disposition: attachment; filename=abc.xls");  //File name extension was wrong
        // header("Expires: 0");
        // header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        // header("Cache-Control: private",false);
        // echo "Some Text"; //no ending ; here

        // header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        // header("Content-Disposition: attachment;filename=\"filename.xlsx\"");
        // header("Cache-Control: max-age=0");

        $filename ="excelreport.xls";
        $contents = "testdata1 \t testdata2 \t testdata3 \t \n";
        header('Content-type: application/ms-excel');
        header('Content-Disposition: attachment; filename='.$filename);
        echo $contents;

	}
}