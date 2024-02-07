<?php

namespace App\Actions;

class Unit
{
    public $number;
    public function __construct($value)
    {
        $this->number = $value;
    }
    public function convert_meter_to_centimeter()
    {
        return $this->number * 100;
    }
    public function convert_meter_to_millimeter()
    {
        return $this->number * 1000;
    }
    public function convert_meter_to_inch()
    {
        return $this->number * 39.37;
    }
}
