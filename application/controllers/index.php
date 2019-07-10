<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->layout->setLayout('template_first');
    }

	public function index() {
        //$this->layout->view('index');

        $this->layout->setTitle("Otro title con ñandú");
        $this->layout->setKeywords("mas keywords");
        $this->layout->setDescripcion("meta descripción");
        //llamamos a una librería js
        //$this->layout->js(array(base_url()."public/js/libreria.js"));
        //llamamos a una librería css
        $this->layout->css(array(base_url()."public/css/normalize.css"));
        $saludo="hola saludando ando coriendo desnudo por la casa";
        $this->layout->view('index',compact('saludo'));

	}
}