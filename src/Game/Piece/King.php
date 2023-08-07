<?php

namespace App\Game\Piece;

use App\Enum\Color;

class King extends Piece
{
    public function getIcon(): string
    {
        return $this->color === Color::BLACK ? '♚' : '♔';
    }
}