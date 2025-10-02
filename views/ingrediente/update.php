<?php
    require "../../autoload.php";

    // Construir o objeto do Ingrediente
    $ingrediente = new Ingrediente();
    $ingrediente->setId($_POST['idingrediente']);
    $ingrediente->setDescricao($_POST['descricao']);

    // Atualizar registro no Banco de Dados
    $dao = new IngredienteDAO();
    $dao->update($ingrediente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');