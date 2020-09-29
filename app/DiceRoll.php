<?php

namespace App;

use Illuminate\Support\Collection;

class DiceRoll
{
    private array $numbers;

    public function __construct(array $numbers)
    {
        $this->numbers = $numbers;
    }

    public function getRoll(): Collection
    {
        return collect($this->numbers);
    }
}
