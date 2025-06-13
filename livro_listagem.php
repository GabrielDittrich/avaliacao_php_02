<?php require_once 'block.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Livros Cadastrados</title>

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
      margin-left: 270px;
      padding: 50px 40px;
    }

    h1 {
      margin-bottom: 30px;
      color: #333;
    }

    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 25px;
    }

    .card {
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
      padding: 20px 24px;
      transition: transform 0.2s ease;
      position: relative;
    }

    .card:hover {
      transform: translateY(-4px);
    }

    .card h3 {
      margin-top: 0;
      color: #4dabf7;
      font-size: 20px;
    }

    .card p {
      color: #555;
      margin-top: 10px;
      font-size: 15px;
      line-height: 1.4;
    }

    .delete-btn {
      position: absolute;
      top: 15px;
      right: 15px;
      background-color: transparent;
      border: none;
      cursor: pointer;
      font-size: 18px;
      color: #ff4d4d;
    }

    .delete-btn:hover {
      color: #e60000;
    }

    .no-books {
      color: #666;
      font-style: italic;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <div class="sidebar">
    <a href="home.php">Início</a>
    <a href="livro_cadastrar.php">Cadastrar Livro</a>
    <a href="livro_listagem.php">Livros Cadastrados</a>
  </div>

  <div class="content">
    <h1>📚 Livros cadastrados</h1>

    <div class="grid">
      <?php
      require_once 'functions.php';
      errors();
      require_once 'conect.php';

      $conn = conect_db();
      $id = $_SESSION['id'];

      $sql = "SELECT id_book, title, description FROM tb_books WHERE user_id = $id";
      $result = mysqli_query($conn, $sql);
      $rows = mysqli_num_rows($result);

      if ($rows < 0) {
        exit("<h3>Tente novamente depois</h3>");
      }

      if ($rows == 0) {
        exit("<h3 class='no-books'>Não há livros cadastrados</h3>");
      }

      while ($books = mysqli_fetch_assoc($result)) {
        echo "<div class='card'>
                <a href='delet_book.php?id_book=" . $books['id_book'] . "' class='delete-link' title='Excluir livro' onclick='return confirm(\"Tem certeza que deseja excluir este livro?\")'>🗑️</a>
                <h3>" . $books['title'] . "</h3>
                <p>" . $books['description'] . "</p>
              </div>";
      }
      ?>
    </div>
  </div>

</body>

</html>
