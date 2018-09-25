<?php

namespace Tests\Unit\Helper\Converter;

use \PHPUnit\Framework\TestCase;
use RandomBeerApp\Helper\Converter\ObjectToArray;
use RandomBeerApp\Model\Entity\Beer;

/**
 * Class ObjectToArrayTest
 * @package Tests\Unit\Helper\Converter
 */
class ObjectToArrayTest extends TestCase
{

    /**
     * Testing object to array convert.
     */
    public function testObjectToArray()
    {
        $object = new Beer();
        $objectToArrayConverter = new ObjectToArray();
        $dataArray = [
            "id" => "5baa880655c89f000b2c548a",
            "name" => "Guinness",
            "description" => "Irish Dry Stout",
            "abv" => 4.2,
            "producerLocation" => "Dublin"
        ];
        $object->setId($dataArray['id']);
        $object->setName($dataArray['name']);
        $object->setDescription($dataArray['description']);
        $object->setAbv($dataArray['abv']);
        $object->setProducerLocation($dataArray['producerLocation']);
        $resultArray = $objectToArrayConverter->convert($object);
        $this->assertEquals($dataArray, $resultArray);
    }
}