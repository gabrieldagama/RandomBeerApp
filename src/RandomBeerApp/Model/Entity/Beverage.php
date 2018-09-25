<?php

namespace RandomBeerApp\Model\Entity;

/**
 * Interface Beverage
 * @package RandomBeerApp\Model\Entity
 */
interface Beverage
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return int
     */
    public function getAbv(): int;

    /**
     * @return string
     */
    public function getProducerLocation(): string;
}