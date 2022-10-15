<?php

require_once "bootstrap.php";

use Kevinnaguirre9\DoctrineJsonTest\Domain\Bible\Bible;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Bible\BibleId;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\Report;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\ReportId;

//Create new Bible
$BibleThree = Bible::create(
    BibleId::create('9bdab484-591c-4ec0-9de0-88fd4e4e0078'),
    'Test Bible title three',
    'CLOSED',
);

$entityManager->persist($BibleThree);
$entityManager->flush($BibleThree);

echo "Created Bible Three with ID " . $BibleThree->getId() . "\n";


//Add data source
$ReportRepository = $entityManager->getRepository(Report::class);

/** @var Report $Report */
$Report = $ReportRepository->find(
    ReportId::create('61957411-d16e-4eb8-95c7-046b1fea26fc'),
);

$Report->addDataSource($BibleThree->getId());

$entityManager->persist($Report);
$entityManager->flush($Report);

echo "Updated Report with ID " . $Report->getId() . "\n";