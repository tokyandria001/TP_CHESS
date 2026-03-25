<?php

namespace Chess\Piece;

use Chess\Position;
use Chess\Enum\PieceColor;
use Chess\Enum\PieceType;
use Chess\Contract\Renderable;

abstract class Piece implements Renderable
{
    protected PieceColor $color;
    protected Position $position;
    protected PieceType $type;

    public function __construct(PieceColor $color, Position $position)
    {
        $this->color = $color;
        $this->position = $position;
    }

    public function getColor(): PieceColor
    {
        return $this->color;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }   

    public function setPosition(Position $position): void
    {
        $this->position = $position;
    }

    public function getType(): PieceType
    {
        return $this->type;
    }

    public function render(): string
    {
        $symbols = [
            PieceType::KING->name   => 'K',
            PieceType::QUEEN->name  => 'Q',
            PieceType::ROOK->name   => 'R',
            PieceType::BISHOP->name => 'B',
            PieceType::KNIGHT->name => 'N',
            PieceType::PAWN->name   => 'P',
        ];

        $symbol = $symbols[$this->type->name];

        // Noir = minuscule
        return $this->color === PieceColor::WHITE
            ? $symbol
            : strtolower($symbol);
    }

    public function canMove($board, Position $newPosition): bool
    {
        if ($this->position->equals($target)){
            return false;
        }

        if (!$this->isValidMovementShape($target)){
            return false;
        }

        if ($this->canCapture($board, $target) === false){
            return false;
        }

        if ($this->type !== \Chess\Enum\PieceType::KNIGHT){
            if (!$this->isPathClear($board, $target)){
                return false;
            }
        }

        if ($this->type == \Chess\Enum\PieceType::KNIGHT){
            if (!$this->isPawnMoveValid($board, $target)){
                return false;
            }
        }

        return true;
    }
}