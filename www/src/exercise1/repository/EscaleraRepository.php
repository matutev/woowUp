<?php

namespace src\exercise1\repository;


class EscaleraRepository{
    
    /**
     * Devuelve las posibilidades de subir la escalera de $nroEscalones escalones o un mensaje de error si $nroEscalones es incorrecto
     * 
     * @param string $nroEscalones
     * @return boolean|integer
     */
    public function getPosibilidades(string $nroEscalones){ 
        if(!ctype_digit($nroEscalones)  || (ctype_digit($nroEscalones) &&  $nroEscalones <= 1)){
            return  false;
        }

        return $this->getContadorPosibilidades($nroEscalones);
    }
    
    /**
     * Contador de posibilidades de subir la escalera de $nroEscalones escalones
     * 
     * @param string $nroEscalones
     * @return integer
     */
    private function getContadorPosibilidades($nroEscalones){
        if ($nroEscalones < 3){
          return $nroEscalones;  
        } 
        $subirUno = 1;
        $subirDos = 2;
        for ($i = 2; $i < $nroEscalones; $i++) {
          $actual  = $subirUno + $subirDos;
          
          $subirUno = $subirDos;
          $subirDos = $actual;
        }

        return $subirDos;
    }

}
