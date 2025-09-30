<?php
    require "../../autoload.php";

    // Construir o objeto da Categoria
    $categoria = new Categoria();
    $categoria->setNome($_POST['nome']);

    // Atualizar registro no Banco de Dados
    $dao = new CategoriaDAO();
    $dao->update($categoria);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');