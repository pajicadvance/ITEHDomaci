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

    public static function deleteById($id, mysqli $conn)
    {
        $q = "DELETE FROM ram WHERE id=$id";
        return $conn->query($q);
    }

    public static function add($id, $manufacturer_id, $model, $memory, $modules, $memorySpeed, $memoryType_id, mysqli $conn)
    {
        $q = "INSERT INTO ram(id, manufacturer_id, model, memory, modules, memorySpeed, memoryType_id) values($id, $manufacturer_id, '$model', $memory, $modules, $memorySpeed, $memoryType_id)";
        return $conn->query($q);
    }
}