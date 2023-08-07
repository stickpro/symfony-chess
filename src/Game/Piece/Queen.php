<?php

namespace App\Game\Piece;

use App\Enum\Color;

class Queen extends Piece
{
    public function getIcon(): string
    {
        return $this->color === Color::BLACK ? '♛' : '♕';
    }
}