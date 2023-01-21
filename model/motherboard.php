<?php

class Motherboard {
    public $id;
    public $manufacturer_id;
    public $model;
    public $formFactor;
    public $socket_id;
    public $memoryType_id;
    public $memorySlots;
    public $maxMemory;

    public function __construct($id = null, $manufacturer_id = null, $model = null, $formFactor = null, $socket_id = null, $memoryType_id = null, $memorySlots = null, $maxMemory = null) {
        $this->id = $id;
        $this->manufacturer_id = $manufacturer_id;
        $this->model = $model;
        $this->formFactor = $formFactor;
        $this->socket_id = $socket_id;
        $this->memoryType_id = $memoryType_id;
        $this->memorySlots = $memorySlots;
        $this->maxMemory = $maxMemory;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM motherboard";
        return $conn->query($q);
    }

    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM motherboard WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($id, $manufacturer_id, $model, $formFactor, $socket_id, $memoryType_id, $memorySlots, $maxMemory, mysqli $conn)
    {
        $q = "INSERT INTO motherboard(id, manufacturer_id, model, formFactor, socket_id, memoryType_id, memorySlots, maxMemory) values($id, $manufacturer_id, '$model', '$formFactor', $socket_id, $memoryType_id, $memorySlots, $maxMemory)";
        return $conn->query($q);
    }
}