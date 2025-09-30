<?php
    class Cliente {
        // Atributos
        private $id;
        private $nomeCliente;
        private $telefone;
        private $email;

        // Métodos
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNomeCliente() {
            return $this->nomeCliente;
        }

        public function setNomeCliente($nomeCliente) {
            $this->nomeCliente = $nomeCliente;
        }

        public function getTelefone() {
            return $this->telefone;
        }

        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }

                public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        // Método para retornar uma string do objeto
        public function __toString() {
            return $this->nomeCliente;
        }
    }