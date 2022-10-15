<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Domain\Survey;

use Kevinnaguirre9\DoctrineJsonTest\Domain\Common\DataSource;

/**
 * Class Survey
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Domain\Survey
 */
final class Survey implements DataSource
{
    /**
     * @param SurveyId $id
     * @param string $title
     * @param string|null $description
     */
    public function __construct(
        private SurveyId $id,
        private string $title,
        private ?string $description = null,
    )
    {
    }

    /**
     * @param SurveyId $id
     * @param string $title
     * @param string|null $description
     * @return static
     */
    public static function create(
        SurveyId $id,
        string $title,
        ?string $description = null,
    ) : self
    {
        return new self($id, $title, $description);
    }

    /**
     * @return SurveyId
     */
    public function getId(): SurveyId
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }
}