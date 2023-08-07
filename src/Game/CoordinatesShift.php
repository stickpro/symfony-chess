<?php

namespace App\Game;

readonly class CoordinatesShift
{
    /**
     * @param int $fileShift
     * @param int $rankShift
     */
    public function __construct(
        public int $fileShift,
        public int $rankShift)
    {
    }
}