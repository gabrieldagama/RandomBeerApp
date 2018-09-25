<?php

namespace Tests\Unit\Repository;

use MongoDB\Client;
use MongoDB\Collection;
use MongoDB\Database;
use MongoDB\InsertOneResult;
use PHPUnit\Framework\TestCase;
use Slim\Container;
use RandomBeerApp\Helper\Converter\ObjectToArray;
use RandomBeerApp\Helper\PopulateObject;
use RandomBeerApp\Model\Entity\Beer;
use RandomBeerApp\Model\Entity\BeerFactory;
use PHPUnit_Framework_MockObject_MockObject;
use RandomBeerApp\Repository\BeerRepository;

class BeerRepositoryTest extends TestCase
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject|PopulateObject
     */
    private $populateObjMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject|BeerFactory
     */
    private $beerFactoryMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject|Client
     */
    private $mongoDbMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject|ObjectToArray
     */
    private $converterMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject|Database
     */
    private $mongoDbDatabaseMock;

    /**
     * @var PHPUnit_Framework_MockObject_MockObject|Collection
     */
    private $mongoDbCollectionMock;

    /**
     * @var array
     */
    private $settings;

    /**
     * @var BeerRepository
     */
    private $beerRepository;

    protected function setUp()
    {
        $this->container = $this->createMock(Container::class);
        $this->beerFactoryMock = $this->createMock(BeerFactory::class);
        $this->mongoDbMock = $this->createMock(Client::class);
        $this->converterMock = $this->createMock(ObjectToArray::class);
        $this->populateObjMock = $this->createMock(PopulateObject::class);
        $this->settings = [
            'db' => [
                'db_name' => 'randombeerapp'
            ]
        ];
        $this->container->expects($this->any())
            ->method('get')
            ->with($this->logicalOr(
                $this->equalTo('beer_factory'),
                $this->equalTo('mongo_client'),
                $this->equalTo('converter'),
                $this->equalTo('populate_obj'),
                $this->equalTo('settings')
            ))->will($this->returnCallback(array($this, 'containerCallback')));
        $this->mongoDbDatabaseMock = $this->createMock(Database::class);
        $this->mongoDbCollectionMock = $this->createMock(Collection::class);
        $this->mongoDbMock->expects($this->any())
            ->method('selectDatabase')
            ->willReturn($this->mongoDbDatabaseMock);
        $this->mongoDbDatabaseMock->expects($this->any())
            ->method('selectCollection')
            ->willReturn($this->mongoDbCollectionMock);
        $this->beerRepository = new BeerRepository($this->container);
    }

    public function testInsert()
    {
        $beer = new Beer();
        $this->converterMock->expects($this->once())
            ->method('convert')
            ->willReturn([
                "id" => "5baa880655c89f000b2c548a",
                "name" => "Guinness",
                "description" => "Irish Dry Stout",
                "abv" => 4.2,
                "producerLocation" => "Dublin"
            ]);
        $this->mongoDbCollectionMock->expects($this->once())
            ->method('insertOne')
            ->willReturn($this->createMock(InsertOneResult::class));
        $return = $this->beerRepository->insert($beer);
        $this->assertEquals(true, $return);
    }

    public function testExceptionInsert()
    {
        $beer = 'StringTest';
        $this->expectException(\Exception::class);
        $this->beerRepository->insert($beer);
    }

    public function testGet()
    {
        $beer = new Beer();
        $this->mongoDbCollectionMock->expects($this->once())
            ->method('findOne')
            ->willReturn([
                "id" => "5baa880655c89f000b2c548a",
                "name" => "Guinness",
                "description" => "Irish Dry Stout",
                "abv" => 4.2,
                "producerLocation" => "Dublin"
            ]);
        $this->beerFactoryMock->expects($this->once())
            ->method('create')
            ->willReturn($beer);
        $this->populateObjMock->expects($this->once())
            ->method('populate')
            ->willReturn($beer);
        $result = $this->beerRepository->get('testingid');
        $this->assertInstanceOf(Beer::class, $result);
    }


    public function containerCallback($parameter)
    {
        switch ($parameter) {
            case 'beer_factory':
                return $this->beerFactoryMock;
            case 'mongo_client':
                return $this->mongoDbMock;
            case 'converter':
                return $this->converterMock;
            case 'populate_obj':
                return $this->populateObjMock;
            case 'settings':
                return $this->settings;
        }
        return null;
    }
}