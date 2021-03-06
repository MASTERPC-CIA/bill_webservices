<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Clientes_model extends CI_Model
{
    private $ci;
    private $obj_cuentasxcobrar;

    public function __construct()
    {
        parent::__construct();
        $this->ci = & get_instance();
        $this->ci->load->library('cuentasxcobrar');
        $this->obj_cuentasxcobrar = new Cuentasxcobrar();
    }

     
    /*Devuelve el tipo de cliente*/
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

    /*devuelve los datos del cliente*/
    public function get_client_data($client_id) {
        $join_cluase = array(
            '0' => array('table'=>'billing_clientetipo ct','condition'=>'c.clientetipo_idclientetipo = ct.idclientetipo')
        );
        
        $client_data = $this->ci->generic_model->get_join(
                    'billing_cliente c', 
                    array('c.PersonaComercio_cedulaRuc'=>$client_id),
                    $join_cluase, 
                    'c.PersonaComercio_cedulaRuc, c.nombres, c.apellidos, c.razonsocial razonsocial, c.direccion, c.diasCredito dias_credito, c.telefonos, c.celular, c.email, c.clientetipo_idclientetipo tipo_id, c.descuentomaxporcent desc_client, c.cupocredito cupo_credito, c.vendedor_id vendedor_id, ct.descuento desc_ct', 
                    1 
                );
        return $client_data;
    }
    
    /* Devuelve el maximo descuento permitido al cliente   */
    public function get_max_descuento($desc_client, $desc_tipo_client) { 
         /* 
          * establecemos el descuento maximo qu se puede aplicar al cliente
          * se aplica el mayor, sea el individual o el descuento por tipo
          */
         $desc_max = $desc_client;
         if($desc_tipo_client > $desc_max){
             $desc_max = $desc_tipo_client;
         }
         return $desc_max;
    }
/*Devuelve el cupo disponible de credito*/
    public function get_cupo_credito($client_id){
         $cupo_client = $this->ci->generic_model->get(
                    'billing_cliente', 
                    array('PersonaComercio_cedulaRuc'=>$client_id), 
                    'cupocredito,cupo_temporal', 
                    $order_by = null, 
                    1 
                 );
         $cupo_asignado = $cupo_client->cupocredito + $cupo_client->cupo_temporal;
         $tot_ch_custodio = $this->ci->generic_model->sum_table_field( 
                    'bill_chequescustodio', 
                    'valorcheque', 
                    array('estado'=>'1','cliente_cedulaRuc'=>$client_id) 
                 );   
         $tot_cxc = $this->obj_cuentasxcobrar->get_client_saldo($client_id);
         $cupo_disponible = $cupo_asignado - $tot_ch_custodio - $tot_cxc;
         return number_decimal($cupo_disponible);
    }

     
}
/*
 * end of application/models/clientes_model.php
 */