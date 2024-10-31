<?php

namespace DemoReal\Locomotive;

class DieselLocomotive extends AbstractLocomotive {
    use Maintainable;
    
    protected $enginePower; // in horsepower
    protected $fuelCapacity; // in liters

    public function __construct($serialNumber, $manufacturingYear, $model, $enginePower, $fuelCapacity) {
        parent::__construct($serialNumber, $manufacturingYear, $model);
        $this->enginePower = $enginePower;
        $this->fuelCapacity = $fuelCapacity;
    }

    public function getSpecifications() {
        return "<br>Diesel Locomotive - Model: {$this->model} <br>Power: {$this->enginePower}HP <br>Fuel Capacity: {$this->fuelCapacity}L";
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
}