<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Asignacion de Rest para nuestro Web service
require(APPPATH.'/libraries/REST_Controller.php');
 
class Productos_cliente extends CI_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model('clientes_model');
        $this->load->model('generic_model');
        $this->load->helper('url');
        $this->load->database('default');

    }
    //respuesta todos los productos  en bd
    function rest_productos_all()
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/all');
        echo $homepage;
    }
    //respuesta stok disponible del producto
    function rest_productos_stockDisponible($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/stockDisponible/'.$id);
        echo $homepage;
    }
    //respuesta el costo promedio del producto
    function rest_productos_costoPromedio($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/costoPromedio/'.$id);
        echo $homepage;
    }
    //respuesta el ultimo costo del producto
    function rest_productos_costoUltimo($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/costoUltimo/'.$id);
        echo $homepage;
    }
    //respuesta el costo de inventario por producto 
    function rest_productos_costoInventario($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/costoInventario/'.$id);
        echo $homepage;
    }
    //respuesta el precio del producto aplicando iva, determinando asi el costo final
    function rest_productos_precioProducto($id,$price_tipo)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/precioProducto/'.$id.'/'.$price_tipo);
        echo $homepage;
    }
    //respuesta informacion del producto
    function rest_productos_infoProducto($id)
    {
        $homepage = file_get_contents('http://wsbillingsof.billingsof.com/index.php/productos/infoProducto/'.$id);
        echo $homepage;
    }

}