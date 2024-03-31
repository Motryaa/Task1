<?php
include "Task.php";
$tasks = [];

function displayMenu() {
    echo "1. Додати нове завдання\n";
    echo "2. Змінити статус завдання\n";
    echo "3. Видалити завдання\n";
    echo "4. Показати список завдань\n";
    echo "5. Вийти\n";
}

$selectedOption = 0;

while ($selectedOption != 5) {
    displayMenu();
    echo "Виберіть опцію: ";
    $selectedOption = (int) readline();

    switch ($selectedOption) {
        case 1:
            echo "Введіть назву завдання: ";
            $name = readline();
            echo "Введіть опис завдання: ";
            $description = readline();
            echo "Введіть дедлайн: ";
            $due_date = readline();
            echo "Введіть статус завдання: ";
            $status = readline();

            $task = Task::createTask($name, $description, $due_date, $status);
            $tasks[] = $task;
            echo "Завдання успішно додане\n";
            break;
        case 2:
            echo "Введіть номер завдання для зміни статусу: ";
            $index = (int) readline()-1;
            if (isset($tasks[$index])) {
                echo "Введіть новий статус для завдання: ";
                $new_status = readline();
                $tasks[$index]->setStatus($new_status);
            } else {
                echo "Завдання з таким номером не існує\n";
            }
            break;
        case 3:
            echo "Введіть номер завдання для видалення: ";
            $index = (int) readline()-1;
            if (isset($tasks[$index])) {
                unset($tasks[$index]);
                $tasks = array_values($tasks);
                echo "Завдання видалено\n";
            } else {
                echo "Завдання з таким номером не існує\n";
            }
            break;
        case 4:
            echo "Список завдань:\n";
            foreach ($tasks as $index => $task) {
                echo "Завдання " . ($index + 1) . ":\n";
                echo "Назва: " . $task->getName() . "\n";
                echo "Опис: " . $task->getDescription() . "\n";
                echo "Дата завершення: " . $task->getDueDate() . "\n";
                echo "Статус: " . $task->getStatus() . "\n\n";
            }
            break;
        case 5:
            echo "ГГ\n";
            break;
        default:
            echo "Неправильний вибір опції\n";
            break;
    }
}
