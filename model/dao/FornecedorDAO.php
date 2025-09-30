<?php
    class FornecedorDAO {
        public function create($fornecedor) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO fornecedor(cnpj,razao_social,email,telefone) 
                     VALUES (:c, :r, :e, :t)"
                );
                $query->bindValue(':c',$fornecedor->getCnpj(), PDO::PARAM_STR);
                $query->bindValue(':r',$fornecedor->getRazaoSocial(), PDO::PARAM_STR);
                $query->bindValue(':e',$fornecedor->getEmail(), PDO::PARAM_STR);
                $query->bindValue(':t',$fornecedor->getTelefone(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM fornecedor");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $fornecedores = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $fornecedor = new Fornecedor();
                    $fornecedor->setId($linha['id_fornecedor']);
                    $fornecedor->setCnpj($linha['cnpj']);
                    $fornecedor->setRazaoSocial($linha['razao_social']);
                    $fornecedor->setEmail($linha['email']);
                    $fornecedor->setTelefone($linha['telefone']);

                    array_push($fornecedores,$fornecedor);
                }

                return $fornecedores;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }