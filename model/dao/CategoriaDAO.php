<?php
    class CategoriaDAO {
        public function create($categoria) {
            try {
                $query = BD::getConexao()->prepare(
                    "INSERT INTO categoria(idCategoria,nome) 
                     VALUES (:i, :n)"
                );
                $query->bindValue(':i',$categoria->getIdCategoria(), PDO::PARAM_STR);
                $query->bindValue(':n',$categoria->getNome(), PDO::PARAM_STR);

                if(!$query->execute())
                    print_r($query->errorInfo());
            }
            catch(PDOException $e) {
                echo "Erro #1: " . $e->getMessage();
            }
        }

        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM categoria");
                

                if(!$query->execute())
                    print_r($query->errorInfo());

                $categorias = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $categoria = new Categoria();
                    $categoria->setId($linha['id_categoria']);
                    $categoria->setNome($linha['nome']);

                    array_push($categorias,$categoria);
                }

                return $categorias;
            }
            catch(PDOException $e) {
                echo "Erro #2: " . $e->getMessage();
            }
        }
    }