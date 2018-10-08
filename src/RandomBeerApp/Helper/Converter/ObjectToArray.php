<?php
declare(strict_types=1);

namespace RandomBeerApp\Helper\Converter;

use Psr\Log\InvalidArgumentException;
use \ReflectionObject;

/**
 * Class ObjectToArray
 * @package RandomBeerApp\Helper\Converter
 */
class ObjectToArray
{
    /**
     * @param object $object
     * @return array
     * @throws InvalidArgumentException
     */
    public function convert(object $object): array
    {
        if (!is_object($object)) {
            throw new InvalidArgumentException('The argument must be an object');
        }
        $refObj = new ReflectionObject($object);
        $newArray = [];
        $propertyArray = $refObj->getProperties();
        foreach ($propertyArray as $property) {
            $propertyName = ($property->getName() !== '_id') ? $property->getName() : 'id';
            $propertyName = ucfirst($propertyName);
            $newArray[$property->getName()] = $object->{"get{$propertyName}"}();
        }
        return $newArray;
    }
}