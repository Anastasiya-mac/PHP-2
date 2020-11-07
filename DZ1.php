<pre>
<?php

class Product {
    public $id;
    public $category_id;
    public $name;
    public $price;

    public function __construct($id, $category_id, $name, $price) {
        $this->id = $id;
        $this->category_id = $category_id;
        $this->name = $name;
        $this->price = $price;
    }
    //скидка 10% на товар
    public function sale() {
        $this->price = $this->price - (int)($this->price / 100 * 10);
        return $this->price;
    }
}

class TechProduct extends Product {
    public $manufacturer;
    public function __construct($id, $category_id, $name, $price, $manufacturer) {
        parent::__construct($id, $category_id, $name, $price);
        $this->manufacturer = $manufacturer;
    }
    //скидка 20% на товар
    public function sale() {
        $this->price = $this->price - (int)($this->price / 100 * 20);
        return $this->price;
    }
}

$product = new Product(1, 1, 'T-Short', 300);
var_dump($product);
var_dump($product -> sale());
$techProduct = new TechProduct(1, 2, 'MacBook', 300, 'Apple');
var_dump($techProduct);
var_dump($techProduct -> sale());

//---------------------------------------------
/*5. Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A(); 
$a1->foo(); // 1
$a2->foo(); //2
$a1->foo(); //3
$a2->foo(); //4
// Т.к. ++$x работает по принципу сначало увеличение, а потом возврат значения
// Если бы $x++ было бы - 0123
//---------------------------------------------
//Немного изменим п.5:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); //1
$b1->foo(); //1
$a1->foo(); //2
$b1->foo(); //2

// Результаты генерируются по тому же принципу, что и в п.5, но параллельно в двух классах
// В п.7 разница в отсутствии скобок при создании экземпляра класса и если я правильно понимаю, никакого влияния на ход выполнения кода это не имеет