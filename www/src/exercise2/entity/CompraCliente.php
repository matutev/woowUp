<?php

namespace src\exercise2\entity;

class CompraCliente{
    /**
     * unico id del cliente 
     * 
     * @var int 
     */
    private $idCliente = 1;
    
    /**
     * sku del producto
     * 
     * @var string 
     */
    private $skuProducto;
    
    /**
     * nombre del producto
     * 
     * @var string 
     */
    private $nombreProducto;
    
    /**
     * fecha recompra del cliente
     * 
     * @var string 
     */
    private $fechaRecompra;
    
    /**
     * fecha recompra del cliente sin atipicos
     * 
     * @var string 
     */
    private $fechaRecompraSinAtipicos;
      
    public function __construct( array $resultado = null) {
        if (!empty($resultado)) {
            $this->setSkuProducto($resultado['sku']);
            $this->setNombreProducto($resultado['name']);
            $this->setFechaRecompra($resultado['fechaRecompra']);
            $this->setFechaRecompraSinAtipicos($resultado['fechaRecompraSinAtipicos']);
        }
    }
    
    /**
     * Get idCliente
     *
     * @return integer 
     */
    public function getIdCliente(){
        return $this->idCliente;
    }
    
    /**
     * Get skuProducto
     *
     * @return string 
     */
    public function getSkuProducto(){
        return $this->skuProducto;
    }
    
    /**
     * Set skuProducto
     *
     * @param string $skuProducto 
     */
    public function setSkuProducto($skuProducto){
        $this->skuProducto=$skuProducto;
    }
    
    /**
     * Get nombreProducto
     *
     * @return string 
     */
    public function getNombreProducto(){
        return $this->nombreProducto;
    }
    
    /**
     * Set nombreProducto
     *
     * @param string $nombreProducto
     */
    public function setNombreProducto($nombreProducto){
        $this->nombreProducto=$nombreProducto;
    }
    
    /**
     * Get fechaRecompra
     *
     * @return string 
     */
    public function getFechaRecompra(){
        return $this->fechaRecompra;
    }
    
    /**
     * Set fechaRecompra
     *
     * @param string $fechaRecompra
     */
    public function setFechaRecompra($fechaRecompra){
        $this->fechaRecompra=$fechaRecompra;
    }
    
    /**
     * Get fechaRecompraSinAtipicos
     *
     * @return string $fechaRecompraSinAtipicos
     */
    public function getFechaRecompraSinAtipicos(){
        return $this->fechaRecompraSinAtipicos;
    }
    
    /**
     * Set fechaRecompraSinAtipicos
     *
     * @param string $fechaRecompraSinAtipicos
     */
    public function setFechaRecompraSinAtipicos($fechaRecompraSinAtipicos){
        $this->fechaRecompraSinAtipicos=$fechaRecompraSinAtipicos;
    }

}
