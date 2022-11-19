<?php

class CPU {
    public $id;
    public $manufacturer;
    public $model;
    public $coreClock;
    public $coreCount;
    public $tdp;
    public $socket;
    public $memoryType;

    public function __construct($id = null, $manufacturer = null $model = null, $coreClock = null, $coreCount = null, $tdp = null, $socket = null, $memoryType = null) {
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->coreClock = $coreClock;
        $this->coreCount = $coreCount;
        $this->tdp = $tdp;
        $this->socket = $socket;
        $this->memoryType = $memoryType;
    }
}