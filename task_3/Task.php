<?php

class Task{
    private $name;
    private $description;
    private $due_date;
    private $status;

    public function __construct($name, $description, $due_date, $status) {
        $this->name = $name;
        $this->description = $description;
        $this->due_date = $due_date;
        $this->status = $status;
    }

    public static function createTask($name, $description, $due_date, $status) {
        return new self($name, $description, $due_date, $status);
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getDueDate() {
        return $this->due_date;
    }

    public function getStatus() {
        return $this->status;
    }
}