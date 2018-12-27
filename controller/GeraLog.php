<?php
class GeraLog {
    private $filename;

    public function __construct($filename) {
        $this->filename = $filename;
    }

    public function log($text) {
        date_default_timezone_set('America/Sao_Paulo');
        $time = date("Y-m-d H:i:s");

        //monta a string
        $text = "$time :: $text\n";

        //adiciona ao final do arquivo
        $handler = fopen($this->filename, 'a');
        fwrite($handler, $text);
        fclose($handler);
    }
}