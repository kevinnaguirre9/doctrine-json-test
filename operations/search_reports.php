<?php

require_once "bootstrap.php";

use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Expr\Comparison;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\Report;
use Doctrine\Common\Collections\Expr\CompositeExpression;


$ReportRepository = $entityManager->getRepository(Report::class);

//------------ USING QUERY BUILDER ------------------------------------------//

echo "WITH SINGLE DATA SOURCE FILTER" . "\n";

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

    echo $Report->getId() . "\n";

    var_dump($Report->getDataSources());
}



//--------------- With multiple data sources filter

echo "WITH MULTIPLE DATA SOURCES FILTER" . "\n";

$QueryBuilder = $ReportRepository
    ->createQueryBuilder('R')
    ->where(
        "JSON_OVERLAPS(JSON_EXTRACT(R.dataSources, '$[*].uuid'), :data_source_ids) = 1"
    )
    ->setParameter(
        'data_source_ids',
        json_encode([
            '57a92ef3-fca0-42f1-9e06-4e4e3c6bdf73',
            '1f311131-239a-4c9b-94e6-4c8842b76336'
        ]),
    );

/** @var Report[] $Reports */
$Reports = $QueryBuilder
    ->getQuery()
    ->getResult();


foreach ($Reports as $Report)
    echo $Report->getId() . "\n";



//------------ USING DOCTRINE CRITERIA WITH QUERY BUILDER ------------------------------------------//

echo "USING DOCTRINE CRITERIA WITH QUERY BUILDER" . "\n";

$Expression = new CompositeExpression(
    CompositeExpression::TYPE_AND,
    [
        new Comparison(
            'title',
            Comparison::IN,
            ["Test report title", "Test report title 3"]
        ),
    ]
);

$Criteria = new Criteria($Expression);

$QueryBuilder = $ReportRepository
    ->createQueryBuilder('R')
    ->where("JSON_OVERLAPS(JSON_EXTRACT(R.dataSources, '$[*].uuid'), :data_source_ids) = 1")
    ->setParameter(
        'data_source_ids',
        json_encode([
            '57a92ef3-fca0-42f1-9e06-4e4e3c6bdf73',
            '1f311131-239a-4c9b-94e6-4c8842b76336'
        ]),
    )
    ->addCriteria($Criteria);


$Query = $QueryBuilder->getQuery();

/** @var Report[] $Reports */
$Reports = $Query->getResult();

foreach ($Reports as $Report)
    echo $Report->getId() . "\n";