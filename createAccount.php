<?php

session_start();
$email = $_POST['email'];
$password = $_POST['password'];

var_dump($email);
echo '<br>';
var_dump($password);
echo '<br>';

$pdo = new PDO('sqlite:database.db');

$query = $pdo->query("SELECT * FROM users WHERE email = '{$email}';");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);

if (!empty($result)) {
    $_SESSION['error']['email'] = "Your email <strong>{$email}</strong> is already being used!";
}

$query = $pdo->query("SELECT * FROM users WHERE password = '{$password}';");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
var_dump($result);

if (!empty($result)) {
    $_SESSION['error']['password'] = "Your password <strong>{$password}</strong> is already being used by the account <strong>{$result[0]['email']}</strong>!";
}

var_dump($_SESSION);

if(empty($_SESSION['error'])) {
    $insert = $pdo->prepare("INSERT INTO users (email, password) VALUES ('$email', '$password')")->execute();
    $_SESSION['success'] = 'Your account was created successfully!';
}

header("Location: " . '/');

exit;