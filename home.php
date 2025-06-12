<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <div class="sidebar">
        <a href="#">Início</a>
        <a href="livro_cadastrar.php">Cadastrar Livro</a>
    </div>

    <div class="content">

        <h1>Bem vindo !</h1>

        <h2>Livros</h2>

        <?php

        echo '<div class="row">';
        echo '<div class="col col-md-4">';
        echo '<table class="table table-striped">';

        // while ($tarefa_atual = mysqli_fetch_assoc($resultado)) {
        echo '<tr>';
        echo    '<td>' . /*$tarefa_atual['tarefa'] . */ '</td>';
        echo    '<td>';
        echo        '<a href="deletar_tarefa.php?id_tarefa=';
        /* echo          $tarefa_atual['id_tarefa'];*/
        echo        '" class="btn btn-outline-danger btn-sm">X  </a>';
        echo    '</td>';
        echo '</tr>';
        // }

        echo '</table>';
        echo '</div>';
        echo '</div>';

        ?>

    </div>



</body>

</html>