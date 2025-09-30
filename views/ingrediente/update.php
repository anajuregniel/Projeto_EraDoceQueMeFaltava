<?php
    require "../../autoload.php";

    // Construir o objeto do Ingrediente
    $ingrediente = new Ingrediente();
    $ingrediente->setNome($_POST['nome']);

    // Atualizar registro no Banco de Dados
    $dao = new IngredienteDAO();
    $dao->update($ingrediente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');