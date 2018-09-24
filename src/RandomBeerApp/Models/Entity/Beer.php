<?php

namespace RandomBeerApp\Models\Entity;

/**
 * Class Beer
 * @package RandomBeerApp\Models\Entity
 */
class Beer implements Beverage
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var int
     */
    private $abv;
    /**
     * @var string
     */
    private $producerLocation;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getAbv(): int
    {
        return $this->abv;
    }

    /**
     * @param int $abv
     */
    public function setAbv($abv)
    {
        $this->abv = $abv;
    }

    /**
     * @return string
     */
    public function getProducerLocation(): string
    {
        return $this->producerLocation;
    }

    /**
     * @param string $producerLocation
     */
    public function setProducerLocation($producerLocation)
    {
        $this->producerLocation = $producerLocation;
    }
}