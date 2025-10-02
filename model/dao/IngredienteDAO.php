<?php
    class IngredienteDAO {
        public function create($ingrediente) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO ingrediente(descricao) 
                     VALUES (:d)"
                );
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
                    $ingrediente->setId($linha['idingrediente']);
                    $ingrediente->setDescricao($linha['descricao']);

                    array_push($ingredientes,$ingrediente);
                }

                return $ingredientes;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
          public function find($id) {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM ingrediente WHERE idingrediente = :i");
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());

                $linha = $query->fetch(PDO::FETCH_ASSOC);
                $ingrediente = new Ingrediente();
                $ingrediente->setId($linha['idingrediente']);
                $ingrediente->setDescricao($linha['descricao']);
                return $ingrediente;
            }
            catch(PDOException $e) {
                echo "Erro #3: " . $e->getMessage();
            }
        }

        public function update($ingrediente) {
            try {
                $query = BD::getConexao()->prepare(
                    "UPDATE ingrediente 
                     SET descricao = :d 
                     WHERE idingrediente = :i"
                );
                $query->bindValue(':i',$ingrediente->getId(), PDO::PARAM_INT);
                $query->bindValue(':d',$ingrediente->getDescricao(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #4: " . $e->getMessage();
            }
        }

        public function destroy($id) {
            try {
                $query = BD::getConexao()->prepare(
                    "DELETE FROM ingrediente 
                     WHERE idingrediente = :i"
                );
                $query->bindValue(':i',$id, PDO::PARAM_INT);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #5: " . $e->getMessage();
            }
        }
    }