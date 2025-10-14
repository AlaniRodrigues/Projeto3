<?php

namespace App\Domain;

use App\Contracts\ProductValidator;

class SimpleProductValidator implements ProductValidator
{
    public function validate(array $data): array
    {
        $errors = [];

        if (empty(trim($data['name'] ?? ''))) {
            $errors[] = 'O nome do produto é obrigatório.';
        } 
        elseif (strlen($data['name']) < 2 || strlen($data['name']) > 100) {
            $errors[] = 'O nome deve ter entre 2 e 100 caracteres.';
        }

        if (!isset($data['price']) || !is_numeric($data['price'])) {
            $errors[] = 'O preço deve ser numérico.';
        } 
        elseif ($data['price'] < 0) {
            $errors[] = 'O preço não pode ser negativo.';
        }

        return $errors;
    }
}
