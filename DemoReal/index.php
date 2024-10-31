<?php

require_once __DIR__ . '/Locomotive/AbstractLocomotive.php';
require_once __DIR__ . '/Locomotive/Maintainable.php';
require_once __DIR__ . '/Locomotive/DieselLocomotive.php';
require_once __DIR__ . '/Locomotive/ElectricLocomotive.php';

use DemoReal\Locomotive\DieselLocomotive;
use DemoReal\Locomotive\ElectricLocomotive;

$dieselLoco = new DieselLocomotive(
    "DL-2024-001",
    2024,
    "CC201",
    3000, // HP
    5000  // L
);

$electricLoco = new ElectricLocomotive(
    "EL-2024-001",
    2024,
    "CC206",
    25, // kV
    120 // km/h
);

echo $dieselLoco;
echo $dieselLoco->getSpecifications();
echo "<br>";
echo $dieselLoco->scheduleMaintenance();
echo "<br>";
echo $dieselLoco->completeMaintenance();
echo "<br><br>";

echo $electricLoco;
echo $electricLoco->getSpecifications();
echo "<br>";
echo $electricLoco();
echo "<br>";
echo $electricLoco->scheduleMaintenance();
echo "<br><br>";
