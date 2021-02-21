<?php

declare(strict_types=1);

namespace GildedRose\ItemQualityUpdater;

use GildedRose\Item;

final class ConjuredItemQualityUpdater implements ItemQualityUpdaterInterface
{
    public function update(Item $item): Item
    {
        $this->verifyCanUpdate($item);

        $sellIn = $item->sellIn();
        $quality = $item->quality();

        if ($quality > 0) {
            $quality -= 2;
        }

        --$sellIn;

        if ($sellIn < 0 && $quality > 0) {
            $quality -= 2;
        }

        return Item::conjured($sellIn, $quality);
    }

    private function verifyCanUpdate(Item $item): void
    {
        if (!$this->canUpdate($item)) {
            throw new \RuntimeException('No es updatable!!! :(');
        }
    }

    private function canUpdate(Item $item): bool
    {
        return $item->name() === Item::CONJURED_MANA;
    }
}
