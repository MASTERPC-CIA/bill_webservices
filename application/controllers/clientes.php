<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Asignacion de Rest para nuestro Web service
require(APPPATH.'/libraries/REST_Controller.php');
 
class clientes extends REST_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->model('generic_model');
        $this->load->helper('url');
        $this->load->database('default');

    }
     
    //devuelve los datos del cliente
    function datosCliente_get($id)
    {
        $dataClient['get_datos_cliente'] = $this->clientes_model->get_datos_cliente($id);
        $this->response($dataClient);
        //$this->load->view('vista_cliente',$dataClient);
    }
    //devuelte el tipo de cliente
    function tipoCliente_get($id){
        $dataTipo['tipo_cliente'] = $this->clientes_model->tipo_cliente($id);
        $this->response($dataTipo);
        //$this->load->view('vista_cliente',$dataTipo);
    }
    

}