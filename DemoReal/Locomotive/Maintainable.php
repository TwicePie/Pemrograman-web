<?php

namespace DemoReal\Locomotive;

trait Maintainable {
    public function scheduleMaintenance() {
        if ($this->status === 'active') {
            $this->status = 'maintenance';
            return "Locomotive {$this->serialNumber} scheduled for maintenance.";
        }
        return "Locomotive is not active.";
    }

    public function completeMaintenance() {
        if ($this->status === 'maintenance') {
            $this->status = 'active';
            return "Maintenance completed for locomotive {$this->serialNumber}.";
        }
        return "Locomotive is not in maintenance.";
    }
}