<?php

namespace App\Application;

use App\Contracts\ProductRepository;
use App\Contracts\ProductValidator;

class ProductService
{
    private ProductRepository $repository;
    private ProductValidator $validator;

    public function __construct(ProductRepository $repository, ProductValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data): array
    {
        $errors = $this->validator->validate($data);

        if (!empty($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        $product = [
            'name' => trim($data['name']),
            'price' => (float) $data['price']
        ];

        $this->repository->save($product);

        return ['success' => true];
    }

    public function list(): array
    {
        return $this->repository->findAll();
    }
}
