<?php
session_start();
$_SESSION['is_compare'] = false;
$_SESSION['errors'] = [];
$_SESSION['result'] = [];

$firstName = explode(PHP_EOL, $_POST['first_name']);
$lastName = explode(PHP_EOL, $_POST['last_name']);
$text_2 = explode(PHP_EOL, $_POST['text_2']);

$errors = [];
$result = [];

$countLoop = 0;
if (count($firstName) >= count($lastName)) {
  $countLoop = count($firstName);
} else {
  $countLoop = count($lastName);
}

for ($i = 0; $i < $countLoop; $i++) {
  $fName = trim(strtolower($firstName[$i] ?? ''));
  $lName = trim(strtolower($lastName[$i] ?? ''));
  $isMatch = false;

  $name = '';

  if ($fName && $lName) {
    $name = $fName. ' '. $lName;
  } else if (!$fName || $fName == '-') {
    $name = $lName;
  } else if (!$lName || $lName == '-') {
    $name = $fName;
  }

  foreach ($text_2 as $text2) {
    $textRight = trim(strtolower($text2));
    if ($name == $textRight) {
      $isMatch = true;
    }
  }

  if (!$isMatch) {
    array_push($errors, $name);
    array_push($result, "<p class=\"font-weight-bold bg-danger text-light m-0 p-0\">{$name} ❎</p>");
  } else {
    array_push($result, "{$name} ✅");
  }
}

$_SESSION['errors'] = $errors;
$_SESSION['result'] = $result;
$_SESSION['is_compare'] = true;

header('location:index.php');

?>
