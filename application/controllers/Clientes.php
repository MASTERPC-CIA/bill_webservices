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
    function datosCliente_get($id){
        $dataTipo['get_client_data'] = $this->clientes_model->get_client_data($id);
        $this->response($dataTipo);
        //$this->load->view('vista_cliente',$dataTipo);
    }
    //devuelte el tipo de cliente
    function tipoCliente_get($id){
        $dataTipo['tipo_cliente'] = $this->clientes_model->tipo_cliente($id);
        $this->response($dataTipo);
        //$this->load->view('vista_cliente',$dataTipo);
    }
    //Descuendo maximo permitido
    function descuentoMaximo_get($desc_client, $desc_tipo_client){
        $dataTipo['get_max_descuento'] = $this->clientes_model->get_max_descuento($desc_client, $desc_tipo_client);
        $this->response($dataTipo);
        //$this->load->view('vista_cliente',$dataTipo);
    }
    //Cupo de credito
    function cupoCredito_get($id){
        $dataTipo['get_cupo_credito'] = $this->clientes_model->get_cupo_credito($id);
        $this->response($dataTipo);
        //$this->load->view('vista_cliente',$dataTipo);
    }
	
	
}
?>