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
}