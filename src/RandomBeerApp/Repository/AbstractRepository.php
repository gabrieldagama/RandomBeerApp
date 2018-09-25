<?php

namespace RandomBeerApp\Repository;

use Psr\Log\InvalidArgumentException;
use RandomBeerApp\Helper\Converter\ObjectToArray;
use Interop\Container\ContainerInterface;
use MongoDB\Client;
use RandomBeerApp\Helper\PopulateObject;
use RandomBeerApp\Model\Entity\Beverage;
use RandomBeerApp\Model\Entity\FactoryInterface;
use \Exception;

/**
 * Class AbstractRepository
 * @package RandomBeerApp\Repository
 */
abstract class AbstractRepository
{
    /**
     * @var Client
     */
    private $mongoDbClient;

    /**
     * @var string
     */
    private $dbName;

    /**
     * @var string
     */
    private $collectionName;

    /**
     * @var ObjectToArray
     */
    private $objectConverter;

    /**
     * @var FactoryInterface
     */
    private $objectFactory;

    /**
     * @var PopulateObject
     */
    private $populateObj;

    /**
     * AbstractRepository constructor.
     * @param ContainerInterface $container
     * @param $collectionName
     * @param $objectFactory
     */
    public function __construct(
        ContainerInterface $container,
        $collectionName,
        $objectFactory
    ) {
        $this->mongoDbClient = $container->get('mongo_client');
        $this->dbName = $container->get('settings')['db']['db_name'];
        $this->objectConverter = $container->get('converter');
        $this->populateObj = $container->get("populate_obj");
        $this->collectionName = $collectionName;
        $this->objectFactory = $objectFactory;
    }

    /**
     * @param $object
     * @return bool
     */
    public function insert($object): bool
    {
        if (!is_object($object)) {
            throw new InvalidArgumentException('The argument must be an object');
        }
        $arrayData = $this->objectConverter->convert($object);
        unset($arrayData['id']);
        try {
            $this->getCollection()->insertOne($arrayData);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @param $id
     * @return Beverage
     */
    public function get($id): Beverage
    {
        $data = $this->getCollection()->findOne(['_id' => $id]);
        $object = $this->objectFactory->create();
        $object = $this->populateObj->populate($object, $data);
        return $object;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        try {
            $this->getCollection()->deleteOne(['_id' => $id]);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @param $id
     * @param $object
     * @return bool
     */
    public function update($id, $object): bool
    {
        $arrayData = $this->objectConverter->convert($object);
        try {
            $this->getCollection()->updateOne(
                ['_id' => $id],
                ['$set' => $arrayData]
            );
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @return \MongoDB\Collection
     */
    protected function getCollection()
    {
        return $this->mongoDbClient
            ->selectDatabase($this->dbName)
            ->selectCollection($this->collectionName);
    }
}