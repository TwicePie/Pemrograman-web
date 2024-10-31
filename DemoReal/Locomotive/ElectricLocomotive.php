<?php

namespace DemoReal\Locomotive;

class ElectricLocomotive extends AbstractLocomotive {
    use Maintainable;
    
    protected $voltageSystem; // in kV
    protected $maxSpeed; // in km/h

    public function __construct($serialNumber, $manufacturingYear, $model, $voltageSystem, $maxSpeed) {
        parent::__construct($serialNumber, $manufacturingYear, $model);
        $this->voltageSystem = $voltageSystem;
        $this->maxSpeed = $maxSpeed;
    }

    public function getSpecifications() {
        return "<br>Electric Locomotive - Model: {$this->model} <br>Voltage: {$this->voltageSystem}kV <br>Max Speed: {$this->maxSpeed}km/h";
    }

    public function __invoke() {
        return "Operating {$this->model} at {$this->voltageSystem}kV system";
    }
}