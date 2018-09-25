<?php

namespace Tests\Unit\Helper;

use PHPUnit\Framework\TestCase;
use RandomBeerApp\Helper\PopulateObject;
use RandomBeerApp\Model\Entity\Beer;

/**
 * Class PopulateObjectTest
 * @package Tests\Unit\Helper
 */
class PopulateObjectTest extends TestCase
{

    /**
     * Testing populate object method.
     */
    public function testPopulateObject()
    {
        $object = new Beer();
        $data = [
            "_id" => "5baa880655c89f000b2c548a",
            "name" => "Guinness",
            "description" => "Irish Dry Stout",
            "abv" => 4.2,
            "producerLocation" => "Dublin"
        ];
        $populateObject = new PopulateObject();
        $object = $populateObject->populate($object, $data);
        $this->assertEquals($data['_id'], $object->getId());
        $this->assertEquals($data['name'], $object->getName());
        $this->assertEquals($data['description'], $object->getDescription());
        $this->assertEquals($data['abv'], $object->getAbv());
        $this->assertEquals($data['producerLocation'], $object->getProducerLocation());
    }
}