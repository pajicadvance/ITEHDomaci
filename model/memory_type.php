<?php

class MemoryType {
    public $id;
    public $name;

    public function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }

    public static function getAll(mysqli $conn)
    {
        $q = "SELECT * FROM memory_type";
        return $conn->query($q);
    }
}