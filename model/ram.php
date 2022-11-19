<?php

class RAM {
    public $id;
    public $manufacturer;
    public $model;
    public $memory;
    public $modules;
    public $memorySpeed;
    public $memoryType;

    public function __construct($id = null, $manufacturer = null $model = null, $memory = null, $modules = null, $memorySpeed = null, $memoryType = null) {
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->memory = $memory;
        $this->modules = $modules;
        $this->memorySpeed = $memorySpeed;
        $this->memoryType = $memoryType;
    }
}