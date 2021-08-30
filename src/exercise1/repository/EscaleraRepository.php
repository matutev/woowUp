<?php

namespace src\exercise1\repository;


class EscaleraRepository{
    
    /**
     * Devuelve las posibilidades de subir la escalera de $nroEscalones escalones o un mensaje de error si $nroEscalones es incorrecto
     * 
     * @param string $nroEscalones
     * @return string|integer
     */
    public function getPosibilidades($nroEscalones){ 
        if(!ctype_digit($nroEscalones)  || (ctype_digit($nroEscalones) &&  $nroEscalones <= 1)){
            return  'No es un numero valido.';
        }

        return $this->getContadorPosibilidades($nroEscalones + 1);
    }
    
    /**
     * Contador de posibilidades de subir la escalera de $nroEscalones escalones
     * 
     * @param string $nroEscalones
     * @return integer
     */
    private function getContadorPosibilidades($nroEscalones){
        if ($nroEscalones <= 1){
            return $nroEscalones; 
        }
        return $this->getContadorPosibilidades($nroEscalones - 1) + $this->getContadorPosibilidades($nroEscalones - 2);
    }

}
