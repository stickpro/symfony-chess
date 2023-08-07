<?php

namespace App\Game;

use App\Enum\File;
use Ds\Hashable;

class Coordinates implements Hashable
{
    /**
     * @param File $file
     * @param int $rank
     */
    public function __construct(
        public File $file,
        public int  $rank)
    {
    }

    public function equals(mixed $obj): bool
    {
        return $this->file === $obj->file && $this->rank === $obj->rank;
    }

    public function hash(): string
    {
        return $this->file->name . $this->rank;
    }

    public function shift(CoordinatesShift $shift): Coordinates
    {
        return new Coordinates(File::cases()[$this->file->value + $shift->fileShift], $this->rank + $shift->rankShift);
    }

    public function canShift(CoordinatesShift $shift): bool
    {
        $file = $this->file->value + $shift->fileShift;
        $rank = $this->rank + $shift->rankShift;
        if(($file < 0) || ($file > 8)) return false;
        if(($rank < 0) || ($rank > 8)) return false;

        return true;
    }
}