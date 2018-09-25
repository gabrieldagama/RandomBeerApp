<?php

namespace RandomBeerApp\Repository;

use RandomBeerApp\Model\Entity\Beverage;

/**
 * Interface RepositoryInterface
 * @package RandomBeerApp\Repository
 */
interface RepositoryInterface
{
    /**
     * @param $object
     * @return bool
     */
    public function insert($object): bool;

    /**
     * @param $id
     * @return Beverage
     */
    public function get($id): Beverage;

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool;

    /**
     * @param $id
     * @param $object
     * @return bool
     */
    public function update($id, $object): bool;
}