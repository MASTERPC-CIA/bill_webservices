<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Asignacion de Rest para nuestro Web service
require(APPPATH.'/libraries/REST_Controller.php');
 
class Cliente_cliente extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->model('generic_model');
        $this->load->helper('url');
        $this->load->database('default');

    }
//muestra los datos de un cliente
    function rest_client_datosCliente($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/clientes/datosCliente/'.$id);
        echo $homepage;
    }
//muestra el tipo de cliente
    function rest_client_tipoCliente($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/clientes/tipoCliente/'.$id);
        echo $homepage;
    }
//obtenemos el descuento maximo de dos parámetros    
    function rest_client_DescuentoMax($desc_client, $desc_tipo_client)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/clientes/descuentoMaximo/'.$desc_client.'/'.$desc_tipo_client);
        echo $homepage;
    }
//Se presente el cupo de credito 
    function rest_client_Cupo($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/clientes/cupoCredito/'.$id);
        echo $homepage;
    }


}