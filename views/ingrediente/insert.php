<?php
    require "../../autoload.php";

    // Construir o objeto do Ingrediente
    $ingrediente = new ingrediente();
    $ingrediente->setDescricao($_POST['descricao']);

    // Inserir no Banco de Dados
    $dao = new IngredienteDAO();
    $dao->create($ingrediente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');