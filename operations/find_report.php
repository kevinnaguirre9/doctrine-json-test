<?php

require_once "bootstrap.php";

use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\Report;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\ReportId;

$ReportRepository = $entityManager->getRepository(Report::class);

/** @var Report $Report */
$Report = $ReportRepository->find(
    ReportId::create('61957411-d16e-4eb8-95c7-046b1fea26fc'),
);

foreach ($Report->getDataSources() as $dataSourceId) {

    echo get_class($dataSourceId) . "\n";

    echo $dataSourceId->value() . "\n";

}