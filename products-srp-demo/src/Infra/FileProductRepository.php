<?php

namespace App\Infra;

use App\Contracts\ProductRepository;

class FileProductRepository implements ProductRepository
{
    private string $filePath;

    public function __construct(string $filePath = __DIR__ . '/../../storage/products.txt')
    {
        $this->filePath = $filePath;
    }

    public function save(array $product): bool
    {
        $products = $this->findAll();

        $lastId = count($products) > 0 ? end($products)['id'] : 0;
        $product['id'] = $lastId + 1;

        $jsonLine = json_encode($product) . PHP_EOL;
        return file_put_contents($this->filePath, $jsonLine, FILE_APPEND) !== false;
    }

    public function findAll(): array
    {
        if (!file_exists($this->filePath)) {
            return [];
        }

        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $products = [];

        foreach ($lines as $line) {
            $product = json_decode($line, true);
            if (is_array($product)) {
                $products[] = $product;
            }
        }

        return $products;
    }
}
