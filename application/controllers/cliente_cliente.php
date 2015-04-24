<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Asignacion de Rest para nuestro Web service
require(APPPATH.'/libraries/REST_Controller.php');
 
class cliente_cliente extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->model('generic_model');
        $this->load->helper('url');
        $this->load->database('default');

    }

    function rest_client_datosCliente($id)
    {
        $homepage = file_get_contents('http://127.0.0.1:8080/ws_billWeb/index.php/clientes/datosCliente/'.$id);
        echo $homepage;
    }
    function rest_client_tipoCliente($id)
    {
        $homepage = file_get_contents('http://127.0.0.1:8080/ws_billWeb/index.php/clientes/tipoCliente/'.$id);
        echo $homepage;
    }

}