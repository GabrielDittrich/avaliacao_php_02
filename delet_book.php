<?php require_once 'block.php';

    if (!isset($_GET['id_book'])) {
        header('location:livro_listagem.php?code=0');
        exit;
    }

    $id_book = (int)$_GET['id_book'];
    require_once 'conect.php';

    $conn = conect_db();

    $user_id = $_SESSION['id']; 

    $sql = "DELETE FROM tb_books WHERE id_book = $id_book AND
            user_id = $user_id";

    mysqli_query($conn, $sql);

    $linhas = mysqli_affected_rows($conn);

    if ($linhas <= 0) {
        header('location:livro_listagem.php?code=3');
        exit;
    }

    header('location:livro_listagem.php?code=7');   

?>