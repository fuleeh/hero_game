<?php

namespace EmagicForest\Builder;

use EmagicForest\Builder\Character;

interface CharacterBuilderInterface{
    public function setName();
    public function setHealth();
    public function setStrength();
    public function setDefense();
    public function setSpeed();
    public function setLuck();
    public function setSkills();
    
    public function getCharacter();
}