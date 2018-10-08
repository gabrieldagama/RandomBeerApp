<?php
declare(strict_types=1);

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