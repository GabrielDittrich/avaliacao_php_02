<?php
require_once 'functions.php';

if (form_null()) {
    header('location:cadastro.php?code=0');
    exit;
}

if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
    header('location:cadastro.php?code=2');
    exit;
}

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

require_once 'conect.php';

$conn = conect_db();

$check_email = "SELECT email FROM tb_user WHERE email = ?";
$check_stmt = mysqli_prepare($conn, $check_email);

if (!$check_stmt) {
    header('location:cadastro.php?code=3');
    exit;
}

mysqli_stmt_bind_param($check_stmt, 's', $email);
mysqli_stmt_execute($check_stmt);
mysqli_stmt_store_result($check_stmt);

if (mysqli_stmt_num_rows($check_stmt) > 0) {
    header('location:cadastro.php?code=4');
    exit;
}

mysqli_stmt_close($check_stmt);

$query = "INSERT INTO tb_user (name, email, password) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    header('location:cadastro.php?code=3');
    exit;
}

mysqli_stmt_bind_param($stmt, 'sss', $name, $email, $password);

if (!mysqli_stmt_execute($stmt)) {
    header('location:cadastro.php?code=3');
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

header('location:index.php?code=5');
?>