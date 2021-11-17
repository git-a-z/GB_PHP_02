<?php
include_once('db.php');
  
$start = $_POST['start'] ?? 0;
$result = mysqli_query($link, "SELECT * FROM image_gallery WHERE id > $start ORDER BY id ASC LIMIT 5;");
$images = [];

if ($result) {  
  while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row;
  }
}

print(json_encode([
  'images' => $images,
  'start' => $start,
]));

mysqli_close($link);
?>