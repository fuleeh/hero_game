<?php

namespace EmagicForest\GamePlay;

use EmagicForest\Builder\Character;

interface GamePlayInterface{
    public function spawnHero(Character $hero);
    public function spawnBeast(Character $beast);
    public function firstAttack();
    public function calcDmg();
    public function updateHealth();
    public function startBattle();

    public function getWinner();
}