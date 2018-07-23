<?php
/**
 * Created by PhpStorm.
 * User: kasim
 * Date: 23.07.2018
 * Time: 14:24
 */

namespace KetkzApi\Builders;


abstract class BuilderAbstract implements BuilderInterface
{
    /**
     * BuilderAbstract constructor.
     *
     * @param array $fields
     */
    public function __construct(array $fields = [])
    {
        foreach ($fields as $key => $field) {
            if (!property_exists($this, $key)) {
                continue;
            }
            $this->{$key} = $field;
        }
    }
}