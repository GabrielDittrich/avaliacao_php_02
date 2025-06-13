<?php require_once 'block.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Livros</title>
</head>

<style>
    body {
        margin: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f2f4f8;
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
        margin-left: 270px;
        padding: 50px 40px;
    }

    .form-container {
        background-color: #fff;
        max-width: 600px;
        padding: 35px 30px;
        border-radius: 12px;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        animation: fadeIn 0.3s ease;
    }

    .form-container h2 {
        margin-bottom: 25px;
        font-size: 24px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #444;
    }

    input[type="text"],
    textarea {
        width: 80%;
        padding: 12px 14px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 16px;
        background-color: #fafafa;
        transition: border-color 0.2s, background-color 0.2s;
        margin-bottom: 20px;
    }

    input[type="text"]::placeholder,
    textarea::placeholder {
        color: #999;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #4dabf7;
        background-color: #fff;
        outline: none;
    }

    textarea {
        min-height: 120px;
        resize: vertical;
    }

    button[type="submit"] {
        background-color: #4dabf7;
        color: #fff;
        padding: 12px 22px;
        border: none;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    button[type="submit"]:hover {
        background-color: #339af0;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(15px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body>
    <div class="sidebar">
        <a href="home.php">Início</a>
        <a href="livro_cadastrar.php">Cadastrar Livro</a>
        <a href="livro_listagem.php">Livros Cadastrados</a>
    </div>

    <div class="content">
        <div class="form-container">
            <h2>📘 Cadastrar novo livro</h2>
            <?php

            require_once 'functions.php';

            errors();

            ?>
            <form action="cadastrar_livros.php" method="post">
                <label for="title">Título do Livro</label>
                <input type="text" name="title" id="title" placeholder="Ex: O Senhor dos Anéis" />

                <label for="description">Descrição</label>
                <textarea name="description" id="description" placeholder="Descreva sobre o livro"></textarea>

                <button type="submit">Cadastrar Livro</button>
            </form>
        </div>
    </div>
</body>

</html>