<?php

namespace EmagicForest\Logger;

use EmagicForest\GamePlay\GamePlay;
use EmagicForest\GamePlay\GamePlayInterface;

class Logger implements LoggerInterface{
    public function printBaseStats(GamePlayInterface $gamePlay){
        echo "Base stats:\n";
        echo "Hero:\n";
        echo "Name:{$gamePlay->getHero()->getName()}\n";
        echo "Health:{$gamePlay->getHero()->getHealth()}\n";
        echo "Strength:{$gamePlay->getHero()->getStrength()}\n";
        echo "Defense:{$gamePlay->getHero()->getDefense()}\n";
        echo "Speed:{$gamePlay->getHero()->getSpeed()}\n";
        echo "Luck:{$gamePlay->getHero()->getLuck()}\n";
        foreach($gamePlay->getHero()->getSkills() as $skill){
            echo "Skill: {$skill->getName()} with a chance : {$skill->getChance()}%\n";
        }
        echo "\n";
        echo "Beast:\n";
        echo "Name:{$gamePlay->getBeast()->getName()}\n";
        echo "Health:{$gamePlay->getBeast()->getHealth()}\n";
        echo "Strength:{$gamePlay->getBeast()->getStrength()}\n";
        echo "Defense:{$gamePlay->getBeast()->getDefense()}\n";
        echo "Speed:{$gamePlay->getBeast()->getSpeed()}\n";
        echo "Luck:{$gamePlay->getBeast()->getLuck()}\n\n";
        echo "-------------------------------------------\n";
    }

    public function printStandingAfterRound(GamePlayInterface $gamePlay, $curr_round){
        echo "Standing after Round : $curr_round\n";
        echo "Attacker is {$gamePlay->getAttacker()->getName()} with {$gamePlay->getAttacker()->getHealth()} Health\n";
        echo "Defender is {$gamePlay->getDefender()->getName()} with {$gamePlay->getDefender()->getHealth()} Health\n";
        if($gamePlay->getIsLucky() == true){
            echo "The Defender dodget the attack\n";
        }
        echo "\n";
    }

    public function printWinner(GamePlayInterface $gamePlay){
        echo "The Winner is: {$gamePlay->getWinner()->getName()}\n";
    }
}