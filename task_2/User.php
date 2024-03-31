<?php

class User {
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public static function register($name, $email, $password) {
        return new self($name, $email, $password);
    }

    public static function isEmailTakenOrNExist($email, $users) {
        if (!strpos($email, '@')){
            return true;
        }
        foreach ($users as $user) {
            if ($user->getEmail() === $email) {
                return true;
            }
        }
        return false;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public static function displayAllUsers($users) {
        foreach ($users as $user) {
            echo "Ім'я: " . $user->getName() . ", Електронна адреса: " . $user->getEmail() . "\n";
        }
    }
}