<?php

declare(strict_types=1);

namespace App\Entity\Import;

class Mapping
{
    private int $id;
    private string $type;
    private string $externalAttributeName;
    private string $externalVariantName;
    private ?int $attributeId = null;
    private ?int $variantId = null;
}
