<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
  <nav class="header_menu">
      <ul>
          <li><a href="cadastro.php">Cadastrar cliente</a></li>
          <li><a href="cadastrar_vendedor.php">Cadastrar e-mail vendedor</a></li>
          <li><a href="clientes.php">Listar clientes</a></li>
      </ul>
  </nav>

  <table id="customers">
    <tr>
      <th>Ações</th>
      <th>Nome</th>
      <th>Sobrenome</th>
      <th>Data de nascimento</th>
    </tr>
    <?php require '../controller/Clientes.php';
    $c1 = new Clientes();
    $clientes = $c1->listaClientes();
    foreach ($clientes as $cli) {
        echo "<tr>
                  <td><a href='../controller/deletar.php?id=".$cli->id."'>Deletar</a>
                  <a href='../controller/editar.php?id=".$cli->id."'>Editar</a>
                  </td>
                  <td>".$cli->nome."</td>
                  <td>".$cli->sobrenome."</td>
                  <td>".$cli->dtnasc."</td>
              </tr>";
    }
    ?>
    
    
  </table>

</body>
</html>