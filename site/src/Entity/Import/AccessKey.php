<?php

declare(strict_types=1);

namespace App\Entity\Import;

use App\Entity\Import\ValueObject\AccessKeyOzon;
use App\Entity\Import\ValueObject\AccessKeyType;
use App\Entity\Import\ValueObject\AccessKeyWB;
use App\Entity\Seller\Seller;
use DomainException;

class AccessKey
{
    private int $id;

    private AccessKeyType $type;
    private Seller $seller;
    private ?AccessKeyWB $keyWb;
    private ?AccessKeyOzon $keyOzon;

    public function __construct(Seller $seller, AccessKeyType $type)
    {
        $this->seller = $seller;
        $this->type = $type;
    }

    public static function addAccessKeyWb(Seller $seller, AccessKeyType $type, AccessKeyWB $keyWb): self
    {
        if (!$type->isWbAccessKey()) {
            throw new DomainException('This is type not correct. ');
        }

        $key = new self($seller, $type);
        $key->keyWb = $keyWb;
        return $key;
    }

    public static function addAccessKeyOzon(Seller $seller, AccessKeyType $type, AccessKeyWB $keyWb): self
    {
        if (!$type->isOzonAccessKey()) {
            throw new DomainException('This is type not correct. ');
        }

        $key = new self($seller, $type);
        $key->keyWb = $keyWb;
        return $key;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): AccessKeyType
    {
        return $this->type;
    }

    public function getSeller(): Seller
    {
        return $this->seller;
    }

    public function getKeyWb(): ?AccessKeyWB
    {
        return $this->keyWb;
    }

    public function getKeyOzon(): ?AccessKeyOzon
    {
        return $this->keyOzon;
    }
}
