<?php

class CPU {
    public $id;
    public $manufacturer_id;
    public $model;
    public $coreClock;
    public $coreCount;
    public $tdp;
    public $socket_id;
    public $memoryType_id;

    public function __construct($id = null, $manufacturer_id = null, $model = null, $coreClock = null, $coreCount = null, $tdp = null, $socket_id = null, $memoryType_id = null) {
        $this->id = $id;
        $this->manufacturer_id = $manufacturer_id;
        $this->model = $model;
        $this->coreClock = $coreClock;
        $this->coreCount = $coreCount;
        $this->tdp = $tdp;
        $this->socket_id = $socket_id;
        $this->memoryType_id = $memoryType_id;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM cpu";
        return $conn->query($q);
    }
}