<?php

class GPU {
    public $id;
    public $manufacturer;
    public $model;
    public $memory;
    public $coreClock;
    public $memoryClock;
    public $tdp;

    public function __construct($id = null, $manufacturer = null $model = null, $memory = null, $coreClock = null, $memoryClock = null, $tdp = null) {
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->model = $model;
        $this->memory = $memory;
        $this->coreClock = $coreClock;
        $this->memoryClock = $memoryClock;
        $this->tdp = $tdp;
    }
}