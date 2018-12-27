<?php
 $handler = fopen("vendedor.txt", 'w');
 fwrite($handler, $_POST["email"]);
 fclose($handler);
 $handler = fopen("vendedorsenha.txt", 'w');
 fwrite($handler, $_POST["senha"]);
 fclose($handler);
 header("Location: ../view/clientes.php");