<?php namespace KetkzApi\Builders;

use KetkzApi\ExceptionKetz;

/**
 * Interface BuilderInterface
 *
 * @package KetkzApi\Builders
 */
interface BuilderInterface
{
    /**
     * @return mixed
     * @throws ExceptionKetz
     */
    public function validate();
}