<?php

class Motherboard {
    public $id;
    public $manufacturer;
    public $formFactor;
    public $socket;
    public $chipset;
    public $memoryType;
    public $memorySlots;
    public $maxMemory;

    public function __construct($id = null, $manufacturer = null $formFactor = null, $socket = null, $chipset = null, $memoryType = null, $memorySlots = null, $maxMemory = null) {
        $this->id = $id;
        $this->manufacturer = $manufacturer;
        $this->formFactor = $formFactor;
        $this->socket = $socket;
        $this->chipset = $chipset;
        $this->memoryType = $memoryType;
        $this->memorySlots = $memorySlots;
        $this->maxMemory = $maxMemory;
    }
}