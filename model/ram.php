<?php

class RAM {
    public $id;
    public $manufacturer_id;
    public $model;
    public $memory;
    public $modules;
    public $memorySpeed;
    public $memoryType_id;

    public function __construct($id = null, $manufacturer_id = null, $model = null, $memory = null, $modules = null, $memorySpeed = null, $memoryType_id = null) {
        $this->id = $id;
        $this->manufacturer_id = $manufacturer_id;
        $this->model = $model;
        $this->memory = $memory;
        $this->modules = $modules;
        $this->memorySpeed = $memorySpeed;
        $this->memoryType_id = $memoryType_id;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM ram";
        return $conn->query($q);
    }
}