<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    public const AGED_BRIE = 'Aged Brie';
    public const BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT = 'Backstage passes to a TAFKAL80ETC concert';
    public const SULFURAS_HAND_OF_RAGNAROS = 'Sulfuras, Hand of Ragnaros';
    public const DEFAULT = 'DEFAULT';

    private string $name;
    private int $sell_in;
    private int $quality;

    public static function agedBrie(int $sell_in, int $quality): self
    {
        return new self(self::AGED_BRIE, $sell_in, $quality);
    }

    public static function backstage(int $sell_in, int $quality): self
    {
        return new self(self::BACKSTAGE_PASSES_TO_A_TAFKAL_80_ETC_CONCERT, $sell_in, $quality);
    }

    public static function sulfuras(int $sell_in, int $quality): self
    {
        return new self(self::SULFURAS_HAND_OF_RAGNAROS, $sell_in, $quality);
    }

    public static function default(string $name, int $sellIn, int $quality): self
    {
        return new self($name, $sellIn, $quality);
    }

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function name(): string
    {
        return $this->name;
    }

    public function sellIn(): int
    {
        return $this->sell_in;
    }

    public function quality(): int
    {
        return $this->quality;
    }
}
