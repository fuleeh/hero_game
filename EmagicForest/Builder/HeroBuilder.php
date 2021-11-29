<?php

namespace EmagicForest\Builder;

use EmagicForest\Builder\Character;
use EmagicForest\Skill\Skill;

class HeroBuilder implements CharacterBuilderInterface{
    private $character;

    public function __construct(){
        $this->character = new Character();
    }

    public function setName(){
        $this->character->setName('Orderus');
    }

    public function setHealth(){
        $this->character->setHealth(rand(70, 100));
    }

    public function setStrength(){
        $this->character->setStrength(rand(70, 80));
    }

    public function setDefense(){
        $this->character->setDefense(rand(45, 55));
    }

    public function setSpeed(){
        $this->character->setSpeed(rand(40, 50));
    }

    public function setLuck(){
        $this->character->setLuck(rand(10, 30));
    }

    public function setSkills(){
        $this->character->setSkill(new Skill('Rapid Strike', 10, 'rapid_strike'));
        $this->character->setSkill(new Skill('Magic Shield', 20, 'magic_shield'));
    }

    public function getCharacter(){
        return $this->character;
    }
}