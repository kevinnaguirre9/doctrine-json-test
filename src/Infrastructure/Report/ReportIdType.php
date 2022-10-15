<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Report;

use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\ReportId;
use Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Common\UuidType;

/**
 * Class ReportIdType
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Report
 */
final class ReportIdType extends UuidType
{
    /**
     * @return string
     */
    public static function customTypeName(): string
    {
        return 'report_id';
    }

    /**
     * @return string
     */
    protected function typeClassName(): string
    {
        return ReportId::class;
    }
}