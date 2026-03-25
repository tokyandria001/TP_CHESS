# TP_CHESS

## Structure du TP
```bash
TP_CHESS/
├── README.md
├── index.php
└── src/
    ├── Board.php
    ├── Game.php
    ├── Position.php
    ├── Move.php
    ├── Factory/
    │   └── PieceFactory.php
    ├── Contract/
    │   └── Renderable.php
    ├── Enum/
    │   ├── PieceColor.php
    │   └── PieceType.php
    ├── Exception/
    │   ├── ChessException.php
    │   ├── InvalidMoveException.php
    │   ├── NoPieceException.php
    │   ├── WrongTurnException.php
    │   └── OccupiedByAllyException.php
    └── Piece/
        ├── Piece.php
        ├── King.php
        ├── Queen.php
        ├── Rook.php
        ├── Bishop.php
        ├── Knight.php
        └── Pawn.php
```