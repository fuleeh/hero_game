<?php

namespace EmagicForest\Skill;

class Skill{
    private $name;
    private $chance;
    private $code;

    public function __construct($name, $chance, $code){
        $this->name = $name;
        $this->chance = $chance;
        $this->code = $code;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
    
    public function getChance(){
        return $this->chance;
    }

    public function setChance($chance){
        $this->chance = $chance;
    }

    public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        $this->code = $code;
    }
}