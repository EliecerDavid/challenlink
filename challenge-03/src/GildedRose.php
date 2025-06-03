<?php

namespace App;

class GildedRose
{
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
        if ($this->name == 'normal') {
            $this->quality--;
            $this->sellIn--;

            if ($this->sellIn < 0) {
                $this->quality--;
            }

            if ($this->quality < 0) {
                $this->quality = 0;
            }
        }

        if ($this->name == 'Aged Brie') {
            $this->quality++;
            $this->sellIn--;

            if ($this->sellIn < 0) {
                $this->quality++;
            }

            if ($this->quality > 50) {
                $this->quality = 50;
            }
        }

        if ($this->name == 'Sulfuras, Hand of Ragnaros') {
        }

        if ($this->name == 'Backstage passes to a TAFKAL80ETC concert') {
            $this->quality++;
            $this->sellIn--;

            if ($this->sellIn < 10) {
                $this->quality++;
            }

            if ($this->sellIn < 5) {
                $this->quality++;
            }

            if ($this->sellIn < 0) {
                $this->quality = 0;
            }

            if ($this->quality > 50) {
                $this->quality = 50;
            }
        }
    }
}
