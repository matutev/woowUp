<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\exercise1\repository\EscaleraRepository;

class Exercise1Test extends TestCase{

    private $op;

    public function setUp() :void{
        
        $this->op = new EscaleraRepository();
    }
    
    public function testGetPosibilidadesConEnteros(){
        $this->assertEquals(2,$this->op->getPosibilidades('2'));
    }
    
    public function testGetPosibilidadesConNull(){
        $this->assertEquals(false,$this->op->getPosibilidades(null));
    }
    
    public function testGetPosibilidadesConNegativos(){
        $this->assertEquals(false,$this->op->getPosibilidades('-1'));
    }
    

}
