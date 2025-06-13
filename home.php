<?php require_once 'block.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
    }

    .sidebar {
        height: 100vh;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #1e1e2f;
        padding-top: 30px;
        box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
    }

    .sidebar a {
        padding: 15px 25px;
        text-decoration: none;
        font-size: 17px;
        color: #ddd;
        display: flex;
        align-items: center;
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }

    .sidebar a:hover {
        background-color: #2a2a40;
        color: #fff;
        border-left: 4px solid #4dabf7;
    }

    .sidebar a::before {
        content: "📌";
        margin-right: 10px;
        font-size: 14px;
    }

    .content {
        margin-left: 240px;
        padding: 40px;
    }

    .action-buttons {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        max-width: 320px;
    }

    .btn {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        font-size: 16px;
        text-decoration: none;
        border: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
        color: white;
    }

    .btn-add {
        background-color: #007bff;
    }

    .btn-add:hover {
        background-color: #0056b3;
    }

    .btn-view {
        background-color: #28a745;
    }

    .btn-view:hover {
        background-color: #1e7e34;
    }

    .btn-logout {
        background-color: #dc3545;
    }

    .btn-logout:hover {
        background-color: #a71d2a;
    }

    .tip-box {
        margin-top: 40px;
        background: white;
        padding: 25px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        max-width: 600px;
    }

    .tip-box h3 {
        margin-top: 0;
        font-size: 20px;
        color: #333;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .tip-box p {
        color: #555;
        margin-top: 10px;
        font-style: italic;
    }
</style>

<body>

    <div class="sidebar">
        <a href="home.php">Início</a>
        <a href="livro_cadastrar.php">Cadastrar Livro</a>
        <a href="livro_listagem.php">Livros Cadastrados</a>
    </div>

    <div class="content">
        <h1>Olá, <?= $_SESSION['name']; ?>! 👋</h1>
        <p>Seja bem-vindo ao sistema de gerenciamento de livros. Aqui você pode:</p>

        <div class="action-buttons">
            <a href="livro_cadastrar.php" class="btn btn-add">📚 Cadastrar novo livro</a>
            <a href="livro_listagem.php" class="btn btn-view">📖 Ver livros cadastrados</a>
            <a href="logout.php" class="btn btn-logout">🚪 Sair do sistema</a>
        </div>

        <div class="tip-box">
            <h3>💡 Dica do Dia</h3>
            <p>“A leitura de um bom livro é um diálogo incessante: o livro fala e a alma responde.”</p>
        </div>
    </div>

</body>

</html>
