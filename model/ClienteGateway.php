<?php
class ClienteGateway {
    private static $conn;
    private $data;
    private static $log;

    function __get($prop) {
        return $this->data[$prop];
    }

    function __set($prop, $value) {
        $this->data[$prop] = $value;
    }

    public static function getLog() {
        return self::$log;
    }

    public static function setConnection( PDO $conn ) {
        self::$conn = $conn;
    }

    public function find($id) {
        $sql = "SELECT * FROM cliente where id = '$id'";
        self::$log = $sql;
        $result = self::$conn->query($sql);
        return $result->fetchObject(__CLASS__);
    }

    public function all($filter = '') {
        $sql = "SELECT * FROM cliente  ";
        if ($filter) {
            $sql .= "where $filter";
        }
        self::$log = $sql;
        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public function delete() {
        $sql = "DELETE FROM cliente where id = '{$this->id}' ";
        self::$log = $sql;
        return self::$conn->query($sql);
    }

    public function save() {
        if (empty($this->data['id'])) {
            $sql = "INSERT INTO cliente (nome, sobrenome, dtnasc) ".
                            "VALUES ('{$this->nome}', " .
                                    "'{$this->sobrenome}', " .
                                    "'{$this->dtnasc}')";
        }
        else {
        $sql = "UPDATE cliente SET nome     = '{$this->nome}', " .
                            "      sobrenome       = '{$this->sobrenome}', "  .
                            "      dtnasc   = '{$this->dtnasc}' " .
                            "WHERE id            = '{$this->id}'";
        }
        self::$log = $sql;
        return self::$conn->exec($sql); // executa instrucao SQL
    }

}