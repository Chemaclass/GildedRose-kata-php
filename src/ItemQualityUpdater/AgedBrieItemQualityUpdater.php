<?php

declare(strict_types=1);

namespace GildedRose\ItemQualityUpdater;

use GildedRose\Item;

final class AgedBrieItemQualityUpdater implements ItemQualityUpdaterInterface
{
    public function update(Item $item): Item
    {
        $this->verifyCanUpdate($item);

        $quality = $item->quality();

        if ($quality < 50) {
            ++$quality;
        }
        $sellIn = $item->sellIn() - 1;
        if ($sellIn < 0 && $quality < 50) {
            ++$quality;
        }

        return Item::agedBrie($sellIn, $quality);
    }

    private function canUpdate(Item $item): bool
    {
        return $item->name() === Item::AGED_BRIE;
    }

    private function verifyCanUpdate(Item $item): void
    {
        if (!$this->canUpdate($item)) {
            throw new \RuntimeException('No es updatable!!! :(');
        }
    }
}
