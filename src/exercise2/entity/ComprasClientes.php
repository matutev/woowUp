<?php

namespace src\exercise2\entity;

class ComprasClientes {

  /**
   * compras de clientes
   * 
   * @var array 
   */  
  private $comprasClientes = [];
  
  /**
   * Agrega dentro de $comprasClientes objs CompraCliente con sus atributos
   * 
   * @param CompraCliente $item
   */
  public function addComprasClientes($item) {
    $this->comprasClientes[] = $item;
  }
  
  /**
   * get comprasClientes
   * 
   * @return ComprasClientes
   */
  public function getComprasClientes(){
      return $this->comprasClientes;
  }

}
