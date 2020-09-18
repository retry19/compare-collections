<?php
session_start();
$_SESSION['is_compare'] = false;
$_SESSION['errors'] = [];
$_SESSION['result'] = [];

$text_1 = explode(PHP_EOL, $_POST['text_1']);
$text_2 = explode(PHP_EOL, $_POST['text_2']);

$errors = [];
$result = [];

foreach ($text_1 as $text1) {
  if ($text1 == '') {
    continue;
  }

  $textLeft = trim(strtolower($text1));
  $isMatch = false;

  foreach ($text_2 as $text2) {
    $textRight = trim(strtolower($text2));
    if ($textLeft === $textRight) {
      $isMatch = true;
    }
  }

  if (!$isMatch) {
    array_push($errors, $text1);
    array_push($result, "<p class=\"font-weight-bold bg-danger text-light m-0 p-0\">{$text1} ❎</p>");
  } else {
    array_push($result, "{$text1} ✅");
  }
}

$_SESSION['errors'] = $errors;
$_SESSION['result'] = $result;
$_SESSION['is_compare'] = true;

header('location:index.php');

?>
