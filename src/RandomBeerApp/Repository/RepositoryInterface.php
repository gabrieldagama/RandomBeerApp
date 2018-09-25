<?php

namespace RandomBeerApp\Repository;

use RandomBeerApp\Model\Entity\AbstractEntity;

/**
 * Interface RepositoryInterface
 * @package RandomBeerApp\Repository
 */
interface RepositoryInterface
{
    /**
     * @param AbstractEntity $object
     * @return bool
     */
    public function insert(AbstractEntity $object): bool;

    /**
     * @param string $id
     * @return AbstractEntity
     */
    public function get(string $id): AbstractEntity;

    /**
     * @param string $id
     * @return bool
     */
    public function delete(string $id): bool;

    /**
     * @param string $id
     * @param AbstractEntity $object
     * @return bool
     */
    public function update(string $id, AbstractEntity $object): bool;
}