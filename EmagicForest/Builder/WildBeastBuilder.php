<?php

namespace EmagicForest\Builder;

use EmagicForest\Builder\Character;
use EmagicForest\Skill\Skill;

class WildBeastBuilder implements CharacterBuilderInterface{
    private $character;

    public function __construct(){
        $this->character = new Character();
    }

    public function setName(){
        $this->character->setName('WildBeast');
    }

    public function setHealth(){
        $this->character->setHealth(rand(60, 90));
    }

    public function setStrength(){
        $this->character->setStrength(rand(60, 90));
    }

    public function setDefense(){
        $this->character->setDefense(rand(40, 60));
    }

    public function setSpeed(){
        $this->character->setSpeed(rand(40, 60));
    }

    public function setLuck(){
        $this->character->setLuck(rand(25, 40));
    }

    public function setSkills(){
        return;
    }

    public function getCharacter(){
        return $this->character;
    }
}