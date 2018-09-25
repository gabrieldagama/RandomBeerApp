<?php

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
     * @param $object
     * @return array
     * @throws InvalidArgumentException
     */
    public function convert($object)
    {
        if (!is_object($object)) {
            throw new InvalidArgumentException('The argument must be an object');
        }
        $refObj = new ReflectionObject($object);
        $newArray = [];
        $propertyArray = $refObj->getProperties();
        foreach ($propertyArray as $property) {
            $propertyName = ucfirst($property->getName());
            $newArray[$property->getName()] = $object->{"get{$propertyName}"}();
        }
        return $newArray;
    }
}