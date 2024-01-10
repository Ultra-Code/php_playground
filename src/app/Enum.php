<?php

declare(strict_type=1);
namespace Playground\Enum;

enum Suit: string {
    case Hearts = 'H';
    case Diamonds = 'D';
    case Clubs = 'C';
    case Spades = 'S';
}

function getSuitColor(Suit $suit): string {
    return match ($suit) {
        Suit::Hearts, Suit::Diamonds => 'Red',
        Suit::Clubs, Suit::Spades => 'Black',
    };
}
