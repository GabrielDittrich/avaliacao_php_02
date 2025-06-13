<?php require_once 'functions.php';

    if (form_null()) {
        header('location:index.php?code=0');
        exit;
    }

    if (form_empty()) { 
        header('location:index.php?code=2');
        exit;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    require_once 'conect.php';

    $conn = conect_db();

    $query = "SELECT * FROM tb_user WHERE email = ? AND password = ?";

    $stmt = mysqli_prepare($conn, $query);

    if(!$stmt) {
        header('location:index.php?code=3');
        exit;
    }

    mysqli_stmt_bind_param($stmt, 'ss', $email, $password);
    
    if (!mysqli_execute($stmt)){
        header('location:index.php?code=4'); 
        exit;
    }

    mysqli_stmt_store_result($stmt);

    $rows = mysqli_stmt_num_rows($stmt);

    if ($rows <= 0) {
        header('location:index.php?code=1');
        exit();
    }

    mysqli_stmt_bind_result($stmt, $id, $name, $email, $password);

    mysqli_stmt_fetch($stmt);

    session_start();
    $_SESSION['id'] = $id;
    $_SESSION['name'] = $name;
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $email;

    header('location:home.php');

?>