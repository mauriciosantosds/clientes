<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Clientes</title>
        <link rel="stylesheet" href="css/estilo.css">
    </head>
    <body>
        <nav class="header_menu">
            <ul>
                <li><a href="cadastrar_vendedor.php">Cadastrar e-mail vendedor</a></li>
                <li><a href="clientes.php">Listar clientes</a></li>
            </ul>
        </nav>
        <form action="../controller/cadastrar.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">
            <label for="snome">Sobrenome:</label>
            <input type="text" id="snome" name="snome">
            <label for="dtnasc">Data de nascimento:</label>
            <input type="text" id="dtnasc" name="dtnasc">
            <button type="submit">Cadastrar</button>
        </form>    
    </body>
</html>
