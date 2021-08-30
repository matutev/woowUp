<?php
namespace src\exercise1\controller;

use src\DefaultController;
use src\exercise1\repository\EscaleraRepository;

require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/DefaultController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/exercise1/repository/EscaleraRepository.php';

    
class EscaleraController extends DefaultController{
    
    public function __construct() {
       parent::__construct(); 
       //si envia la cantidad de escalones ejecuta la accion por ajax
       if(isset($_POST['action']) && $_POST['action'] == 'getPosibilidadesEscalera'){
           $respuesta = $this->getPosibilidadesEscalera($_POST['nroEscalones']);
           echo json_encode(['response'=>$respuesta, 'errors'=> empty($respuesta)? 'No es un numero valido.': false]);
           die();
        }      
      
       //RENDERIZAR VISTA
       $this->render($_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'views/exercise1/exercise1.php');
    }
    /**
     * llama al repositorio para calcular las posibilidades de subir la escalera y 
     * devuelve error o resultado con la cantidad de posibilidades
     * 
     * @param string $nroEscalones
     * @return boolean|integer
     */
    private function getPosibilidadesEscalera(string $nroEscalones){
        $escaleraRepository = new EscaleraRepository();
        $resPosibilidades = $escaleraRepository->getPosibilidades($nroEscalones);
        
        return $resPosibilidades;
    }
    
}

new EscaleraController();
