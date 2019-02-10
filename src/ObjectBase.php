<?php

namespace DotykackaPHPApiClient;

class ObjectBase
{
    public function __construct($data = null)
    {
        if ($data) {
            foreach ($data as $k => $v) {
                $property = $this->mapFieldToProperty($k);
                if (property_exists(
                        static::class,
                        $property
                )) {
                    $this->{$property} = $v;
                }
            }
        }
    }

    public function __toString()
    {
        $arr = array();
        foreach ($this as $k => $v) {
            if (!(null === $v)) {
                $field = $this->mapPropertyToField($k);
                $arr[$field] = $v;
            }
        }

        return json_encode($arr);
    }
    
    protected function mapPropertyToField($property)
    {
        return str_replace('_', '-', $property);
    }
    
    protected function mapFieldToProperty($field)
    {
        return str_replace('-', '_', $field);
    }
}
