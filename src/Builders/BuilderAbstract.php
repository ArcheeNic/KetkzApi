<?php namespace KetkzApi\Builders;

/**
 * Class BuilderAbstract
 *
 * @package KetkzApi\Builders
 */
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