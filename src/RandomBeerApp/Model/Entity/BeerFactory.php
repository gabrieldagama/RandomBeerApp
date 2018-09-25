<?php

namespace RandomBeerApp\Model\Entity;


/**
 * Class TokenServiceFactory
 * @package RandomBeerApp\Model\Entity
 */
class BeerFactory implements FactoryInterface
{
    /**
     * @return Beer
     */
    public function create(): Beer
    {
        return new Beer();
    }
}