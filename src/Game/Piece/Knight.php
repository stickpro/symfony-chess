<?php

namespace App\Game\Piece;

use App\Enum\Color;
use App\Game\Coordinates;

class Knight extends Piece
{
    public function getIcon(): string
    {
        return $this->color === Color::BLACK ? '♞' : '♘';
    }
}