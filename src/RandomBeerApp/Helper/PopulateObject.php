<?php

namespace RandomBeerApp\Helper;

use Psr\Log\InvalidArgumentException;

/**
 * Class ObjectToArray
 * @package RandomBeerApp\Helper\Converter
 */
class PopulateObject
{
    /**
     * @param $object
     * @param $data
     * @return object
     */
    public function populate($object, $data)
    {
        foreach ($data as $key => $value) {
            $key = ($key !== "_id") ? $key : "id";
            $key = ucfirst($key);
            $object->{"set{$key}"}($value);
        }
        return $object;
    }
}