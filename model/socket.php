<?php

class Socket {
    public $id;
    public $name;

    public function __construct($id = null, $name = null) {
        $this->id = $id;
        $this->name = $name;
    }
}