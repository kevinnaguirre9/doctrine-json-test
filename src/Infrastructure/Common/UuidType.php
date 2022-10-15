<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Common;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

/**
 * Class UuidType
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Common
 */
abstract class UuidType extends StringType implements DoctrineCustomType
{
    /**
     * @return string
     */
    abstract protected function typeClassName(): string;

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::customTypeName();
    }

    /**
     * @param $value
     * @param AbstractPlatform $platform
     * @return mixed
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): mixed
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    /**
     * @param $value
     * @param AbstractPlatform $platform
     * @return mixed|string
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): mixed
    {
        $classname = $this->typeClassName();

        return $value instanceof $classname ? $value->value() : $value;
    }


}