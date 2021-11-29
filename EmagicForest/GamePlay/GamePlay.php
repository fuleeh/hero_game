<?php

namespace EmagicForest\GamePlay;

use EmagicForest\Builder\CharacterDirector;
use EmagicForest\Builder\HeroBuilder;
use EmagicForest\Builder\WildBeastBuilder;
use EmagicForest\Builder\Character;
use EmagicForest\Logger\LoggerInterface;

define("max_round", 20);

class GamePlay implements GamePlayInterface{
    private $attacker;
    private $defender;
    private $hero;
    private $beast;
    private $curr_round = null;
    private $isLucky = false;

    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }

    public function spawnHero(Character $hero){
        $this->hero = (new CharacterDirector())->build(new HeroBuilder(new Character));
        return $this;
    }

    public function spawnBeast(Character $beast){
        $this->beast = (new CharacterDirector())->build(new WildBeastBuilder(new Character));
        return $this;
    }

    public function startBattle(){
        $this->printBaseStats();
        $this->firstAttack();

        for($round = 1; $round <= max_round; ++$round){
            $this->curr_round = $round;

            if($this->defender->getHealth() <= 0 || $this->attacker->getHealth() <= 0){
                break;
            }
            
            $this->checkIfLucky();
            $this->updateHealth();
            $this->printStandingAfterRound($round);
            $this->swapRole();
        }
        $this->printWinner();
    }  

    public function firstAttack(){
        if($this->hero->getSpeed() > $this->beast->getSpeed()){
            $this->attacker = $this->hero;
            $this->defender = $this->beast;
        } else if ($this->hero->getSpeed() == $this->beast->getSpeed() && $this->hero->getLuck() > $this->beast->getLuck()){
            $this->attacker = $this->hero;
            $this->defender = $this->beast;
        } else if ($this->hero->getSpeed() == $this->beast->getSpeed() && $this->hero->getLuck() < $this->beast->getLuck()){
            $this->attacker = $this->beast;
            $this->defender = $this->hero;
        } else {
            $this->attacker = $this->beast;
            $this->defender = $this->hero;
        }
    }

    public function updateHealth(){
        $dmg = $this->calcDmg();
        if($this->isLucky == true){
            $dmg = 0;
        }

        $updatedHealth = $this->defender->getHealth() - $dmg;

        if($updatedHealth < 0){
            $updatedHealth = 0;
        }

        $this->defender->setHealth($updatedHealth);
    }

    public function swapRole(){
        $temp = $this->attacker;
        $this->attacker = $this->defender;
        $this->defender = $temp;
    }

    public function getWinner()
    {
        if($this->attacker->getHealth() > $this->defender->getHealth())
        {
            return $this->attacker;
        }

        return $this->defender;
    }

    public function checkIfLucky(){
        $rand = mt_rand(0, 100);
        if($rand <= $this->defender->getLuck())
        {
            $this->isLucky = true;
        } else {
            $this->isLucky = false;
        }  
    }

    public function calcDmg(){
        $dmg = 0;
        if($this->attacker->getStrength() > $this->defender->getDefense()){
            return $this->attacker->getStrength() - $this->defender->getDefense();
        }

        return $dmg;
    }

    public function getHero()
    {
        return $this->hero;
    }

    public function getBeast()
    {
        return $this->beast;
    }

    public function getAttacker()
    {
        return $this->attacker;
    }

    public function getDefender()
    {
        return $this->defender;
    }

    public function getIsLucky()
    {
        return $this->isLucky;
    }

    private function printBaseStats(){
        $this->logger->printBaseStats($this);
    }

    private function printStandingAfterRound($curr_round){
        $this->logger->printStandingAfterRound($this, $curr_round);
    }

    private function printWinner(){
        $this->logger->printWinner($this);
    }

        // public function castRapidStrike($dmg){
    //     $rand = mt_rand(0, 100);
    //     $chances = $this->skillChances();
    //     if($rand <= $chances['chance_rs']){
    //         $dmg *= 2;
    //     } 
    // }

    // public function castMagicShield($dmg){
    //     $rand = mt_rand(0, 100);
    //     $chances = $this->skillChances();
    //     if($rand <= $chances['chance_ms']){
    //         $dmg /= 2;
    //     } 
    // }
    
    // public function skillChances(){
    //     $skills = $this->hero->getSKills();
    //     foreach($skills as $skill){
    //         if($skill->getCode() == 'rapid_strike'){
    //             $chance_rs = $skill->getChance();
    //         }
    //         else {
    //             $chance_ms = $skill->getChance();
    //         }
    //     }

    //     return ['chance_rs' => $chance_rs, 'chance_ms' => $chance_ms];
    // }
}