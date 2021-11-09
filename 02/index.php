<?php
  $title = 'Урок 2. ООП в PHP. Расширенное изучение';
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
  echo '1. Создать структуру классов ведения товарной номенклатуры.<br><br>';
  
  abstract class AbstractProduct 
  {
    protected $name; 
    protected $price;

    abstract public function getFinalPrice();

    public function __construct(string $name, float $price) 
    {
      $this->name = $name;
      $this->price = $price;
    }

    public function getName()
    {
      return $this->name;
    }    
  }

  class DigitalProduct extends AbstractProduct
  {
    public function getFinalPrice() 
    {
      echo $this->getName() . ' costs: ' . $this->price . '<br>';
    }
  }

  class PieceProduct extends AbstractProduct
  {
    public function getFinalPrice() 
    {
      echo $this->getName() . ' costs: ' . $this->price * 2 . '<br>';
    }
  }

  class WeightProduct extends AbstractProduct
  {
    protected $weight;

    public function __construct(string $name, float $price, float $weight) 
    {
      parent::__construct($name, $price);
      $this->weight = $weight;
    }

    public function getFinalPrice() 
    {
      echo $this->getName() . ' costs: ' . $this->price * $this->weight . '<br>';
    }
  }
 
  $digitalProduct = new DigitalProduct('DigitalProduct', 1.50);
  $digitalProduct->getFinalPrice();
  echo '<br>';

  $pieceProduct = new PieceProduct('PieceProduct', 1.50);
  $pieceProduct->getFinalPrice();
  echo '<br>';

  $weightProduct = new WeightProduct('WeightProduct', 1.50, 3.111);
  $weightProduct->getFinalPrice();
  echo '<br>';
  
  //

  echo '<hr>';
  echo '2. *Реализовать паттерн Singleton при помощи traits.<br><br>';

  trait SingletonTrait
  {
    protected static $self;

    public static function getSingleton()
    {
      if (self::$self === null) {
        self::$self = new self();
      }

      return self::$self;
    }
  }

  class Test
  {
    use SingletonTrait;
  
    public $value = 0;
  }

  $test = Test::getSingleton();
  echo $test->value; // 0
  echo '<br>';

  $test->value = 42;
  echo $test->value; // 42
  echo '<br>';

  $test2 = Test::getSingleton();
  echo $test2->value; // 42
  echo '<br>';
?>  
</body>
</html>