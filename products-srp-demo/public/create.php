<?php
require __DIR__ . '/../vendor/autoload.php';

use App\Application\ProductService;
use App\Infra\FileProductRepository;
use App\Domain\SimpleProductValidator;

$productService = new ProductService(
    new FileProductRepository(),
    new SimpleProductValidator()
);

$response = $productService->create($_POST);

if ($response['success']) {
    http_response_code(201);
    echo "<p>✅ Produto cadastrado com sucesso!</p>";
    echo '<p><a href="products.php">Ver lista de produtos</a></p>';
} else {
    http_response_code(422);
    echo "<h3>⚠️ Erro(s) ao cadastrar:</h3>";
    echo "<ul>";
    foreach ($response['errors'] as $error) {
        echo "<li>{$error}</li>";
    }
    echo "</ul>";
    echo "<p><a href='index.php'>Voltar para o início</a></p>";
}
