<?php
  $title = 'Урок 1. ООП в PHP. Базовые понятия';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    echo $title;
    ?>
  </title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <?php
  echo '<h1>' . $title . '</h1>';
  echo '<hr>';
  echo 'Задания 1-4.<br><br>';
  
  class Product { // класс Товар
    protected $name; // название товара  
    protected $price; // цена товара 
    protected $discount; // процент скидки
    protected $description; // описание товара

    public function __construct($name, $price, $discount=10, $description='') {
      $this->name = $name;
      $this->price = $price;
      $this->discount = $discount;
      $this->description = $description;
    } // конструктор товара

    public function getName() {
      echo $this->name . '<br>';
    } // получить название товара

    public function getPrice() {
      echo $this->price . '<br>';
    } // получить цену товара

    public function getDiscountPrice() {
      echo ($this->price * (100 - $this->discount) / 100) . '<br>';
    } // получить цену товара со скидкой
  }

  class Book extends Product{ // класс Книга наследует класс Товар
    protected $author; // автор книги
    protected $release_year; // год выпуска книги

    public function __construct($name, $price, $author, $discount=10, $description='', $release_year=null) {
      parent::__construct($name, $price, $discount, $description);
      $this->author = $author;
      $this->release_year = $release_year ?? 2000;
    } // вызов родительского конструктора + заполнение своих полей

    public function getName() {
      echo $this->name . ' by ' . $this->author . ' (' . $this->release_year . ')<br>';
    } // переопределение метода родителя (класс Товар) для класса Книга
  }
 
  $product1 = new Product('Product 1', 100);
  $product1->getName();
  $product1->getPrice();
  $product1->getDiscountPrice();
  echo '<br>';

  $product2 = new Product('Product 2', 100, 15);
  $product2->getName();
  $product2->getPrice();
  $product2->getDiscountPrice();
  echo '<br>';

  $book1 = new Book('Book 1', 100, 'Author A');
  $book1->getName();
  $book1->getPrice();
  $book1->getDiscountPrice();
  echo '<br>';

  $book2 = new Book('Book 2', 100, 'Author B', 20, '', 2015);
  $book2->getName();
  $book2->getPrice();
  $book2->getDiscountPrice();
  echo '<br>';
  echo '<hr>';

  //

  echo 'Задание 5.<br><br>';
  class A {
    public function foo() {
      static $x = 0;
      echo ++$x . '<br>';
    }
  }

  $a1 = new A();
  $a2 = new A();
  $a1->foo(); // 1
  $a2->foo(); // 2
  $a1->foo(); // 3
  $a2->foo(); // 4
  echo '<br>Статическая переменная метода увеличивается на 1 
  при каждом вызове' . '<br>';
  echo '<hr>';

  //

  echo 'Задание 6.<br><br>';
  class A1 {
    public function foo() {
      static $x = 0;
      echo ++$x . '<br>';
    }
  }

  class B1 extends A1 {}

  $a1 = new A1();
  $b1 = new B1();
  $a1->foo(); // 1
  $b1->foo(); // 1
  $a1->foo(); // 2
  $b1->foo(); // 2
  echo '<br>Статическая переменная метода увеличивается на 1 
  при каждом вызове только для своего класса' . '<br>';
  echo '<hr>';

  //

  echo 'Задание 7.<br><br>';
  class A2 {
    public function foo() {
      static $x = 0;
      echo ++$x . '<br>';
    }
  } 

  class B2 extends A2 {}

  $a1 = new A2;
  $b1 = new B2;
  $a1->foo(); // 1
  $b1->foo(); // 1
  $a1->foo(); // 2
  $b1->foo(); // 2
  echo '<br>Статическая переменная метода увеличивается на 1 
  при каждом вызове только для своего класса. 
  Создание объекта new A() равнозначно new A, 
  если не передаются параметры в конструктор класса.' . '<br>';
  ?>  
</body>
</html>