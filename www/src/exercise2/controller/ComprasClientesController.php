<?php
namespace src\exercise2\controller;

use src\DefaultController;
use src\exercise2\repository\ComprasClientesRepository;

require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/DefaultController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/exercise2/repository/ComprasClientesRepository.php';

    
class ComprasClientesController extends DefaultController{
    
    public  $resultados = null;

    public function __construct() {
       parent::__construct(); 
       $this->getComprasClientes();
      
       //RENDERIZAR VISTA
       $this->render($_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'views/exercise2/exercise2.php');
    }
    
    /**
     * llama al repositorio ComprasClientes para calcular las fechas recompra del cliente o un error si no puedo leer el json del cliente
     */
    private function getComprasClientes(){
        $comprasClientesRepository = new ComprasClientesRepository();
        $comprasClientes = $comprasClientesRepository->getFechasRecompraPorProducto();
        $this->resultados = $comprasClientes;
    }
    
}

new ComprasClientesController();
