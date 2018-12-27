<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <nav class="header_menu">
        <ul>
            <li><a href="cadastro.php">Cadastrar cliente</a></li>
            <li><a href="clientes.php">Listar clientes</a></li>
        </ul>
    </nav>
    <form action="../controller/cadastrar_vendedor.php" method="POST">
            <label for="email">E-Mail:</label>
            <input type="text" id="email" name="email">
            <label for="senha">Senha:</label>
            <input type="text" id="senha" name="senha">
            <button type="submit">Cadastrar</button>
    </form> 
</body>
</html>