<?php

namespace RPG\Interfaces;

interface iEntityBasics extends iChangeHp {
    public function getName(): string;
    public function getHp(): int;
}