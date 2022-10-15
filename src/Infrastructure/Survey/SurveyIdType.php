<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Survey;

use Kevinnaguirre9\DoctrineJsonTest\Domain\Survey\SurveyId;
use Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Common\UuidType;

/**
 * Class SurveyIdType
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Survey
 */
final class SurveyIdType extends UuidType
{
    /**
     * @return string
     */
    public static function customTypeName(): string
    {
        return 'survey_id';
    }

    /**
     * @return string
     */
    protected function typeClassName(): string
    {
        return SurveyId::class;
    }

}