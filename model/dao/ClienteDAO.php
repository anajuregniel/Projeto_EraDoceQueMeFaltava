<?php
    class ClienteDAO {
        public function create($cliente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO cliente(nomeCliente,telefone,email) 
                     VALUES (:n, :t, :e)"
                );
                $query->bindValue(':n',$cliente->getNomeCliente(), PDO::PARAM_STR);
                $query->bindValue(':t',$cliente->getTelefone(), PDO::PARAM_STR);
                $query->bindValue(':e',$cliente->getEmail(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM cliente");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $clientes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $cliente = new Cliente();
                    $cliente->setId($linha['id_cliente']);
                    $cliente->setNomeCliente($linha['nome_cliente']);
                    $cliente->setTelefone($linha['telefone']);
                    $cliente->setEmail($linha['email']);

                    array_push($clientes,$cliente);
                }

                return $clientes;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }