<?php
/**
 * Created by PhpStorm.
 * User: kasim
 * Date: 23.07.2018
 * Time: 11:29
 */

namespace KetkzApi\Builders;


interface BuilderInterface
{
    /**
     * @return mixed
     * @throws ExceptionKetz
     */
    public function validate();
}