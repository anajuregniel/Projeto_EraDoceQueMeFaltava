<?php
    class IngredienteDAO {
        public function create($ingrediente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO ingrediente(idingrediente,descricao) 
                     VALUES (:i, :d)"
                );
                $query->bindValue(':i',$ingrediente->getIdIngrediente(), PDO::PARAM_STR);
                $query->bindValue(':d',$ingrediente->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM ingrediente");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $ingredientes = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $ingrediente = new Ingrediente();
                    $ingrediente->setId($linha['id_ingrediente']);
                    $ingrediente->setId($linha['descricao']);

                    array_push($ingredientes,$ingrediente);
                }

                return $ingrediente;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }