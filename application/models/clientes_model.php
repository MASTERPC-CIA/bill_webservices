<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clientes_model extends CI_Model
{
    private $ci;
    public function __construct()
    {
        parent::__construct();
        $this->ci = & get_instance();
    }

    /* La informacion del Cliente */
    public function get_datos_cliente($product_id) {
        $fields = '*';
        $product_data = $this->ci->generic_model->get_data( 
                    'billing_cliente', 
                    array('PersonaComercio_cedulaRuc'=>$product_id), 
                    $fields, 
                    null, 
                    1
                );
        return $product_data;   
    }

     
    
    public function tipo_cliente($product_id) {
        $fields = 'ct.tipo';
        $join_cluase = array('0' => array('table'=>'billing_clientetipo ct', 'condition'=>'ct.idclientetipo = c.clientetipo_idclientetipo'));
        $where_data = array('c.PersonaComercio_cedulaRuc' => $product_id);
        $p = $this->ci->generic_model->get_join('billing_cliente c', $where_data, $join_cluase, $fields, 1, null, null );
        
        $tipoC = $p->tipo;
        //return $fields;

        $precios_prod = array('price'=>$tipoC);
        return $precios_prod;
    }
     
}
/*
 * end of application/models/clientes_model.php
 */