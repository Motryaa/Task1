<?php
include "User.php";
$users = [];

function displayMenu() {
    echo "1. Зареєструвати нового користувача\n";
    echo "2. Пул користувачів\n";
}

$selectedOption = 0;

while (true) {
    displayMenu();
    echo "Виберіть опцію: ";
    $selectedOption = (int) readline();

    switch ($selectedOption) {
        case 1:
            echo "Введіть ім'я користувача: ";
            $name = readline();
            echo "Введіть електронну адресу: ";
            $email = readline();
            echo "Введіть пароль: ";
            $password = readline();

            if (!User::isEmailTakenOrNExist($email, $users)) {
                $user = User::register($name, $email, $password);
                $users[] = $user;
                echo "Користувач зареєстрований успішно.\n";
            } else {
                echo "Користувач з такою електронною адресою вже існує або адреса введена неправильно\n";
            }
            break;
        case 2:
            User::displayAllUsers($users);
            break;
        default:
            echo "Неправильний вибір опції\n";
            break;
    }
}
