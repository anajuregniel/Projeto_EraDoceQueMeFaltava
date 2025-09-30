<?php
    require "../../autoload.php";

    // Construir o objeto do Cliente
    $cliente = new Cliente();
    $cliente->setNome($_POST['nome']);

    // Atualizar registro no Banco de Dados
    $dao = new ClienteDAO();
    $dao->update($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');