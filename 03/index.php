<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';
include_once('db.php');

$loader = new FilesystemLoader(dirname(__FILE__) . '/templates');
$twig = new Environment($loader);
$title = 'Урок 3. Шаблонизаторы';
  
$result = mysqli_query($link, 'SELECT * FROM image_gallery ORDER BY clicks DESC;');
$images = [];

if ($result) {  
  while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
  }
}

try {
  echo $twig->render('gallery.twig', [
    'images' => $images,
    'title' => $title,
  ]);
} catch (Exception $exception) {
  var_dump($exception);
}

mysqli_close($link);
?>