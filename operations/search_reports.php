<?php

require_once "bootstrap.php";

use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\Report;


$ReportRepository = $entityManager->getRepository(Report::class);

$QueryBuilder = $ReportRepository
    ->createQueryBuilder('R')
    ->where(
        "JSON_CONTAINS(JSON_EXTRACT(R.dataSources, '$[*].uuid'), :data_source_id, '$') = 1"
    )
    ->setParameter(
        'data_source_id', '"1f311131-239a-4c9b-94e6-4c8842b76336"',
    );


/** @var Report[] $Reports */
$Reports = $QueryBuilder
    ->getQuery()
    ->getResult();


foreach ($Reports as $Report) {

//    $Report->deprecate();

    echo (string) $Report->getId() . "\n";

    var_dump($Report->getDataSources());
}