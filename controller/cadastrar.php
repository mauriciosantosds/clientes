<?php
require_once '../model/ClienteGateway.php';
require_once '../model/Connection.php';
require_once 'GeraLog.php';

try {
    $conn = Connection::open('database');
    ClienteGateway::setConnection($conn);
    //nova instancia da classe ClienteGateway
    $cg1 = new ClienteGateway();
    //passa valores para o objeto
    $cg1->nome = $_POST["nome"];
    $cg1->sobrenome = $_POST["snome"];
    $data = implode("-",array_reverse(explode("/",$_POST["dtnasc"])));
    $cg1->dtnasc = $data;
    $cg1->save();
    $gl = new GeraLog("../logs/cadastraClientes.txt");
    $gl->log(ClienteGateway::getLog());
    header("Location: ../view/cadastro.php"); 
} catch(Exception $e) {
    echo $e;
}