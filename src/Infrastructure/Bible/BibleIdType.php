<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Bible;

use Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Common\UuidType;

/**
 * Class BibleIdType
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Bible
 */
final class BibleIdType extends UuidType
{
    /**
     * @return string
     */
    public static function customTypeName(): string
    {
        return 'bible_id';
    }

    /**
     * @return string
     */
    protected function typeClassName(): string
    {
        return BibleIdType::class;
    }

}