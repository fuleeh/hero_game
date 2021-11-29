<?php

namespace EmagicForest\Builder;

use EmagicForest\Skill\Skill;

interface CharacterInterface
{
    public function getName();
    public function setName($name);
    public function getHealth();
    public function setHealth($health);
    public function getStrength();
    public function setStrength($strength);
    public function getDefense();
    public function setDefense($defense);
    public function getSpeed();
    public function setSpeed($speed);
    public function getLuck();
    public function setLuck($luck);
    public function setSkill(Skill $skill);
    public function isAlive();

    public function getSkills();
}