<?php

namespace DemoReal\Locomotive;

abstract class AbstractLocomotive {
    protected $serialNumber;
    protected $manufacturingYear;
    protected $model;
    protected $status; // active, maintenance

    public function __construct($serialNumber, $manufacturingYear, $model) {
        $this->serialNumber = $serialNumber;
        $this->manufacturingYear = $manufacturingYear;
        $this->model = $model;
        $this->status = 'active';
    }

    abstract public function getSpecifications();

    public function __toString() {
        return "Locomotive {$this->model} - SN: {$this->serialNumber}";
    }
}