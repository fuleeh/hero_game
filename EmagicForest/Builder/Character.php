<?php

namespace EmagicForest\Builder;

use EmagicForest\Skill\Skill;

class Character implements CharacterInterface{
    private $name;
    private $health;
    private $strength;
    private $defense;
    private $speed;
    private $luck;
    private $skills = [];

    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function getHealth(){
        return $this->health;
    }
    public function setHealth($health){
        $this->health = $health;
    }
    public function getStrength(){
        return $this->strength;
    }
    public function setStrength($strength){
        $this->strength = $strength;
    }
    public function getDefense(){
        return $this->defense;
    }
    public function setDefense($defense){
        $this->defense = $defense;
    }
    public function getSpeed(){
        return $this->speed;
    }
    public function setSpeed($speed){
        $this->speed = $speed;
    }
    public function getLuck(){
        return $this->luck;
    }
    public function setLuck($luck){
        $this->luck = $luck;
    }
    public function setSkill(Skill $skill){
        $this->skills[$skill->getName()] = $skill;
    }
    public function isAlive(){
        return $this->health > 0;
    }
    public function getSkills(){
        return $this->skills;
    }
}