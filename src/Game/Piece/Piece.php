<?php

namespace App\Game\Piece;

use App\Enum\Color;
use App\Game\Coordinates;

abstract class Piece
{
    public function __construct(
        public readonly Color       $color,
        public Coordinates $coordinates
    )
    {
    }

    abstract public function getIcon(): string;
}