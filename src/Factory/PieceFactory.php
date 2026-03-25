<?php

namespace Chess\Factory;

use Chess\Enum\PieceType;
use Chess\Enum\PieceColor;
use Chess\Position;
use Chess\Piece\Piece;
use Chess\Piece\King;
use Chess\Piece\Queen;
use Chess\Piece\Rook;
use Chess\Piece\Bishop;
use Chess\Piece\Knight;
use Chess\Piece\Pawn;

class PieceFactory{
    public function create(PieceType $type, PieceColor $color, Position $position): Piece {
        return match ($type) {
            PieceType::KING => new King($color, $position),
            PieceType::QUEEN => new Queen($color, $position),
            PieceType::ROOK => new Rook($color, $position),
            PieceType::BISHOP => new Bishop($color, $position),
            PieceType::KNIGHT => new Knight($color, $position),
            PieceType::PAWN => new Pawn($color, $position),

            default => throw new \InvalidArgumentException(
                "Type de pièce inconnu: " . $type->name
            ),
        };
    }

    public function createWhiteStartingPieces(): array
    {
        $pieces = [];

        // Première rangée (pièces majeures)
        $pieces[] = $this->create(PieceType::ROOK, PieceColor::WHITE, new Position(7, 0));
        $pieces[] = $this->create(PieceType::KNIGHT, PieceColor::WHITE, new Position(7, 1));
        $pieces[] = $this->create(PieceType::BISHOP, PieceColor::WHITE, new Position(7, 2));
        $pieces[] = $this->create(PieceType::QUEEN, PieceColor::WHITE, new Position(7, 3));
        $pieces[] = $this->create(PieceType::KING, PieceColor::WHITE, new Position(7, 4));
        $pieces[] = $this->create(PieceType::BISHOP, PieceColor::WHITE, new Position(7, 5));
        $pieces[] = $this->create(PieceType::KNIGHT, PieceColor::WHITE, new Position(7, 6));
        $pieces[] = $this->create(PieceType::ROOK, PieceColor::WHITE, new Position(7, 7));

        // Deuxième rangée (pions)
        for ($col = 0; $col < 8; $col++) {
            $pieces[] = $this->create(PieceType::PAWN, PieceColor::WHITE, new Position(6, $col));
        }

        return $pieces;
    }

    public function createBlackStartingPieces(): array
    {
        $pieces = [];

        // Première rangée (pièces majeures)
        $pieces[] = $this->create(PieceType::ROOK, PieceColor::BLACK, new Position(0, 0));
        $pieces[] = $this->create(PieceType::KNIGHT, PieceColor::BLACK, new Position(0, 1));
        $pieces[] = $this->create(PieceType::BISHOP, PieceColor::BLACK, new Position(0, 2));
        $pieces[] = $this->create(PieceType::QUEEN, PieceColor::BLACK, new Position(0, 3));
        $pieces[] = $this->create(PieceType::KING, PieceColor::BLACK, new Position(0, 4));
        $pieces[] = $this->create(PieceType::BISHOP, PieceColor::BLACK, new Position(0, 5));
        $pieces[] = $this->create(PieceType::KNIGHT, PieceColor::BLACK, new Position(0, 6));
        $pieces[] = $this->create(PieceType::ROOK, PieceColor::BLACK, new Position(0, 7));

        // Deuxième rangée (pions)
        for ($col = 0; $col < 8; $col++) {
            $pieces[] = $this->create(PieceType::PAWN, PieceColor::BLACK, new Position(1, $col));
        }

        return $pieces;
    }

    public function createStartingPieces(): array
    {
        return array_merge(
            $this->createWhiteStartingPieces(),
            $this->createBlackStartingPieces()
        );
    }
}