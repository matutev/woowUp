<?php
namespace src\exercise1\controller;

use src\DefaultController;
use src\exercise1\repository\EscaleraRepository;

require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/' : '').'src/DefaultController.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/' : '').'src/exercise1/repository/EscaleraRepository.php';

    
class EscaleraController extends DefaultController{
    
    public  $resultado = null;

    public function __construct() {
       parent::__construct(); 
       //si envia la cantidad de escalones ejecuta la accion
       if(isset($_POST['form']) && $_POST['form']['action'] == 'getPosibilidadesEscalera'){
           $this->getPosibilidadesEscalera($_POST['form']['nroEscalones']);;
        }      
      
       //RENDERIZAR VISTA
       $this->render($_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp' : '').'/views/exercise1/exercise1.php');
    }
    /**
     * llama al repositorio para calcular las posibilidades de subir la escalera y 
     * setea $error si es invalido $nroEscalones o $resultado con la cantidad de posibilidades
     * 
     * @param string $nroEscalones
     */
    private function getPosibilidadesEscalera(string $nroEscalones){
        $escaleraRepository = new EscaleraRepository();
        $resPosibilidades = $escaleraRepository->getPosibilidades($nroEscalones);
        $this->resultado = $resPosibilidades;
    }
    
}

new EscaleraController();
