<?php

namespace RandomBeerApp\Model\Repository;

/**
 * Interface RepositoryInterface
 * @package RandomBeerApp\Model\Entity
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
     * @return object
     */
    public function get($id): object;

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