<?php
declare(strict_types=1);

namespace RandomBeerApp\Helper;

use RandomBeerApp\Model\Entity\AbstractEntity;

/**
 * Class ObjectToArray
 * @package RandomBeerApp\Helper\Converter
 */
class PopulateObject
{
    /**
     * @param AbstractEntity $object
     * @param array $data
     * @return AbstractEntity
     */
    public function populate(AbstractEntity $object, array $data): AbstractEntity
    {
        foreach ($data as $key => $value) {
            $value = ($key !== '_id') ? $value : (string)$value;
            $key = ($key !== '_id') ? $key : 'id';
            $key = ucfirst($key);
            $object->{"set{$key}"}($value);
        }
        return $object;
    }
}