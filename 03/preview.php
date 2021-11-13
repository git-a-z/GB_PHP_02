<?php
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require_once dirname(__DIR__) . '/vendor/autoload.php';
include_once('db.php');

$loader = new FilesystemLoader(dirname(__FILE__) . '/templates');
$twig = new Environment($loader);
$title = 'Original size';
$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
  mysqli_query($link, 'UPDATE image_gallery SET clicks = clicks + 1 WHERE id = ' . $id);
  $result = mysqli_query($link, 'SELECT * FROM image_gallery WHERE id = ' . $id);
  $image = mysqli_fetch_assoc($result);

  if ($image) {
    try {
      echo $twig->render('originalSize.twig', [
        'image' => $image,
        'title' => $title,
      ]);
    } catch (Exception $exception) {
      var_dump($exception);
    }
  } else {
    die("Can't find image with id = " . $id);
  }  
}

mysqli_close($link);
?>