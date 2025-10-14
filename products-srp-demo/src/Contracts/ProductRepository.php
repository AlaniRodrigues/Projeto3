<?php

namespace App\Contracts;

interface ProductRepository
{
    public function save(array $product): bool;
    public function findAll(): array;
}
