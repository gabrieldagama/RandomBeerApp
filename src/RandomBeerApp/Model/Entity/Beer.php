<?php

namespace RandomBeerApp\Model\Entity;

/**
 * Class Beer
 * @package RandomBeerApp\Model\Entity
 */
class Beer implements Beverage
{

    /**
     * @var string
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $description;
    /**
     * @var float
     */
    private $abv;
    /**
     * @var string
     */
    private $producerLocation;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id)
    {
        $this->id = $id;
    }

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
    public function getAbv(): float
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