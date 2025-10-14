<?php
require __DIR__ . '/../vendor/autoload.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>

    <form action="create.php" method="POST">
        <label for="name">Nome:</label><br>
        <input type="text" id="name" name="name" placeholder="Digite o nome do produto" required><br><br>

        <label for="price">Preço:</label><br>
        <input type="number" id="price" name="price" step="0.01" placeholder="Ex: 49.90" required><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <p><a href="products.php">Ver produtos cadastrados</a></p>
</body>
</html>
