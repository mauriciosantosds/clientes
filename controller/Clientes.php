<?php
require_once '../model/ClienteGateway.php';
require_once '../model/Connection.php';
require_once 'GeraLog.php';
class Clientes {
    public function listaClientes() {
        try {
            $conn = Connection::open('database');
            ClienteGateway::setConnection($conn);
            $clientes = ClienteGateway::all();
            $gl = new GeraLog("../logs/listaClientes.txt");
            $gl->log(ClienteGateway::getLog());
            return $clientes;
        } catch(Exception $e) {
            echo $e;
        }
        return false;
    }
    
}
