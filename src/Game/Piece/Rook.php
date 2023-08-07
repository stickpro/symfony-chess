<?php

namespace App\Game\Piece;

use App\Enum\Color;

class Rook extends Piece
{

    public function getIcon(): string
    {
        return $this->color === Color::BLACK ? '♜' : '♖';
    }
}