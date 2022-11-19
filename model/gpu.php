<?php

class GPU {
    public $id;
    public $manufacturer_id;
    public $model;
    public $memory;
    public $coreClock;
    public $memoryClock;
    public $tdp;

    public function __construct($id = null, $manufacturer_id = null, $model = null, $memory = null, $coreClock = null, $memoryClock = null, $tdp = null) {
        $this->id = $id;
        $this->manufacturer_id = $manufacturer_id;
        $this->model = $model;
        $this->memory = $memory;
        $this->coreClock = $coreClock;
        $this->memoryClock = $memoryClock;
        $this->tdp = $tdp;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM gpu";
        return $conn->query($q);
    }
}