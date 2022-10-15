<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Domain\Bible;

use Kevinnaguirre9\DoctrineJsonTest\Domain\Common\DataSource;

/**
 * Class Bible
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Domain\Bible
 */
final class Bible implements DataSource
{
    /**
     * @param BibleId $id
     * @param string $title
     * @param string $status
     */
    public function __construct(
        private BibleId $id,
        private string $title,
        private string $status,
    )
    {
    }

    /**
     * @param BibleId $id
     * @param string $title
     * @param string $status
     * @return static
     */
    public static function create(
        BibleId $id,
        string $title,
        string $status,
    ) : self
    {
        return new self($id, $title, $status);
    }

    /**
     * @return BibleId
     */
    public function getId(): BibleId
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
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }
}