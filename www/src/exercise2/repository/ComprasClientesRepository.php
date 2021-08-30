<?php

namespace src\exercise2\repository;

use DateTime;
use src\exercise2\entity\CompraCliente;
use src\exercise2\entity\ComprasClientes;

require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/exercise2/entity/ComprasClientes.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/exercise2/entity/CompraCliente.php';

class ComprasClientesRepository{
    
    /**
     * Devuelve un obj ComprasClientes con las fechas de recompra por producto o un mensaje de error 
     * 
     * @return ComprasClientes
     */
    public function getFechasRecompraPorProducto(): ComprasClientes{       
        $comprasCliente = $this->getArrayCompras();
        if(!is_array($comprasCliente)){
            return false;
        }
        //Obtiene todas las fechas de compras por sku
        $comprasPorSku = [];
        foreach($comprasCliente['customer']['purchases'] as $compras){
            foreach($compras['products'] as $atributo){
                $comprasPorSku[$atributo['sku']]['fechas'][] = $compras['date'];
                $comprasPorSku[$atributo['sku']]['name']     = $atributo['name'];
                $comprasPorSku[$atributo['sku']]['sku']      = $atributo['sku'];
            }     
        }
   
        $comprasClienteDifFechas = $this->getDifFechasCompras($comprasPorSku);
        $comprasClienteFechasRecompra = $this->getFechasRecompraSku($comprasClienteDifFechas);
        $comprasClientesEntity = new ComprasClientes();
        foreach($comprasClienteFechasRecompra as $compraPorSku){
           $comprasClientesEntity->addComprasClientes(new CompraCliente($compraPorSku)); 
        }
        
        return $comprasClientesEntity;       
    }
    
    /**
     * Lee el json del cliente y lo convierte en array
     * 
     * @return array
     */
    private function getArrayCompras(){
        $data = file_get_contents("../../../assets/json/purchases-v2.json");
        return $comprasCliente = json_decode($data, true);
    }
    
    /**
     * Devuelve un array con las compras por sku del producto del cliente junto con los dias de diferencia entre las fechas de compras
     * 
     * @param array $comprasPorSku
     * @return array
     */
    private function getDifFechasCompras(array $comprasPorSku) :array{
        foreach($comprasPorSku as $sku => $atributo){
            $contarFechas = count($atributo['fechas']);
            foreach($atributo['fechas'] as $index => $valor){
                    if($index+1 < $contarFechas){
                        $fecha1 = DateTime::createFromFormat('Y-m-d', $valor);
                        $fecha2 = DateTime::createFromFormat('Y-m-d', $atributo['fechas'][$index+1]);
                        $interval = $fecha1->diff($fecha2);
                        $comprasPorSku[$sku]['difFechas'][] = (int)$interval->format("%r%a"); 
                    }
            }
        }
        return $comprasPorSku;
    }
    
    /**
     * Devuelve un array con las compras por sku del producto del cliente junto con las fechas de recompra
     * 
     * @param array $comprasPorSku
     * @return array
     */
    private function getFechasRecompraSku(array $comprasPorSku) :array{
        foreach($comprasPorSku as $sku => $atributo){
            if (array_key_exists('difFechas', $atributo)) {
                $ultimaFecha  = max($atributo['fechas']);
                $diasPromedio = ceil( array_sum($atributo['difFechas']) / count($atributo['difFechas']) );
                $comprasPorSku[$sku]['fechaRecompra'] =  $this->getFechaRecompra($diasPromedio, $ultimaFecha);
                $comprasPorSku[$sku]['fechaRecompraSinAtipicos'] =  $this->getFechaRecompraSinAtipicos($atributo['difFechas'], $ultimaFecha);
                unset($comprasPorSku[$sku]['difFechas']);
            }else{
                //Limpiamos los productos que no tienen el diferencia entre fechas
                 unset($comprasPorSku[$sku]);
            }
        }
        return $comprasPorSku;
    }
    
    /**
     * Calcula fechas de recompra del cliente
     * 
     * @param int $diasPromedio
     * @param string $ultimaFecha
     * @return string
     */
    private function getFechaRecompra(int $diasPromedio, string $ultimaFecha ) :string{
        $fecha = DateTime::createFromFormat('Y-m-d', $ultimaFecha);
        $fecha->modify('+'.$diasPromedio.' days');
        
        return $fecha->format('d/m/Y');
    }
    
    /**
     * Devuelve fechas de recompra sin atipicos de 8 semanas
     * 
     * @param array $difFechas
     * @param string $ultimaFecha
     * @return string
     */
    private function getFechaRecompraSinAtipicos(array $difFechas, string $ultimaFecha ) :string{
        $difFechasAtipicos = array_filter($difFechas, function($v, $k) {
                return $v > 56; //8 semanas = 56 dias
        }, ARRAY_FILTER_USE_BOTH);
        
        if(count($difFechasAtipicos) == 1){
          $difFechas = array_diff($difFechas, $difFechasAtipicos);
        }
        $diasPromedio = ceil( array_sum($difFechas) / count($difFechas) );
        
        return $this->getFechaRecompra($diasPromedio, $ultimaFecha);
    }

}
