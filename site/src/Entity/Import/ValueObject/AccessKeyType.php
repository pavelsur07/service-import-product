<?php

declare(strict_types=1);

namespace App\Entity\Import\ValueObject;

use Webmozart\Assert\Assert;

class AccessKeyType
{
    public const WB = 'wb';
    public const OZON = 'ozon';

    private string $value;

    public function __construct(string $value)
    {
        Assert::oneOf($value, self::list());
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function isOzonAccessKey(): bool
    {
        return $this->value === self::OZON;
    }

    public function isWbAccessKey(): bool
    {
        return $this->value === self::WB;
    }

    public static function list(): array
    {
        return [
            self::WB,
            self::OZON,
        ];
    }
}
