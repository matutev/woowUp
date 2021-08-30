<?php
namespace Index;

use src\DefaultController;

require_once $_SERVER['DOCUMENT_ROOT'].'/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowUp/www/' : '').'src/DefaultController.php';
    
class Index extends DefaultController{
    
    public function __construct() {
        parent::__construct();
       //RENDERIZAR VISTA
       $this->render('views/choiceExercise.php');
    }
    
}
new Index();
