<?php

namespace Kevinnaguirre9\DoctrineJsonTest\Domain\Report;

use Kevinnaguirre9\DoctrineJsonTest\Domain\Common\DataSource;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Common\DataSourceId;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Common\IsSerializable;

/**
 * Class Report
 *
 * @package Kevinnaguirre9\DoctrineJsonTest\Domain\Report
 */
final class Report implements DataSource
{
    /**
     * @param ReportId $id
     * @param string $title
     * @param DataSourceId[] $dataSources
     */
    public function __construct(
        private ReportId $id,
        private string $title,
        private array $dataSources = [],
    )
    {
    }

    /**
     * @param ReportId $id
     * @param string $title
     * @param DataSourceId[] $dataSources
     * @return $this
     */
    public static function create(
        ReportId $id,
        string $title,
        array $dataSources = [],
    ) : self
    {
        return new self($id,
            $title,
            $dataSources,
        );
    }

    /**
     * @return ReportId
     */
    public function getId(): ReportId
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
     * @return DataSourceId[]
     */
    public function getDataSources(): array
    {
        return $this->dataSources;
    }

    /**
     * @param DataSourceId $dataSourceId
     * @return void
     */
    public function addDataSource(DataSourceId $dataSourceId) : void
    {
        $this->dataSources[] = $dataSourceId;
    }
}