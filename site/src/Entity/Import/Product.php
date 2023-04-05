<?php

declare(strict_types=1);

namespace App\Entity\Import;

use App\Entity\Seller\Seller;

class Product
{
    private int $id;
    private Seller $seller;
    private string $type;
    private string $name;
    private array $rawData = [];
}
