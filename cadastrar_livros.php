<?php require_once 'block.php';

require_once 'functions.php';

if (form_null()) {
    header('location:livro_cadastrar.php?code=0');
    exit;
}

if (empty($_POST['title']) || empty($_POST['description'])) {
    header('location:livro_cadastrar.php?code=2');
    exit;
}

$title = $_POST['title'];
$description = $_POST['description'];
$user_id = $_SESSION['id'];

require_once 'conect.php';

$conn = conect_db();

$sql = "INSERT INTO tb_books (title, description, user_id) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    header('location:livro_cadastrar.php?code=3');
    exit;
}

mysqli_stmt_bind_param($stmt, 'ssi', $title, $description, $user_id);

if (!mysqli_stmt_execute($stmt)) {
    header('location:livro_cadastrar.php?code=3');
    exit;
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

header('location:livro_cadastrar.php?code=6');
