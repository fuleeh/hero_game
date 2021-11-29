<?php

namespace EmagicForest\Builder;

use EmagicForest\Builder\Character;

class CharacterDirector{
    public function build(CharacterBuilderInterface $builder){
        $builder->setName();
        $builder->setHealth();
        $builder->setStrength();
        $builder->setDefense();
        $builder->setSpeed();
        $builder->setLuck();
        $builder->setSkills();

        return $builder->getCharacter();
    }
}