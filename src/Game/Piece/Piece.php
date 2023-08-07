<?php

namespace App\Game\Piece;

use App\Enum\Color;
use App\Game\Board;
use App\Game\Coordinates;
use Ds\Set;

abstract class Piece
{
    public function __construct(
        public readonly Color       $color,
        public Coordinates $coordinates
    )
    {
    }

    abstract protected function getIcon(): string;

    public function getAvailableMoveSquares(Board $board)
    {

    }

    abstract protected function getPieceMoves(): Set;
}