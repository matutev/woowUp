<?php

namespace src;


class DefaultController{

    /**
     *
     * @var string 
     */
    public $base_assets = '';


    public function __construct() {
        
        //SET BASE ASSET URL
        $this->base_assets = $this->getBaseAssetsUrl();
    }
    
    /**
     * requiere un archivo
     * 
     * @param type $nameFile
     * 
     * @return require_once
     */
    public function render($nameFile){
       return require_once $nameFile;  
    }
    
    /**
     * 
     * @param type $nameFile
     * 
     * @return header
     */
    public function redirect($nameFile){
       return header('Location: '.$nameFile);  
    }
    
    /**
     * devuelve la url base para la utilizacion de assets
     * 
     * @return string
     */
    private function getBaseAssetsUrl(){
      return sprintf(
        "%s://%s%s",
        isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
        $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'],
        '/'.($_SERVER['HTTP_HOST'] == 'localhost'? 'woowup/www/' : '')
      );
    }

}
