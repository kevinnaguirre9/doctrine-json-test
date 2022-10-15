<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Domain\Common;

use Ramsey\Uuid\Uuid;

/**
 * Class RamseyUuid
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Domain\Common
 */
abstract class RamseyUuid
{
    /**
     * @var string
     */
    public string $uuid;

    /**
     * @param string $uuid
     * @throws \Exception
     */
    public function __construct(string $uuid)
    {
        $this->ensureIsValidUuid($uuid);

        $this->uuid = $uuid;
    }

    /**
     * @param string|null $uuid
     * @return static
     * @throws \Exception
     */
    public static function create(?string $uuid = null): static
    {
        return new static($uuid ?? self::generateUuid4());
    }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public static function generateUuid4(): string
    {
        return Uuid::uuid4()->toString();
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value();
    }

    /**
     * @param string $uuid
     * @return void
     * @throws \Exception
     */
    protected function ensureIsValidUuid(string $uuid): void
    {
        if (!Uuid::isValid($uuid))
            throw new \Exception(sprintf('Invalid uuid <%s>.', $uuid));
    }

    /**
     * @param RamseyUuid $RamseyUuid
     * @return bool
     */
    public function equals(self $RamseyUuid) : bool
    {
        return $this->value() === $RamseyUuid->value();
    }
}