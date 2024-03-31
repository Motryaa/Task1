<?php
class Product {
    private $name;
    private $price;
    private $category;

    public function __construct($name, $price, $category) {
        $this->setName($name);
        $this->setPrice($price);
        $this->setCategory($category);
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCategory() {
        return $this->category;
    }

    public function calculateDiscount($discountPercent) {
        if ($discountPercent>100){
            return 0.1;
        }
        $discountAmount = $this->price * ($discountPercent / 100);
        $this->setPrice($this->price - $discountAmount);
        return $this->getPrice();
    }
    public function displayInfo() {
        echo "Назва товару: " . $this->getName() . "\n";
        echo "Ціна товару: $" . $this->getPrice() . "\n";
        echo "Категорія товару: " . $this->getCategory() . "\n";
    }
}
