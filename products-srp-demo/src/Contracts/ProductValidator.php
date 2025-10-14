<?php

namespace App\Contracts;

interface ProductValidator
{
    public function validate(array $input): array;
}
