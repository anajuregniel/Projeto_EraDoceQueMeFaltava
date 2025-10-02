<?php
    require "../../autoload.php";

    // Construir o objeto do Cliente
    $cliente = new Cliente();
    $cliente->setNomeCliente($_POST['nome_cliente']);
    $cliente->setTelefone($_POST['telefone']);
    $cliente->setEmail($_POST['email']);

    // Inserir no Banco de Dados
    $dao = new ClienteDAO();
    $dao->create($cliente);

    // Redirecionar para o index (Comentar quando não funcionar)
    header('Location: index.php');