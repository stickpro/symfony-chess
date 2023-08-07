<?php

namespace App\Game;

use App\Enum\Color;
use App\Enum\File;
use App\Game\Piece\Bishop;
use App\Game\Piece\King;
use App\Game\Piece\Knight;
use App\Game\Piece\Pawn;
use App\Game\Piece\Piece;
use App\Game\Piece\Queen;
use App\Game\Piece\Rook;
use Ds\Map;
use Ds\Pair;

class Board
{
    /**
     * @param Map $pieces
     */
    public function __construct(
        public Map $pieces = new Map(),
    )
    {
    }

    /**
     * @param Coordinates $coordinates
     * @param Piece $piece
     * @return void
     */
    public function setPiece(Coordinates $coordinates, Piece $piece): void
    {
        $piece->coordinates = $coordinates;
        $this->pieces->put($coordinates, $piece);
    }

    /**
     * @return void
     */
    public function setupDefaultPiecePositions(): void
    {
        //Pawn
        foreach (File::cases() as $file) {
            $this->setPiece(new Coordinates($file, 2), new Pawn(Color::WHITE, new Coordinates($file, 2)));
            $this->setPiece(new Coordinates($file, 7), new Pawn(Color::BLACK, new Coordinates($file, 7)));
        }
        // Rock
        $this->setPiece(new Coordinates(File::A, 1), new Rook(Color::WHITE, new Coordinates(File::A, 1)));
        $this->setPiece(new Coordinates(File::H, 1), new Rook(Color::WHITE, new Coordinates(File::H, 1)));
        $this->setPiece(new Coordinates(File::A, 8), new Rook(Color::BLACK, new Coordinates(File::A, 8)));
        $this->setPiece(new Coordinates(File::H, 8), new Rook(Color::BLACK, new Coordinates(File::H, 8)));
        //Knight
        $this->setPiece(new Coordinates(File::B, 1), new Knight(Color::WHITE, new Coordinates(File::B, 1)));
        $this->setPiece(new Coordinates(File::G, 1), new Knight(Color::WHITE, new Coordinates(File::G, 1)));
        $this->setPiece(new Coordinates(File::B, 8), new Knight(Color::BLACK, new Coordinates(File::B, 8)));
        $this->setPiece(new Coordinates(File::G, 8), new Knight(Color::BLACK, new Coordinates(File::G, 8)));
        //Bishop
        $this->setPiece(new Coordinates(File::C, 1), new Bishop(Color::WHITE, new Coordinates(File::C, 1)));
        $this->setPiece(new Coordinates(File::F, 1), new Bishop(Color::WHITE, new Coordinates(File::F, 1)));
        $this->setPiece(new Coordinates(File::C, 8), new Bishop(Color::BLACK, new Coordinates(File::C, 8)));
        $this->setPiece(new Coordinates(File::F, 8), new Bishop(Color::BLACK, new Coordinates(File::F, 8)));
        //Queens
        $this->setPiece(new Coordinates(File::D, 1), new Queen(Color::WHITE, new Coordinates(File::D, 1)));
        $this->setPiece(new Coordinates(File::D, 8), new Queen(Color::BLACK, new Coordinates(File::D, 8)));
        //King
        $this->setPiece(new Coordinates(File::E, 1), new King(Color::WHITE, new Coordinates(File::E, 1)));
        $this->setPiece(new Coordinates(File::E, 8), new King(Color::BLACK, new Coordinates(File::E, 8)));
    }

    public static function isSquaredDark(Coordinates $coordinates): bool
    {
        return (($coordinates->file->value + $coordinates->rank) % 2 ) === 0;
    }

    public function isSquareEmpty(Coordinates $coordinates): bool
    {
        return !$this->pieces->hasKey($coordinates);
    }

    public function getPiece(Coordinates $coordinates)
    {
       return $this->pieces->get($coordinates);
    }
}