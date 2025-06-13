<?php

function form_null()
{
    return $_SERVER['REQUEST_METHOD'] !== 'POST';
}

function form_empty()
{
    return empty($_POST['email']) || empty($_POST['password']);
}

function errors()
{

    if (!isset($_GET['code'])) {
        return;
    }

    $code = (int)$_GET['code'];

    switch ($code) {

        case 0:
            $erro = '<h3>Você não pode acessar essa página sem o login, por favor, faça o login!</h3>';
            break;

        case 1:
            $erro = '<h3>Usuário ou senha inválidos.</h3>';
            break;

        case 2:
            $erro = '<h3>Por favor, preencha todos os campos do form.</h3>';
            break;

        case 3:
            $erro = '<h3>Erro no sistema, por favor, tente novamente</h3>';
            break;

        case 4:
            $erro = '<h3>Email ja sendo utilizado, tente outro</h3>';
            break;

        case 5:
            $erro = '<h3>Cadastro bem sucedido! Faça login para continuar</h3>';
            break;

        case 6:
            $erro = '<h3>Cadastro bem sucedido! Visualize seus Livros Clicando <a href="livro_listagem.php">Aqui</a> </h3>';
            break;

        case 7:
            $erro = '<h3>Livro Deletado com Sucesso !</h3>';
            break;
        default:
            $erro = "";
            break;
    }

    echo $erro;
}
