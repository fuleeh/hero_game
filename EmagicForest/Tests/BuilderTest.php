<?php

namespace EmagicForest\Tests;

use EmagicForest\Builder\CharacterDirector;
use EmagicForest\Builder\HeroBuilder;
use EmagicForest\Builder\WildBeastBuilder;
use EmagicForest\Builder\Character;
use EmagicForest\GamePlay\Gameplay;
use EmagicForest\Logger\Logger;
use PHPUnit\Framework\TestCase;

class BuilderTests extends TestCase{

    public function testBattle(){
        $this->expectNotToPerformAssertions();

        $game = new GamePlay(new Logger);
        $game->spawnHero((new CharacterDirector())->build(new HeroBuilder(new Character)));
        $game->spawnBeast((new CharacterDirector())->build(new WildBeastBuilder(new Character)));
        $game->startBattle();
        
    }
}
 