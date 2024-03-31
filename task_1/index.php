<?php
include "Product.php";
function displayMenu() {
    echo "1. Створити новий об'єкт товару\n";
    echo "2. Додати знижку до товару\n";
    echo "3. Вивести інформацію про об'єкт товару\n";
    echo "4. Вийти\n";
}

$selectedOption = 0;
$product = null;

while ($selectedOption != 4) {
    displayMenu();
    echo "Виберіть опцію: ";
    $selectedOption = (int) readline();

    switch ($selectedOption) {
        case 1:
            echo "Введіть назву товару: ";
            $name = readline();
            echo "Введіть ціну товару: ";
            $isprice = readline();
            if (is_numeric($isprice)){
                $price=(float)$isprice;
            }
            else{
                echo "Ціна має бути числом\n1";
                break;
            }
            echo "Введіть категорію товару: ";
            $category = readline();

            $product = new Product($name, $price, $category);
            echo "Об'єкт товару створено\n";
            break;
        case 2:
            if ($product !== null) {
                echo "Введіть величину знижки (%): ";
                $discountPercent = readline();

                $discountedPrice = $product->calculateDiscount($discountPercent);
                echo "Ціна товару після знижки ($discountPercent%): $" . number_format($discountedPrice, 2) . "\n";
            } else {
                echo "Спочатку створіть об'єкт\n";
            }
            break;
        case 3:
            if ($product !== null) {
                echo "Інформація про об'єкт товару:\n";
                $product->displayInfo();
            } else {
                echo "Спочатку створіть об'єкт товару\n";
            }
            break;
        case 4:
            echo "Програма завершена.\n";
            break;
        default:
            echo "Неправильний вибір опції. Будь ласка, спробуйте ще раз.\n";
            break;
    }
}



