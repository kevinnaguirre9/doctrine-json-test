<?php

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Report\ReportIdType;
use Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Bible\BibleIdType;
use Kevinnaguirre9\DoctrineJsonTest\Infrastructure\Survey\SurveyIdType;
use Dunglas\DoctrineJsonOdm\Serializer;
use Dunglas\DoctrineJsonOdm\Type\JsonDocumentType;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\{ArrayDenormalizer, ObjectNormalizer};
use Scienta\DoctrineJsonFunctions\Query\AST\Functions\Mysql\{
    JsonExtract, JsonSearch, JsonContains, JsonOverlaps
};

require_once "vendor/autoload.php";

// the connection configuration
$dbParams = array(
    'driver'    => 'pdo_mysql',
    'host'      => 'doctrine-json-test-mysql',
    'user'      => 'root',
    'password'  => 'secret',
    'dbname'    => 'db_example',
);

$xmlPaths = [__DIR__ .'/config/xml'];

$config = ORMSetup::createXMLMetadataConfiguration($xmlPaths);

//Register custom types
Type::addType(ReportIdType::customTypeName(), ReportIdType::class);
Type::addType(BibleIdType::customTypeName(), BibleIdType::class);
Type::addType(SurveyIdType::customTypeName(), SurveyIdType::class);

//Add JSON type
if (!Type::hasType('json_document')) {
    Type::addType('json_document', JsonDocumentType::class);
    Type::getType('json_document')->setSerializer(
        new Serializer([new ArrayDenormalizer(), new ObjectNormalizer()], [new JsonEncoder()])
    );
}

//Add custom JSON functions
$config->addCustomStringFunction(JsonExtract::FUNCTION_NAME, JsonExtract::class);
$config->addCustomStringFunction(JsonSearch::FUNCTION_NAME, JsonSearch::class);
$config->addCustomStringFunction(JsonContains::FUNCTION_NAME, JsonContains::class);
$config->addCustomStringFunction(JsonOverlaps::FUNCTION_NAME, JsonOverlaps::class);

//Create EntityManager
$entityManager = EntityManager::create($dbParams, $config);

