<?php

namespace App;

class GildedRose
{
    const QUALITY_CHANGE_RATE = 1;
    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    const NORMAL_ITEM_TYPE = 'normal';
    const BRIE_ITEM_TYPE = 'Aged Brie';
    const SULFURAS_ITEM_TYPE = 'Sulfuras, Hand of Ragnaros';
    const BACKSTAGE_PASSES_TYPE = 'Backstage passes to a TAFKAL80ETC concert';
    const CONJURED_ITEM_TYPE = 'Conjured Mana Cake';

    public $name;
    public $quality;
    public $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public static function of($name, $quality, $sellIn)
    {
        return new static($name, $quality, $sellIn);
    }

    public function tick()
    {
        if ($this->name == self::NORMAL_ITEM_TYPE) {
            $this->updateNormalItemQuality();
        }

        if ($this->name == self::BRIE_ITEM_TYPE) {
            $this->updateBrieItemQuality();
        }

        if ($this->name == self::SULFURAS_ITEM_TYPE) {
            $this->updateSulfurasItemQuality();
        }

        if ($this->name == self::BACKSTAGE_PASSES_TYPE) {
            $this->updateBackstagePassesQuality();
        }

        if ($this->name == self::CONJURED_ITEM_TYPE) {
            $this->updateconjuredItemQuality();
        }

        $this->decreaseSellIn();
    }

    private function updateNormalItemQuality()
    {
        if ($this->sellIn > 0) {
            $this->decreaseQuality();
        } else {
            $this->decreaseQuality(2);
        }
    }

    private function updateBrieItemQuality()
    {
        if ($this->sellIn > 0) {
            $this->increaseQuality();
        } else {
            $this->increaseQuality(2);
        }
    }

    private function updateSulfurasItemQuality()
    {
        // this case requires no processing
    }

    private function updateBackstagePassesQuality()
    {
        if ($this->sellIn > 10) {
            $this->increaseQuality();
        } elseif ($this->sellIn > 5) {
            $this->increaseQuality(2);
        } elseif ($this->sellIn > 0) {
            $this->increaseQuality(3);
        } else {
            $this->invalidateQuality();
        }
    }

    private function updateconjuredItemQuality()
    {
        $times = 2;
        for ($i = 0; $i < $times; $i++) {
            $this->updateNormalItemQuality();
        }
    }

    private function increaseQuality(int $times = 1)
    {
        $this->quality = $this->quality + (self::QUALITY_CHANGE_RATE * $times);

        if ($this->quality > self::MAX_QUALITY) {
            $this->quality = self::MAX_QUALITY;
        }
    }

    private function decreaseQuality(int $times = 1)
    {
        $this->quality = $this->quality - (self::QUALITY_CHANGE_RATE * $times);

        if ($this->quality < self::MIN_QUALITY) {
            $this->quality = self::MIN_QUALITY;
        }
    }

    private function invalidateQuality()
    {
        $this->quality = self::MIN_QUALITY;
    }

    private function decreaseSellIn()
    {
        if ($this->name == self::SULFURAS_ITEM_TYPE) {
            return;
        }

        $this->sellIn--;
    }
}
