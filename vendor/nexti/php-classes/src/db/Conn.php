<?php
    /**
     * Classe para Conexão com o banco de dados
     * 
     * @author Allan Camargo 09/04/2019
     */


     Class Conn {
        const db_host = "127.0.0.1";
        const db_user = "root";
        const db_password = "";
        const db_name = "db_igreja";

        private $Conn;

        public function __construct() {
            $this -> Conn = new \PDO("mysql:dbname=" . Conn::db_name . ";host=" . Conn::db_host, Conn::db_user, Conn::db_password);
        }

        private function setParams($statement, $parameters = array()) {
            foreach($parameters as $key => $value) {
                $this -> bindParam($statement, $key, $value);
            }
        }


        public function bindParam($statement, $key, $value) {
            $statement -> bindParam($key, $value);
        }

        public function query($rawQuery, $params = array()) {
            $stmt = $this -> Conn -> prepare($rawQuery);
            $this -> setParams($stmt, $params);
            $stmt -> execute();
        }

        public function select($rawQuery, $params = array() ) :array {
            $stmt = $this -> Conn -> prepare($rawQuery);
            $this -> setParams($stmt, $params);
            $stmt -> execute();

            return $stmt -> fetchAll(\PDO::FETCH_ASSOC);
        }




         

     }



?>