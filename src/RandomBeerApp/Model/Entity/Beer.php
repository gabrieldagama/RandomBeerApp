<?php
declare(strict_types=1);

namespace RandomBeerApp\Model\Entity;

/**
 * Class Beer
 * @package RandomBeerApp\Model\Entity
 */
class Beer extends AbstractEntity implements Beverage
{
    /**
     * @var string|object
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
     * @return string|null
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
    public function setName(string $name)
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
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getAbv(): float
    {
        return $this->abv;
    }

    /**
     * @param float $abv
     */
    public function setAbv(float $abv)
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
    public function setProducerLocation(string $producerLocation)
    {
        $this->producerLocation = $producerLocation;
    }
}