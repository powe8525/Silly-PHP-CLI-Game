<?php 

namespace RPG\Interfaces;

interface iChangeHp {
    public function hurt(int $amount): void;
    public function heal(int $amount): void;
}