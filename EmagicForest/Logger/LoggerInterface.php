<?php

namespace EmagicForest\Logger;

use EmagicForest\GamePlay\GamePlayInterface;

interface LoggerInterface{
    public function printBaseStats(GamePlayInterface $gamePlay);
    public function printStandingAfterRound(GamePlayInterface $gamePlay, $round);
    public function printWinner(GamePlayInterface $gamePlay);
}