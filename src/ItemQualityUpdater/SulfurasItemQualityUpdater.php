<?php

declare(strict_types=1);

namespace GildedRose\ItemQualityUpdater;

use GildedRose\Item;

final class SulfurasItemQualityUpdater implements ItemQualityUpdaterInterface
{
    public function update(Item $item): Item
    {
        $this->verifyCanUpdate($item);

        return Item::sulfuras($item->sellIn(), $item->quality());
    }

    private function verifyCanUpdate(Item $item): void
    {
        if (!$this->canUpdate($item)) {
            throw new \RuntimeException('No es updatable!!! :(');
        }
    }

    private function canUpdate(Item $item): bool
    {
        return $item->name() === Item::SULFURAS_HAND_OF_RAGNAROS;
    }
}
