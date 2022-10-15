<?php

require_once "bootstrap.php";

use Kevinnaguirre9\DoctrineJsonTest\Domain\Survey\Survey;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Survey\SurveyId;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Bible\Bible;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Bible\BibleId;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\Report;
use Kevinnaguirre9\DoctrineJsonTest\Domain\Report\ReportId;

//----------------- START SURVEY ----------------------------------------------//

$Survey = Survey::create(
    SurveyId::create('57a92ef3-fca0-42f1-9e06-4e4e3c6bdf73'),
    'Test title 2'
);

$entityManager->persist($Survey);
$entityManager->flush($Survey);

echo "Created Survey with ID " . $Survey->getId() . "\n";

//-----------------  END SURVEY ----------------------------------------------//


//----------------- START BIBLE ----------------------------------------------//

//Bible one
$BibleOne = Bible::create(
    BibleId::create('00104b4a-7781-45ba-8ec1-c1170c9a6b6a'),
    'Test Bible title one',
    'CLOSED',
);

$entityManager->persist($BibleOne);
$entityManager->flush($BibleOne);

echo "Created Bible One with ID " . $BibleOne->getId() . "\n";

//Bible two
$BibleTwo = Bible::create(
    BibleId::create('1f311131-239a-4c9b-94e6-4c8842b76336'),
    'Test Bible title two',
    'CLOSED',
);

$entityManager->persist($BibleTwo);
$entityManager->flush($BibleTwo);

echo "Created Bible Two with ID " . $BibleTwo->getId() . "\n";

//-----------------  END BIBLE ----------------------------------------------//

//----------------- START REPORT ----------------------------------------------//

$DataSourceIds = [
    $Survey->getId(),
    $BibleOne->getId(),
    $BibleTwo->getId(),
];

$Report = Report::create(
    ReportId::create('61957411-d16e-4eb8-95c7-046b1fea26fc'),
    'Test report title',
    $DataSourceIds,
);

$entityManager->persist($Report);
$entityManager->flush($Report);

echo "Created Report with ID " . $Report->getId() . "\n";

//----------------- END REPORT ----------------------------------------------//








