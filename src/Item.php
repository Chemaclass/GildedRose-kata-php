<?php

declare(strict_types=1);

namespace GildedRose;

final class Item
{
    public const AGED_BRIE = 'Aged Brie';
    public const BACKSTAGE = 'Backstage passes to a TAFKAL80ETC concert';
    public const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    public const CONJURED_MANA = 'Conjured Mana Cake';
    public const DEFAULT = 'DEFAULT';

    private string $name;
    private int $sell_in;
    private int $quality;

    public static function agedBrie(int $sellIn, int $quality): self
    {
        return new self(self::AGED_BRIE, $sellIn, $quality);
    }

    public static function backstage(int $sellIn, int $quality): self
    {
        return new self(self::BACKSTAGE, $sellIn, $quality);
    }

    public static function sulfuras(int $sellIn, int $quality): self
    {
        return new self(self::SULFURAS, $sellIn, $quality);
    }

    public static function conjured(int $sellIn, int $quality): self
    {
        return new self(self::CONJURED_MANA, $sellIn, $quality);
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
