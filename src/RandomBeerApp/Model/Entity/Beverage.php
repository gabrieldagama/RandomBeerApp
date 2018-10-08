<?php
declare(strict_types=1);

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
    public function getId(): ?string;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return float
     */
    public function getAbv(): float;

    /**
     * @return string
     */
    public function getProducerLocation(): string;
}