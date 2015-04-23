<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//Asignacion de Rest para nuestro Web service
require(APPPATH.'/libraries/REST_Controller.php');
 
class Productos extends REST_Controller {
     public function __construct()
    {
        parent::__construct();
        $this->load->model('consultas_model');
        $this->load->model('generic_model');
        $this->load->helper(array('utils_helper','url'));
       // $this->load->helper('url');
        $this->load->database('default');

    }

    /* Esta funcion es para obtener todos los productos registrados en el sistema*/
    function all_get()
    {
        $data['get_producto_all'] = $this->consultas_model->get_producto_all();
        $this->response($data);
    }
    //devuelve el stock disponible del producto 
    function stockDisponible_get($id)
    {
        $datastock['get_stock_disponible'] = $this->consultas_model->get_stock_disponible($id);
        $this->response($datastock);
    }
    //devuelte el costo promedio del producto
    function costoPromedio_get($id){
        $costoP['get_costo_promedio'] = $this->consultas_model->get_costo_promedio($id);
        $this->response($costoP);
    }
    //decuelve el ultimo costo del producto
    function costoUltimo_get($id){
        $costoU['get_costo_ultimo'] = $this->consultas_model->get_costo_ultimo($id);
        $this->response($costoU);    
    }
    //obtenemos el costo de inventario por producto 
    function costoInventario_get($id){
        $costoI['get_costo_inventario'] = $this->consultas_model->get_costo_inventario($id);
        $this->response($costoI); 
    }
    //obtenemos el precio del producto aplicando iva, determinando asi el costo final
    function precioProducto_get($id,$price_tipo){
        $precioP['get_precio_prod'] = $this->consultas_model->get_precio_prod($id,$price_tipo);
        $this->response($precioP); 
        
    }
    //devuelve la informacion del producto pasando el id del producto
    function infoProducto_get($id){
        $datainfo['get_product_data'] = $this->consultas_model->get_product_data($id);
        $this->response($datainfo);
    }

}