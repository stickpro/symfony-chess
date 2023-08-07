<?php

namespace App\Game;

use App\Enum\File;

class BoardConsoleRender
{
    public function render(Board $board)
    {
        for ($rank = 8; $rank >= 1; $rank--) {
            foreach (File::cases() as $file) {
                echo $file->name . $rank;
            }
        }
    }
}